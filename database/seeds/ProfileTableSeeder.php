<?php

use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
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
            DB::table('profiles')->insert([
                'user_id' => $index,
                'username' => User::where('id', '=', $index)->first()->username,
                'bio' => $faker->paragraph(),
                'country' => $faker->countryCode,
                'city' => $faker->city,
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
