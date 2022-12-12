<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenaBkgIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('gena_bkg_ids', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        // DB::unprepared('
        
        // CREATE TRIGGER id_store BEFORE INSERT ON bookings FOR EACH ROW
        //  BEGIN
        //       INSERT INTO sequence_tbls VALUES (NULL);
        //       SET NEW.bkg_booking_id = CONCAT("BKG-", LPAD(LAST_INSERT_ID(), 8, "0"));
        // END
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP TRIGGER "id_store"');
    }
}
