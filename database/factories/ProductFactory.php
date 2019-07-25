<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'p_name' => 'Mini Bluetooth',
        'description' => 'Lorem ipsum dolor sit ametconsectetur adipisicing elit Nostru quod consequuntur earum voluptatibus Ipsum eveniet.',
        'price' => 2199,
        'old_price' => 1299,
        'image' => 'noimage.jpg',
    ];
    
});
