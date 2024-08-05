<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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

    public function store(CategoryRequest $request)
    {
        Category::query()->create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa thành công.');
    }

    public function trash(Request $request)
    {
        $data = Category::onlyTrashed()->paginate();
        return view('admin.categories.trash',compact('data'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return redirect()->route('categories.trash')->with('success', 'Danh mục đã được khôi phục.');
    }

}
