<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){

    	$title = 'Welcome to my blog';
    	$posts = Post::where(['published' => '1'])->orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts'=>$posts, 'title'=>$title]);
    }
}
