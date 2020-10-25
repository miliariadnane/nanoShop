<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstNameMale,
        'lastName' => $faker->lastName,
        'username' => $faker->userName,
        'birthDate' => $faker->date(),
        'email' => $faker->unique()->safeEmail,
        'sexe' => "H",
        'status' => "0",
        'phoneNumber' => $faker->phoneNumber, 
        'address' => $faker->sentence(18),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
