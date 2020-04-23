<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /*protected $guarded =  [
        "id",
        "accepted"
    ];*/
    protected $fillable = [
        'firstname',
        'lastname',
        'date_of_birth',
        'place_of_birth',
        'sex',
        'title',
        'marital_status',
        'previous_surname',
        'national_id_number',
        'race',
        'nationality',
        'citizenship',
        'province',
        'religion',
        'physical_disability',
        'war_veteran',
        'address',
        'phone',
        'email',
        'next_of_kin_name',
        'relationship',
        'next_of_kin_address',
        'next_of_kin_phone',
        'first_choice_programme',
        'second_choice_programme',
        'third_choice_programme',
        'entry_type',
        'intake_type',
        'sponsorship',
        'o_level_academic_year',
        'o_level_exam_board',
        'o_level_subjects',
        'o_level_grade',
        'a_level_academic_year',
        'a_level_exam_board',
        'a_level_subjects',
        'a_level_grade',
        'award_year',
        'programme_name',
        'college_name',
        'degree_class',
        'college_adress',
        'college_phone',

        'organisation',
        'occupation',
        'duties',
        'from_date',
        'to_date',

        'refree_one_name',
        'refree_one_address',
        'refree_one_phone',
        'refree_two_name',
        'refree_two_address',
        'refree_two_phone',

        "personal_documents",
        "academic_certificates"
    ];

}
