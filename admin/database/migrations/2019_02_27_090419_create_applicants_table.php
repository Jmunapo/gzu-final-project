<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 200);
            $table->string('lastname', 100);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('sex',10);
            $table->string('title');
            $table->string('marital_status');
            $table->string('previous_surname')->nullable();
            $table->string('national_id_number',32);
            $table->string('race',10);
            $table->string('nationality');
            $table->string('citizenship');
            $table->string('province');
            $table->string('religion');
            $table->string('physical_disability')->nullable();
            $table->string('war_veteran');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('next_of_kin_name');
            $table->string('relationship');
            $table->string('next_of_kin_address');
            $table->string('next_of_kin_phone');
            $table->string('first_choice_programme');
            $table->string('second_choice_programme');
            $table->string('third_choice_programme');
            $table->string('entry_type');
            $table->string('intake_type');
            $table->string('sponsorship');

            $table->string('o_level_academic_year')->nullable();
            $table->string('o_level_exam_board');
            $table->string('o_level_subjects');
            $table->string('o_level_grade');

            $table->string('a_level_academic_year')->nullable();
            $table->string('a_level_exam_board')->nullable();
            $table->string('a_level_subjects')->nullable();
            $table->string('a_level_grade')->nullable();

            $table->string('award_year')->nullable();
            $table->string('programme_name')->nullable();
            $table->string('college_name')->nullable();
            $table->string('degree_class')->nullable();
            $table->string('college_adress')->nullable();
            $table->string('college_phone')->nullable();

            $table->string('organisation')->nullable();
            $table->string('occupation')->nullable();
            $table->string('duties')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();

            $table->string('refree_one_name');
            $table->string('refree_one_address');
            $table->string('refree_one_phone');

            $table->string('personal_documents');
            $table->string('academic_certificates');

            $table->string('refree_two_name')->nullable();
            $table->string('refree_two_address')->nullable();
            $table->string('refree_two_phone')->nullable();

            $table->boolean('accepted')->default(false);
            $table->boolean('paid')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
