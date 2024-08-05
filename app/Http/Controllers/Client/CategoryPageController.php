<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index($id)
    {
        $category = Category::query()->select('name','id')->where('id', $id)->first();
        $page = request()->get('page', 1);
        $menus = Category::query()->select(['name', 'id'])->limit(5)->get();
        $allCate = Category::query()->select(['name', 'id'])->limit(10)->get();
        $posts = Post::query()->where('is_active', true)->where('category_id',$id)->orderByDesc('id')->paginate(6);
        $page_number = ceil($posts->total() / $posts->perPage());
        return view('client.category', compact('posts', 'page_number', 'menus', 'category', 'allCate','page'));
    }

}
