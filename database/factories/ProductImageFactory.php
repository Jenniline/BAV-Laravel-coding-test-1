<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImage;
use Faker\Generator as Faker;
use Illuminate\support\Arr;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => Arr::random([1,2,3,4,5,6]),
        'name' => Arr::random(['ekwang.jpeg','eru.jpeg','koki_beans.jpg','ndole.jpeg','pizza.jpg','rice_and_beans.jpeg','stew.jpeg']),
        'path' => '/images',
        'url' => Arr::random([asset('images/koki_beans.jpg'),asset('images/stew.jpeg'), asset('mages/eru.jpeg'), asset('images/ekwang.jpeg'), asset('images/rice_and_beans.jpeg'), asset('images/pizza.jpg'), asset('images/ndole.jpeg') ]),
    ];
});
