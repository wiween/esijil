<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagCertificateToReplacementTable extends Migration
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
            $table->string('flag_certificate', 50)->default('N');
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
            $table->dropColumn('flag_certificate');
        });
    }
}
