<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Post;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostsRouteTest()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    //posts create logged in
    public function testCreateValid()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/posts/create');

        $response->assertStatus(200);
    }

    //posts create not logged in
    public function testCreateInvalid()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(302);
    }

    //single post logged in
    public function testSinglePostValid()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
    }
    
    //single post bad id
    public function testSinglePostInvalidId()
    {
        $response = $this->get('/posts/0');

        $response->assertStatus(500);
    }

    //single post string instead of id
    public function testSinglePostInvalidString()
    {
        $response = $this->get('/posts/string');

        $response->assertStatus(500);
    }
}

