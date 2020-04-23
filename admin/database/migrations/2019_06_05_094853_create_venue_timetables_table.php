<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_timetables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('venue_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('group_size');
            $table->timestamp('exam_date');
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
        Schema::dropIfExists('venue_timetables');
    }
}
