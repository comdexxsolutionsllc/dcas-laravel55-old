<?php

use Faker\Generator as Faker;

$factory->define(\Modules\SupportDesk\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
