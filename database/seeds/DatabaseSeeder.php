<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var array
     */
    private $tables = [
        'users'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        Eloquent::unguard();

        $this->call(UserTableSeeder::class);
    }

    private function cleanDatabase()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");

        foreach ($this->tables as $tableName) {
            DB::table($tableName)->truncate();
        }

        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
