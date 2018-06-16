<?php

use Faker\Generator as Faker;

$factory->define(App\Events::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'eventDate' => $faker->dateTimeThisMonth(),
        'endDate' => $faker->dateTimeThisMonth(),
        'startTime' =>$faker->time(),
        'endTime' =>$faker->time(),
        'pid' => $faker->randomDigitNotNull,
        'tl_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->dateTimeThisMonth(),
    ];
});
