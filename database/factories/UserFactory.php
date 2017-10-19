<?php

use Faker\Generator as Faker;
use App\{Permission, Role};

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

$factory->state(App\User::class, 'testing', function () {
    return [
        'name' => 'Sarah Renner',
        'email' => 'sarah@sarahrenner.work',
        'username' => 'srenner',
        'password' => bcrypt('secret'),
        'slug' => 'sarah-renner',
        'is_disabled' => 0,
    ];
});

//$factory->state(App\User::class, 'setupTesting', function (Role $role, Permission $permission) {
//    $super_admin = Role::where('name', '=', 'super_admin')->first();
//    $manageSystem = Permission::where('name', '=', 'manage-system')->first();
//    $super_admin->attachPermission($manageSystem);
//
//    $user = User::where('username', '=', 'srenner')->first();
//    $user->attachRole($super_admin);
//});

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
