<?php

// Display a paginated list of products with their categories
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('list products with pagination', function () {
    $response = get(route('product.index'));

    expect($response->status())->toBe(200);
    expect($response->viewData('products'))->not->toBeNull();
    $products = $response->viewData('products');
    expect($products->count())->toBeLessThanOrEqual(10);
    foreach ($products as $product) {
        expect($product->category)->not->toBeNull();
    }
});

// Display a specific product's details
test('show single product details', function () {
    $product = Product::factory()->create();

    $response = get(route('product.show', $product));

    $response->assertStatus(200);
    expect($response['product']->id)->toBe($product->id);
});

// Store a new product with valid data
test('create product with valid data', function () {
    $category = Category::factory()->create();
    $data = [
        'name' => 'Test Product',
        'image' => UploadedFile::fake()->image('product.jpg'),
        'category_id' => $category->id,
        'description' => 'Test Description',
        'price' => 100,
        'stock' => 10,
        'featured' => true,
        'on_sale' => false,
        'sale_percent' => null,
    ];

    $response = post(route('product.store'), $data);

    $response->assertRedirect(route('product.index'));
    expect(Product::where('name', 'Test Product')->exists())->toBeTrue();
});

test('update product with valid data', function () {
    $product = Product::factory()->create();
    $category = Category::factory()->create();
    $data = [
        'name' => 'Updated Product',
        'image' => UploadedFile::fake()->image('updated_product.jpg'),
        'category_id' => $category->id,
        'description' => 'Updated Description',
        'price' => 150,
        'stock' => 20,
    ];

    $response = patch(route('product.update', $product), $data);

    $response->assertRedirect(route('product.index'));
    expect(Product::where('name', 'Updated Product')->exists())->toBeTrue();
});

test('delete existing product', function () {
    $product = Product::factory()->create();

    $response = delete(route('product.destroy', $product));

    $response->assertRedirect(route('product.index'));
    expect(Product::find($product->id))->toBeNull();
});

test('create product with missing fields', function () {
    $data = [
        'name' => '',
        'description' => '',
        'price' => '',
        'stock' => '',
        'category_id' => '',
    ];

    $response = post(route('product.store'), $data);

    $response->assertSessionHasErrors(['name', 'description', 'price', 'stock', 'category_id']);
});

test('update product with invalid data', function () {
    $product = Product::factory()->create();
    $data = [
        'name' => '',
        'description' => '',
        'price' => '',
        'stock' => '',
        'category_id' => '',
    ];

    $response = patch(route('product.update', $product), $data);

    $response->assertSessionHasErrors(['name', 'description', 'price', 'stock', 'category_id']);
});

test('ensure old image is deleted when updating product with new image', function () {
    Storage::fake('public');

    $product = Product::factory()->create();
    $oldImagePath = $product->image;

    $newImage = UploadedFile::fake()->image('new_image.jpg');

    $response = patch(route('product.update', $product), [
        'name' => 'Updated Product Name',
        'image' => $newImage,
        'category_id' => $product->category_id,
        'description' => 'Updated Product Description',
        'price' => 50.99,
        'stock' => 10,
        'featured' => true,
        'on_sale' => false,
        'sale_percent' => 0,
    ]);

    expect($response->isRedirect(route('product.index')))->toBeTrue();
    expect(session('success'))->toBe('Product updated successfully');


    expect(Storage::disk('public')->exists($oldImagePath))->toBeFalse();
    expect(Storage::disk('public')->exists($product->fresh()->image))->toBeTrue();
});
