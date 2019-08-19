<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Credit::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigitNotNull,
        'credits' => '5000',
        'date' => now(),
    ];
});
