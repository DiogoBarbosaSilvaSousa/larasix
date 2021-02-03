<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' => 1,
        'thumbnail' => 'img/'.rand(1,16).'.jpg',
        'created_at' => now(),
    ];
});
