<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenaRoomIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared('
        
        // CREATE TRIGGER id_room BEFORE INSERT ON rooms FOR EACH ROW
        //  BEGIN
        //       INSERT INTO sequence_rooms VALUES (NULL);
        //       SET NEW.room_id = CONCAT("BKR-", LPAD(LAST_INSERT_ID(), 8, "0"));
        //  END
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP TRIGGER "id_room"');
    }
}
