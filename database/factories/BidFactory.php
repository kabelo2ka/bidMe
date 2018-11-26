<?php

use Faker\Generator as Faker;

$factory->define(App\Bid::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'product_id' => \App\Product::active()->get()->random()->id
    ];
});
