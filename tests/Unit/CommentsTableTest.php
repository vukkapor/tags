<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Comment;
use App\Post;
use App\User;

class CommentsTableTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCommentsTableHasComment()
    {
        $post = factory(Post::class)->make();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;

        $post->save();

        $post->comments()->saveMany(factory(Comment::class, 5)->make());

        $this->assertEquals(5, $post->comments->count());

    }
}
