<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->string('programme_code');
            $table->string('graduate_level');
            $table->string('programme_name');
            $table->float('fees_new', 8, 2);
            $table->float('fees_returning', 8, 2);
            $table->string('conventional_duration')->nullable();
            $table->string('block_duration')->nullable();
            $table->longText('normal_entry_requirements')->nullable();
            $table->longText('mature_entry_requirements')->nullable();
            $table->longText('special_entry_requirements')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('programmes');
    }
}
