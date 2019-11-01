<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Onleave extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onleaves', function (Blueprint $table){
            $table->increments('id');
            $table->Integer('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type');
            $table->string('status')->default('pending');
            $table->string('file')->nullable();
            $table->Integer('period')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onleaves');
    }
}
