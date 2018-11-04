<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagDkmIntoCertificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('flag_dkm')->after('jenis_sijil')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('flag_dkm');
        });
    }
}
