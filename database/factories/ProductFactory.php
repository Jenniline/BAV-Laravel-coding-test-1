<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Arr::random([1,2,3,4,5,6]),
        'name' => Arr::random(['shirt','canvas shoes','radio','fufu corn', 'wine']),
        'description' => $faker->paragraph,
        'price' => $faker->randomDigit,
    ];
});
