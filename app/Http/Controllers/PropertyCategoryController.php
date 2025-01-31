<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use Illuminate\Http\Request;

class PropertyCategoryController extends Controller
{
    // Attach a category to a property
    public function store(Request $request, Property $property)
    {
        $request->validate(['category_id' => 'required|exists:categories,id']);
        $property->categories()->attach($request->category_id);
        return redirect()->back()->with('success', 'Category attached successfully.');
    }

    // Detach a category from a property
    public function destroy(Property $property, Category $category)
    {
        $property->categories()->detach($category->id);
        return redirect()->back()->with('success', 'Category detached successfully.');
    }
}