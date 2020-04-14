<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class BiodataMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("biodata_mahasiswa", function(Blueprint $table){
            // set up column
            $table->increments("id");
            $table->string("name");
            $table->string("nim")->unique();
            $table->text("address");
            $table->timestamps();

            // soft delete erat kaitannya dengan kolom deleted at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //rollback data
        Schema::drop("biodata_mahasiswa");
    }
}
