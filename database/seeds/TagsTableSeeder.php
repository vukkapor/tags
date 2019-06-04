<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Blog',
            'Fresh',
            'New',
            'Hot',
            'Old'
        ];
        //brisanje post_tag iz baze
        App\Post::all()->each(function (App\Post $post) {
            $post->tags()->detach();
        });
        //brisanje tag iz baze
        App\Tag::truncate();

        foreach ($values as $value) {
            App\Tag::create([
                'name' => $value
            ]);
        }

        App\Post::all()->each(function (App\Post $post) {
            $randomIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            $post->tags()->attach($randomIds);
        });
    }
}
