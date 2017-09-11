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
        foreach (range(1,99) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
