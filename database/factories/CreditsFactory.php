<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Credit::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigitNotNull,
        'credits' => '1000',
        'transaction_number' => '0089345' . rand(1000,9999),
        'image' => 'https://unsplash.com/photos/mnypcmLnXE0',
        'status' => 'PENDING',
        'date' => now(),
    ];
});
