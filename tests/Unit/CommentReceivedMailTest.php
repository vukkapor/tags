<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentReceived;

class CommentReceivedMailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testComentReceivedMailSent()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->save();
/* 
        \Log::info($post);
        \Log::info($user);
 */
        Mail::fake();

        $response = $this
            ->post('/posts/' . $post->id . '/comments', ['author' => $user->name, 'text' => 'test for mail sent']);
        //\Log::info($response);
        //dd($user, $post);
        //$result = json_decode($response->getContent(), true);
        //dd($result['message']);
        //Log::info($response->getStatusCode());
        //dd($response->getStatusCode());
        //dd($response->getContent());
        Mail::assertSent(CommentReceived::class, function($mail) use ($post){
            return $mail->post->id === $post->id;
        });
    }
}
