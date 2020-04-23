<?php

use App\Applicant;
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(Applicant::class, 2)->create();
    }
}
