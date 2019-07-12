<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'p_name' => 'Bluetooth Speaker',
        'p_model' => 'CH-8989-45678',
        'p_category' => 'Speaker',
        'description' => 'Mini Bluetooth speaker',
        'price' => 2500,
        'quantity' => 8,
        'image' => '',
    ];
});
