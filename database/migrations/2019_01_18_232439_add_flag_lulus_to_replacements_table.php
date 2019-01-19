<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagLulusToReplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('replacements', function (Blueprint $table) {
            //
            $table->string('flag_lulus')->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('replacements', function (Blueprint $table) {
            //
            $table->dropColumn('flag_lulus');
        });
    }
}
