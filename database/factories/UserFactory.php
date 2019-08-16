<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });

$factory->define(User::class, function (Faker $faker) {
    return [
        'first' => $faker->firstName,
        'middle' => $faker->lastName,
        'last' => $faker->lastName,
        'phone' => '0939' . rand(1000000, 9999999),
        'city' => $faker->city,
        'barangay' => $faker->state,
        'zipcode' => $faker->postcode,                               
        'street' => $faker->streetAddress,
        'email' => $faker->unique()->safeEmail,
        'isBan' => false,
        'referral_key' => str_random(12),
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'referral_key' => strtoupper(str_random(10)),
        'remember_token' => str_random(30)
    ];
});
