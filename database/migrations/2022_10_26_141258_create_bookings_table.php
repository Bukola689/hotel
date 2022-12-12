<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('room_type_id');
            $table->string('total_number');
            $table->string('gender');
            $table->string('id_card');
            $table->string('date');
            $table->string('time');
            $table->date('checkin');
            $table->date('checkout')->nullable();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('image');
            $table->string('message');
            $table->text('address');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
