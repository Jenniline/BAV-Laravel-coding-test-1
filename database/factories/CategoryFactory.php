<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => Arr::random(['clothes','shoes','electronics','food', 'drinks']),
    ];
});
