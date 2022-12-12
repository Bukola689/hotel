<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenaCusIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('gena_cus_ids', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        // DB::unprepared('
        
        // CREATE TRIGGER id_store_cus BEFORE INSERT ON customers FOR EACH ROW
        //  BEGIN
        //       INSERT INTO sequence_cuses VALUES (NULL);
        //       SET NEW.bkc_customer_id = CONCAT("BKC-", LPAD(LAST_INSERT_ID(), 8, "0"));
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
        Schema::dropIfExists('DROP TRIGGER "id_store_cus"');
    }
}
