<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category', function($query){
            $query->withTrashed();
        })->latest('id')->paginate(6);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categoryPluck = Category::query()->pluck('name', 'id')->toArray();
        return view('admin.posts.create', compact('categoryPluck'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->except(['image']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = Storage::putFile('posts', $file);
        }
        Post::query()->create($data);
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categoryPluck = Category::query()->pluck('name', 'id')->toArray();
        $posts = DB::table('posts')->findOr($post->id, function () {
            abort(404);
        });
        return view('admin.posts.edit', compact('posts', 'categoryPluck'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->except(['image']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = Storage::putFile('posts', $file);
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
        }

        $query = Post::query()->where('id', $post->id)->first();
        $query->update($data);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function destroy(Post $post)
    {
        $post = Post::query()->findOrFail($post->id);
        $post->delete();
//        if ($post->image && Storage::exists($post->image)) {
//            Storage::delete($post->image);
//        }
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa thành công.');
    }

    public function changeActive(Request $request)
    {
        $post = Post::query()->where('id', $request->id)->first();
        Post::query()->where('id', $request->id)->update([
            "is_active" => $post->is_active == 0 ? 1 : 0
        ]);
        return redirect()->route('posts.index')->with('success', 'Trạng thái bài viết đã được thay đổi.');
    }

    public function changeMainPost(Request $request)
    {
        $post = Post::query()->where('id', $request->id)->first();
        Post::query()->where('id', $request->id)->update([
            "is_main" => $post->is_main == null ? now() : null
        ]);
        return redirect()->route('posts.index')->with('success', 'Trạng thái bài viết chính đã được thay đổi.');
    }


    public function trash(Request $request)
    {
        $posts = Post::onlyTrashed()->paginate();
        return view('admin.posts.trash',compact('posts'));
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->find($id);
        $posts->restore();
        return redirect()->route('posts.trash')->with('success', 'Bài viết đã được khôi phục.');
    }
}
