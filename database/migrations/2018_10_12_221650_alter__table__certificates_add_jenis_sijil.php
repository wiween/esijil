<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCertificatesAddJenisSijil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certicates', function (Blueprint $table) {
            $table->string('jenis_sijil')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certicates', function (Blueprint $table) {
            $table->dropColumn('jenis_sijil');
        });
    }
}
