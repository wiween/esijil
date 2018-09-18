<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CertificateSource
{
    public function certSource()
    {
        return DB::select("select c.nama_pelatih as name, c.ic_or_passport as ic_number,
            d.nama_program as programme_name,
            d.kod_program as programme_code, 'pb' as type,
            substring_index(substring_index(d.kod_program,':', 1),'-',-1) as level,
            e.nama_pusat as pb_name, g.id as state_id,
            if(f.to_visit_date_tamat = '0000-00-00', null, date_format(to_visit_date_tamat,'%m%Y')) as date_ppl,
            a.keputusan_ppl as result_ppl, b.no_batch as batch_id, IFNULL(c.no_rumah, e.alamat_sykt) as address
            from mosq.penilaian_bukan_kredit as a
            join mosq.daftar_batch as b on a.batch_id = b.id
            join mosq.profil_pelatih as c on a.pelatih_id = c.id
            join mosq.program as d on b.program_id = d.id
            join mosq.pb as e on b.pusat_id = e.id
            left join mosq.urus_ppl as f on a.urus_ppl_id = f.id
            join mosq.negeri as g on g.kod_negeri = e.kod_negeri
            where 1 = 1
            and (a.keputusan_ppl = 1
            or a.keputusan_jpp = 1)
            union select a.nama as name, a.no_ic as ic_number, b.nama_program as programme_name, a.kod_program as programme_code, 
            a.jenis_tauliah as type, substring_index(substring_index(a.kod_program,':', 1),'-',-1) as level,
            c.nama_pusat as pb_name, ifnull(d.id,1) as state_id, a.tarikh_ppl as date_ppl, null as result_ppl,
            a.no_batch as batch_id, c.alamat_sykt as address
            from mosq.skm as a
            left join mosq.program as b on b.kod_program = a.kod_program
            left join mosq.pb as c on a.kod_pusat = c.kod_pusat
            left join mosq.negeri as d on d.kod_negeri = c.kod_negeri");
    }
}
