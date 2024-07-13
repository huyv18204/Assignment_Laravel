<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index($id){
        $category = Category::query()->select('name')->where('id',$id)->first();
        $menus = Category::query()->select(['name','id'])->limit(10)->get();
        $newPosts = Post::query()->where('is_active' , true)->orderByDesc('id')->limit(6)->get();
        $mainPosts = Post::query()->where('category_id', $id)->where('is_active' , true)->where('is_main',true)->orderByDesc('id')->limit(7)->get();
        $currentDate = Carbon::now()->toDateString();
        $postsInDay = Post::query()->where('category_id', $id)->where('is_active' , true)->whereDate('created_at', $currentDate)->limit('6')->get();
        return view('client.categorypage',compact('newPosts','mainPosts','postsInDay','menus','category'));
    }

}
