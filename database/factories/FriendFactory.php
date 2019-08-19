<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'friend_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
