<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'reference' => $faker->ean8,
        'user_id' => $faker->randomElement(array('1', '2','3','4','5')),
        'product_id' => $faker->randomElement(array('1', '2','3','4','5')),
        'quantity' => $faker->randomDigit,
        'price' => $faker->randomElement(array('2199', '1299', '3199')),
        'status' => 'pending',
        'payment' => $faker->randomElement(array('cod', 'bank')),
        'date' => now(),
    ];
});
