<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodcuts = Product::with('category')->latest()->paginate(10);
        return view('product.index', [
            'products' => $prodcuts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(
            'product.create',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'featured' => 'nullable|boolean',
            'on_sale' => 'nullable|boolean',
            'sale_percent' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
        ]);


        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => 'https://source.unsplash.com/random/200x200?sig=' . rand(1, 100),
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
            'featured' => $validatedData['featured'] ?? 0,
            'on_sale' => $validatedData['on_sale'] ?? 0,
            'sale_percent' => $validatedData['sale_percent'] ?? null,
        ]);


        // dd($product);

        return redirect()->route('product.index')->with('success', 'Product created successfully');

        // return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'product.edit',
            [
                'product' => $product,
                'categories' => $categories
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'featured' => 'nullable|boolean',
            'on_sale' => 'nullable|boolean',
            'sale_percent' => 'nullable',
            'stock' => 'required|integer|min:0',
        ]);

        $product->name = $validatedData['name'];
        $product->image = $request->file('image') ? $request->file('image')->store('images') : $product->image;
        $product->category_id = $validatedData['category_id'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->featured = $validatedData['featured'] ?? 0;
        $product->on_sale = $validatedData['on_sale'] ?? 0;
        $product->sale_percent = $validatedData['sale_percent'];
        $product->stock = $validatedData['stock'];

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }
    }
}
