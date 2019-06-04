<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);
        $user = User::find($post->user);
        \Log::info($user);
        $this->validate(request(), Comment::STORE_RULES);

        $post->comments()->create(request()->all());
        \Log::info($post);
        \Mail::to($post->user->email)->send(new CommentReceived($post));

        return redirect()->route('single-post', ['id' => $postId]);
    }
}
