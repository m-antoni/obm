<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'Lastname' => 'Beltran',
        'Firstname' => 'Al Andrew Paul',
        'Middlename' => 'Teodosio',
        'email' => 'lamnethuskar4@gmail.com',
        'password' => bcrypt('lamnethuskar13'),
        'type' => 'Super Admin',
    ];
});