<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function(App\User $user) {
            $user->post()->saveMany(factory(App\Post::class, 5)->make());
        });
    }
}