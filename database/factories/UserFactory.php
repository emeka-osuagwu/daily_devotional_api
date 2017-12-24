<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) { 
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Devotion::class, function (Faker $faker) {
    return [
        'type' => 'text',
        'title' => $faker->name,
        'description' => $faker->text($maxNbChars = 100),
        'body' => $faker->text($maxNbChars = 1000),
        'confession' => $faker->text($maxNbChars = 200),
        'cover_image' => $faker->imageUrl('cats'),
        'prayer' => $faker->text($maxNbChars = 200),
        'further_reading' => $faker->text($maxNbChars = 100),
        'bible_verse' => $faker->text($maxNbChars = 100),
        'category_id' => rand(1, 10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text($maxNbChars = 100),
        'cover_image' => $faker->imageUrl('cats')
    ];
});
