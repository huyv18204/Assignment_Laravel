<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(){
        $allCate = Category::query()->select(['name', 'id'])->limit(10)->get();
        return view('client.contact',compact('allCate'));
    }
}
