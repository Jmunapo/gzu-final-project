<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToRegisteredStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registered_students', function (Blueprint $table) {
            $table->timestamp('exam_date')->after('course_code')->nullable();
            $table->unsignedInteger('venue_id')->after('exam_date')->nullable();
            $table->unsignedInteger('sitting_position')->after('venue_id')->nullable();
            $table->boolean('status')->after('sitting_position')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registered_students', function (Blueprint $table) {
            $table->dropColumn(['exam_date','venue_id','sitting_position','status']);
        });
    }
}
