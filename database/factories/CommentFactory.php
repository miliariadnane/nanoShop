<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'updated_at' => $faker->dateTimeBetween('-1 years')
    ];
});
