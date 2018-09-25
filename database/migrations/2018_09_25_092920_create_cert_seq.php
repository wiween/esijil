<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertSeq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `certseq` AS 
            select a.abjad, max(a.seq) as run_num from (
                select substr(certificate_number,1,length(certificate_number)-6) as abjad,
                convert(substr(certificate_number,-6,6), UNSIGNED INTEGER) as seq 
                from certificates
                where certificate_number is not null
                order by 2) as a
            group by a.abjad ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW certseq");
    }
}
