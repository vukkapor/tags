<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Tag;
use App\Post;

class TagsTableTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTagsTableHasTag()
    {
        $post = factory(Post::class)->create();

        $post->tags()->saveMany(factory(Tag::class, 5)->make());

        $this->assertEquals(5, $post->tags->count());

        $this->assertDatabaseHas(
            'post_tag',
            [
                'post_id' => $post->id,
                'tag_id' => $post->tags->first()->id
            ]
        );

        foreach($post->tags as $tag)
        {
            $this->assertDatabaseHas(
                'post_tag',
                [
                    'post_id' => $post->id,
                    'tag_id' => $tag->id
                ]
            );

            //\Log::info($tag);
        }
    }
}
