<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'libelle' => $faker->sentence(1),
    ];
});
