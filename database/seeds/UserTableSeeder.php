<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 99) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'is_admin' => $faker->boolean(20),
                'is_disabled' => $faker->boolean(8.72),
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
