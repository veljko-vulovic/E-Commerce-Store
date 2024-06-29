<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart'); // Assuming you are storing cart items in session
        return view('checkout.index', compact('cartItems'));
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();
        $cart = $user->cart->first();
        $cartItems = $cart->items()->with('product')->get();
        session()->put('cartItems', $cartItems);

        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }

        $lineItems = [];
        $order_total = 0;
        foreach ($cartItems as $item) {

            $order_total += $item->total_price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->total_price * 100, // Stripe expects the amount in cents
                ],
                'quantity' => $item['quantity'],
            ];
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('checkout.success', []) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
            'customer_creation' => 'always',

        ]);

        $order = new Order();

        $order->user_id = $user->id;
        $order->product_id = $cart->items()->pluck('product_id')->toJson();
        $order->stripe_id = $checkoutSession->id;
        $order->total_amount = $order_total;
        $order->status = 'pending';
        $order->save();

        $cart->delete();

        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = $request->get('session_id');

        $cartItems = session()->get('cartItems');
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException();
            }
            $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('stripe_id', $session->id)->where('status', 'pending')->first();

            if (!$order) {
                throw new NotFoundHttpException();
            }

            // dd($cartItems);

            if ($order && $order->status === 'pending') {
                $order->status = 'confirmed';

                foreach ($cartItems as $item) {
                    $product = Product::find($item->product)->first();
                    $product->stock -= $item->quantity;
                    $product->save();
                }
                $order->save();
                $request->session()->forget('cartItems');


                $cart = Cart::where('user_id', $order->user_id)->first();
                if ($cart) {
                    $cart->delete();
                }
            }


            return view('checkout.success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

    public function webhook()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');


        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response('UnexpectedValueException', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('SignatureVerificationException', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::where('stripe_id', $session->id)->first();
                if ($order && $order->status === 'pending') {
                    $order->status = 'confirmed';
                    $order->save();

                    $cart = Cart::where('user_id', $order->user_id)->first();
                    if ($cart) {
                        $cart->items()->delete();
                        $cart->delete();
                    }
                }

            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
