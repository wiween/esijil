<?php

use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysvarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysvars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 32);
            $table->string('datatype', 32);
            $table->string('value', 255);
            $table->text('desc');
            $table->timestamps();
            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW sysvars");
    }
}
