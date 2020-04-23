<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curricular_id');
            $table->string('level');
            $table->unsignedInteger('course_id');
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
        Schema::dropIfExists('curriculum_courses');
    }
}
