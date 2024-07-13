<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public function contentPage($id){
        $newPosts = Post::query()->where('is_active' , true)->orderByDesc('id')->limit(6)->get();
        $menus = Category::query()->select(['name','id'])->limit(9)->get();
        $post = Post::query()->findOrFail($id);
        $postByCategory = Post::query()->where('category_id',$post->category_id )->where('id',"!=", $id)->orderByDesc("id")->limit(8)->get();
        return view('client.contentpage',compact('post','postByCategory','menus','newPosts'));
    }
}
