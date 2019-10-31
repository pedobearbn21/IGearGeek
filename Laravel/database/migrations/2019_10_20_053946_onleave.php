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
            $table->string('status');
            $table->string('file');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onleave');
    }
}
