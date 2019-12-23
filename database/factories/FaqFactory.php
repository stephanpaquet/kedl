<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Faq;
use Illuminate\Support\Str;
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

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence(5),
        'response' => $faker->sentence(6),
    ];
});
