<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::with('products')->latest()->paginate(10);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::where('name', $validatedData['name'])->first();

        if ($category) {
            // Category already exists, return the existing category
            return redirect()->route('category.index')->with('error', 'Category alredy exists');
        }

        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']);

        $category->save();


        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categoryProduct = $category->products()->get();
        return view('category.show', [
            'cat' => $category,
            'catProduct' => $categoryProduct
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);

        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if ($category->products->count() > 0) {
            return redirect()->route('category.index')->with('error', 'Category has products');
        }
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
