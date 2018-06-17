<?php

use Faker\Generator as Faker;

$factory->define(App\Tools::class, function (Faker $faker) {
    return[
        'tl_name' => $faker->name,
        'tl_desc' => $faker->sentence(5),
        'color' => $faker->hexColor,        
    ];
});
