<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $menus = Category::query()->select(['name','id'])->limit(9)->get();
        $newPosts = Post::query()->where('is_active' , true)->orderByDesc('id')->limit(6)->get();
        $mainPosts = Post::query()->where('is_active' , true)->where('is_main',true)->orderByDesc('id')->limit(7)->get();
        $currentDate = Carbon::now()->toDateString();
        $postsInDay = Post::query()->where('is_active' , true)->whereDate('created_at', $currentDate)->limit('6')->get();
        return view('client.homepage',compact('newPosts','mainPosts','postsInDay','menus'));
    }

    public function search(Request $request){
        $keyWord = $request->search;
        $newPosts = Post::query()->where('is_active' , true)->orderByDesc('id')->limit(6)->get();
        $menus = Category::query()->select(['name','id'])->limit(9)->get();
        $posts = Post::query()->where('title','like', '%' . $keyWord . '%')->get();
        return view('client.search',compact('posts','keyWord','menus','newPosts'));
    }
}
