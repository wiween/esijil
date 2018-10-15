<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableCertificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('kod_pusat')->after('level')->nullable();
            $table->string('tarikh_ppl')->after('updated_by')->nullable();
            $table->string('nama_syarikat')->after('tarikh_ppl')->nullable();
            $table->integer('negeri_syarikat')->after('nama_syarikat')->nullable();
            $table->dateTime('ndt_sah_mula')->after('negeri_syarikat')->nullable();
            $table->dateTime('ndt_sah_tamat')->after('ndt_sah_mula')->nullable();
            $table->dateTime('tarikh_ndt_terdahulu')->after('ndt_sah_tamat')->nullable();
            $table->dateTime('tarikh_mesy_ndt')->after('tarikh_ndt_terdahulu')->nullable();
            $table->string('nama_program_terdahulu')->after('tarikh_mesy_ndt')->nullable();
            $table->string('no_sijil_dahulu')->after('nama_program_terdahulu')->nullable();
            $table->dateTime('tarikh_sijil_baru_mula')->after('no_sijil_dahulu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('tarikh_ppl');
            $table->dropColumn('nama_syarikat');
            $table->dropColumn('negeri_syarikat');
            $table->dropColumn('ndt_sah_mula');
            $table->dropColumn('ndt_sah_tamat');
            $table->dropColumn('tarikh_ndt_terdahulu');
            $table->dropColumn('tarikh_mesy_ndt');
            $table->dropColumn('nama_program_terdahulu');
            $table->dropColumn('no_sijil_dahulu');
            $table->dropColumn('tarikh_sijil_baru_mula');
        });
    }
}
