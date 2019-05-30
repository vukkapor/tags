<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::getPublishedPosts();
        if(Auth::check()){
            return view('posts.index', compact(['posts']));
        }
        return view("auth.login");
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);

        $post = Post::create(request()->all());

        return redirect()->route('all-posts');
    }
}
