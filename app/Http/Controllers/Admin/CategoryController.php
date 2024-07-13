<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::query()->latest('id')->paginate(5);
        return view('admin.categories.index', compact('data'));

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::query()->create($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category = Category::query()->findOrFail($category->id);
        $category->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        Category::query()->where('id', $category->id)->delete();
        return redirect()->route('categories.index');
    }
}
