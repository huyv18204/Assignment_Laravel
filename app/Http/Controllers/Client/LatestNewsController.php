<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    public function index($id){
        $allCate = Category::query()->select(['name','id'])->limit(10)->get();
        $post = Post::query()->findOrFail($id);
        $postByCategory = Post::query()->where('category_id',$post->category_id )->where('id',"!=", $id)->orderByDesc("id")->limit(8)->get();
        return view('client.latest_news',compact('post','postByCategory','allCate'));
    }
}
