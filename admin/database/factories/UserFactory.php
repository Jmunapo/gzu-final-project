<?php

use App\User;
use Illuminate\Support\Str;
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
    static $count = 0;
    return [
        'staff_id' => 'E'.substr(now()->year, 2).str_pad($count++ + 1, 4, 0, STR_PAD_LEFT),
        'gender' => array_random(['Male', 'Female']),
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'job_title' => array_random(['Payroll Manager', 'Associate Director', 'Accounting Manager']),
        'role' => array_random(['Webmaster', 'Librarian', 'Receptionist']),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
