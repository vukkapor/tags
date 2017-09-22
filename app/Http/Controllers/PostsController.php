<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::getPublishedPosts();
        return view('posts', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('single-post', compact(['post']));
    }
}
