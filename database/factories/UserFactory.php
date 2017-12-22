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

// $factory->define(App\User::class, function (Faker $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Models\Devotion::class, function (Faker $faker) {
    return [
        'type' => 'text',
        'title' => $faker->name,
        'description' => $faker->name,
        'body' => $faker->name,
        'confession' => $faker->name,
        'cover_image' => $faker->imageUrl('cats'),
        'prayer' => $faker->name,
        'further_reading' => $faker->name,
        'bible_verse' => $faker->name,
        'category_id' => rand(1, 10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->name,
        'cover_image' => $faker->imageUrl('cats')
    ];
});
