<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate();
        return view('welcome', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
}
