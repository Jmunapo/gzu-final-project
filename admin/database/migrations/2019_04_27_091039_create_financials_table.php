<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_number');
            $table->string('fees_type'); //Tution...
            $table->string('payment_type'); //Cash...
            $table->string('bank_refrence')->nullable(); //Ecocash Ref...
            $table->string('paid_by')->nullable();
            $table->float('amount');
            $table->string('status');
            $table->string('refrence_number')->unique();
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
        Schema::dropIfExists('financials');
    }
}
