<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __constructor()
    {
        $this->middleware("auth", ["except" => ["index", "show"]]);
    }
    public function index()
    {

        $posts = Post::getPublishedPosts()->with("user")->with("tags")->get();
        
        // $user_id = Post::with("user")->find($id);

        \Log::info($posts);
        return view('posts.index', compact(['posts']));
        /*  if(Auth::check()){
        
        }
        return view("auth.login");*/
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
/* 
        $post = new Post;

        $post->title = request("title");
        $post->body = request("body");
        $post->published = request("published");
        $post->user_id = auth()->user()->id;

        $post->save(); */

        return redirect()->route('all-posts');
    }
}
