<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Modules\SupportDesk\Models\Comment::class, function (Faker $faker) {
    return [
        'ticket_id' => null,
        'user_id' => null,
        'comment' => $faker->paragraph
    ];
});
