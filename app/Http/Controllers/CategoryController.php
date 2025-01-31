<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories']);
        Category::create($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show a specific category
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing a category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update a category
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|unique:categories']);
        $category->update($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
