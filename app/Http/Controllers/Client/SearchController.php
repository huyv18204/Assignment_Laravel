<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $allCate = Category::query()->select(['name', 'id'])->limit(10)->get();
        $page = request()->get('page', 1);
        $keyWord = $request->search;

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$keyWord}%")
            ->where('is_active', true)
            ->orWhereHas('category', function ($query) use ($keyWord) {
                $query->where('name', 'LIKE', "%{$keyWord}%");
            })
            ->paginate();
        $page_number = ceil($posts->total() / $posts->perPage());

        return view('client.search', compact('posts', 'keyWord', 'allCate','page','page_number'));
    }
}
