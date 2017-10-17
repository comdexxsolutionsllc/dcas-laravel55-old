<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->state(App\Admin::class, 'testing', function () {
    return [
        'name' => 'Sarah Renner',
        'email' => 'sarah@sarahrenner.work',
        'username' => 'srenner',
        'password' => bcrypt('secret'),
        'slug' => 'sarah-renner',
        'is_disabled' => 0,
        'role_id' => 1,
        'role_type' => 'Super Administrator',
    ];
});
