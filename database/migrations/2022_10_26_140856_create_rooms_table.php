<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->nullable();
            $table->string('ac_no_ac');
            $table->integer('room_type_id');  
            $table->string('charges_for_cancellation');
            $table->string('food');
            $table->string('bed_count');
            $table->string('rent');
            $table->string('phone_number');
            $table->string('file_upload');
            $table->longText('message');
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
        Schema::dropIfExists('rooms');
    }
}
