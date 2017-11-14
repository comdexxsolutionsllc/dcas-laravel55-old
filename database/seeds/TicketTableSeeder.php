<?php

use App\User;
use Carbon\Carbon;
use DCAS\Classes\TicketId;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\SupportDesk\Models\Category;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $category_ids = Category::pluck('id')->toArray();
        $statuses = [
            'Open',
            'Assigned',
            'On Hold',
            'Pending Customer Response',
            'Awaiting Manager Review',
            'Closed'
        ];
        $user_ids = User::pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('tickets')->insert([
                'user_id' => $faker->randomElement($user_ids),
                'category_id' => $faker->randomElement($category_ids),
                'ticket_id' => TicketId::generate(),
                'title' => $faker->sentence(4),
                'priority' => rand(1, 10),
                'message' => $faker->paragraph(),
                'status' => $faker->randomElement($statuses),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
