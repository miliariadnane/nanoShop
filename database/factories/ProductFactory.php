<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(25),
        'unit' => $faker->word,
        'product_quantity' => $faker->randomDigitNotNull,
        'price' => $faker->randomFloat,
        'sale_price' => $faker->randomFloat,
        'status' => "1",
        'meta_title' => $faker->sentence(10),
        'meta_description' => $faker->sentence(18),
    ];
});
