<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_disabled' => 0,
        'domain' => $faker->domainName,
    ];
});

$factory->state(App\User::class, 'hasRememberToken', function () {
    return [
        'remember_token' => str_random(25)
    ];
});

$factory->state(App\User::class, 'isDisabled', function () {
    return [
        'is_disabled' => 1
    ];
});
