<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(10),
        'short_description' => $faker->unique()->text(500),
        'number' => $faker->unique()->numberBetween(1, 999),
    ];
});
