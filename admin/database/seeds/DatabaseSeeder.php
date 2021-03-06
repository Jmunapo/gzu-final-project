<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->call('migrate:fresh');
        $this->call(UsersTableSeeder::class);
        //$this->call(StudentsTableSeeder::class);
        //$this->call(ApplicantsTableSeeder::class);
    }
}
