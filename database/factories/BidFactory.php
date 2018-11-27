<?php

use Faker\Generator as Faker;

$factory->define(App\Bid::class, function (Faker $faker) {
    return [
        'email' => $faker->safeEmail,
        'product_id' => \App\Product::active()->get()->random()->id,
        'amount' => $faker->randomFloat(2, 0, 100),
    ];
});
