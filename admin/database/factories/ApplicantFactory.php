<?php

use App\Applicant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Applicant::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'place_of_birth' => $faker->state,
        'sex' => array_random(['Male', 'Female']),
        'title' => $faker->title,
        'marital_status' => array_random(['Single', 'Married']),
        'previous_surname' => array_random([null, $faker->lastName]),
        'national_id' => Str::random(10),
        'race' => array_random(['Blake', 'White']),
        'nationality' => $faker->country,
        'citizenship' => $faker->country,
        'province' => $faker->state,
        'religion' => array_random(['Chritianity', 'ATR']),
        'war_veteran' => array_random(["yes", "no"]),
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
        'next_of_kin_name' => $faker->name,
        'relationship' => $faker->word,
        'next_of_kin_address' => $faker->address,
        'next_of_kin_phone' => $faker->e164PhoneNumber,
        'first_choice_programme' => $faker->jobTitle,
        'second_choice_programme' => $faker->jobTitle,
        'third_choice_programme' => $faker->jobTitle,
        'entry_type' => array_random(['Normal', 'Mature', 'Special']),
        'intake_type' => array_random(['Full time', 'Parallel', 'Block Release']),
        'sponsorship' => array_random(['Government', 'Self', 'Beam']),
        'o_level_academic_year' => array_random(['June ', 'Nov ']).$faker->year($max = 'now'),
        'o_level_exam_board' => array_random(['Cambridge', 'ZIMSEC']),
        'o_level_subjects' => 'Mathematics, English'.','.$faker->word.','. $faker->word. ','.$faker->word,
        'o_level_grade' => array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']),
        'a_level_academic_year' => array_random(['June ', 'Nov ']).$faker->year($max = 'now'),
        'a_level_exam_board' => array_random(['Cambridge', 'ZIMSEC']),
        'a_level_subjects' => $faker->word.','.$faker->word.','.$faker->word,
        'a_level_grade' => array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']).','.array_random(['B', 'C', 'A']),
        'refree_one_name' => $faker->name,
        'refree_one_address' => $faker->address,
        'refree_one_phone' => $faker->e164PhoneNumber,
        'refree_two_name' => $faker->name,
        'refree_two_address' => $faker->address,
        'refree_two_phone' => $faker->e164PhoneNumber
    ];
});
