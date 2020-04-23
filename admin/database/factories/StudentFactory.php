<?php

use App\Student;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    static $count = 0;
    return [
        'reg_number' => 'M'.substr(now()->year, 2).str_pad($count++ + 1, 4, 0, STR_PAD_LEFT),
        'gender' => array_random(['Male', 'Female']),
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'programme_id' => 1,
        'intake_type' => array_random(['Conventional', 'Block Release']),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
