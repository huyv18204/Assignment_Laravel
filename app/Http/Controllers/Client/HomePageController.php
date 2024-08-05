<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        $postsByCategory = [];
        $allCate = Category::query()->select(['name', 'id'])->limit(10)->get();
        $menus = Category::query()->select(['name', 'id'])->limit(5)->get();
        $newPosts = Post::query()->with('category', function($query){
            $query->withTrashed();
        })->where('is_active', true)->orderByDesc('id')->limit(3)->get();
        $mostPopulars = Post::query()->where('is_active', true)->orderByDesc('view')->limit(10)->get();
        $randomPosts = Post::query()->where('is_active', true)->inRandomOrder()->limit(5)->get();
        $mainPosts = Post::query()->with('category', function($query){
            $query->withTrashed();
        })->where('is_active', true)->where('is_main', "!=", null)->orderByDesc('is_main')->limit(5)->get();
        if ($menus) {
            foreach ($menus as $menu) {
                $postsByCategory[$menu->id] = Post::query()->where('category_id', $menu->id)->where('is_active', true)->orderByDesc('id')->get();
            }
        }
        return view('client.index', compact('newPosts', 'menus', 'postsByCategory', 'mostPopulars', "randomPosts", 'mainPosts', 'allCate'));
    }

}
