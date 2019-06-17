<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {  
    return [
        'title' => $faker->sentences(1, true),
        'body' => $faker->text(240),
        'published' => $faker->randomElement([true, false])
    ];

});

$factory->define(App\Comment::class, function(Faker\Generator $faker) {
    return [
        'author' => $faker->name,
        'text' => $faker->sentences(1, true)
    ];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->text
    ];
});