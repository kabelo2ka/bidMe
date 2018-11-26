<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'user_id' => App\User::get()->random()->id,
        'sku' => $faker->unique()->text(6),
        'name' => $faker->word,
        'image_url' => $faker->imageUrl(),
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 1, 100000),
        'active' => $faker->boolean(80),
    ];
});
