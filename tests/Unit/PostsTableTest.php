<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostsTableTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostTableHasPost()
    {
        $post = factory(Post::class)->make();

        $post->save();

        $this->assertDatabaseHas(
            'posts',
            [
                'title' => $post->title,
                'body' => $post->body
            ]
        );
    }
}
