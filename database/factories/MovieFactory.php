<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title'         =>  $faker->name,
        'description'   =>  $faker->paragraph(3,true),
        'year'          =>  $faker->year('now'),
        'popularity'    =>  $faker->numberBetween(1, 5),
        'cover'         =>  $faker->imageUrl(600, 300, 'movies'),
        'director'      =>  $faker->name,
    ];
});

