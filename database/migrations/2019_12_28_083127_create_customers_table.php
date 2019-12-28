<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('room');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('time_left');
            $table->string('check_in_hrs');
            $table->string('time_added')->nullable();
            $table->string('room_type');
            $table->string('assistant');
            $table->integer('foam');
            $table->integer('pax');
            $table->integer('towel');
            $table->integer('blanket');
            $table->integer('total');
            $table->string('status');
            $table->string('encoded_by');

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
        Schema::dropIfExists('customers');
    }
}
