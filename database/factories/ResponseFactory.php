<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Response;
use Faker\Generator as Faker;

$factory->define(Response::class, function (Faker $faker) {

    return [
        'response' => $faker->word,
        'latitude' => $faker->word,
        'longitude' => $faker->word,
        'poll_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
