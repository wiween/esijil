<?php
namespace App\Repositories;

use App\Certificate;
use Illuminate\Support\Facades\DB;

class CertificateSource
{
    public function certSource()
    {
        return DB::select("select c.nama_pelatih as name, c.ic_or_passport as ic_number,
            d.nama_program as programme_name,
            d.kod_program as programme_code, 'pb' as type,
            substring_index(substring_index(d.kod_program,':', 1),'-',-1) as level, e.kod_pusat as kod_pusat,
            e.nama_pusat as pb_name, g.id as state_id,
            if(f.to_visit_date_tamat = '0000-00-00', null, date_format(to_visit_date_tamat,'%m%Y')) as date_ppl,
            null as result_ppl, b.no_batch as batch_id, e.alamat as address,
            if(f.to_visit_date_tamat = '0000-00-00', null, date_format(to_visit_date_tamat,'%m%Y')) as tarikh_ppl, null as nama_syarikat, null as negeri_syarikat, null as ndt_sah_mula,
            null as ndt_sah_tamat, null as tarikh_ndt_terdahulu, null as tarikh_mesy_ndt, null as nama_program_terdahulu,
            null as no_sijil_dahulu, null as tarikh_sijil_baru_mula, null as jenis_sijil
            from mosq.penilaian_bukan_kredit as a
            left join mosq.daftar_batch as b on a.batch_id = b.id
            left join mosq.profil_pelatih as c on a.pelatih_id = c.id
            join mosq.program as d on b.program_id = d.id
            join mosq.pb as e on b.pusat_id = e.id
            left join mosq.urus_ppl as f on a.urus_ppl_id = f.id
            join mosq.negeri as g on g.kod_negeri = e.kod_negeri
            where 1 = 1
            and a.keputusan_ppl = 1
            and a.keputusan_jpp = 1
            union select a.nama as name, a.no_ic as ic_number, b.nama_program as programme_name, a.kod_program as programme_code, 
            case 
            	when a.jenis_tauliah=1 then 'pb'
            	when a.jenis_tauliah=2 then 'sldn'
            	when a.jenis_tauliah=3 then 'ppt'
            	when a.jenis_tauliah=4 then 'ndt'
            END as type,
            a.tahap as level, c.kod_pusat as kod_pusat,
            c.nama_pusat as pb_name, ifnull(d.id,1) as state_id, a.tarikh_ppl as date_ppl, null as result_ppl,
            a.no_batch as batch_id, a.alamat as address,
            a.tarikh_ppl as tarikh_ppl, a.nama_syarikat as nama_syarikat, e.id as negeri_syarikat, a.ndt_sah_mula as ndt_sah_mula,
            a.ndt_sah_tamat as ndt_sah_tamat, a.tarikh_ndt_dahulu as tarikh_ndt_terdahulu, a.tarikh_mesyuarat_ndt as tarikh_mesy_ndt, a.nama_program_terdahulu as nama_program_terdahulu,
            a.no_sijil_dahulu as no_sijil_dahulu, a.ndt_sah_mula as tarikh_sijil_baru_mula,
            CASE
                when a.jenis_sijil_ndt=1 then 'BAHARU'
                when a.jenis_sijil_ndt=2 then 'PEMBAHARUAN'
                when a.jenis_sijil_ndt=3 then 'PERSIJILAN SEMULA'
            END as jenis_sijil
            from mosq.skm as a
            left join mosq.program as b on b.kod_program = a.kod_program
            left join mosq.pb as c on a.kod_pusat = c.kod_pusat
            left join mosq.negeri as d on d.kod_negeri = c.kod_negeri
            left join mosq.negeri as e on a.negeri_syarikat = e.kod_negeri
            where 1 = 1
            and a.sebab_cetak = 0
            and a.jenis_tauliah <> 3
            union select a.nama as name, a.no_ic as ic_number, b.nama_program as programme_name, a.kod_program as programme_code, 
            case 
            	when a.jenis_tauliah=1 then 'pb'
            	when a.jenis_tauliah=2 then 'sldn'
            	when a.jenis_tauliah=3 then 'ppt'
            	when a.jenis_tauliah=4 then 'ndt'
            END as type,
            a.tahap as level, c.kod_pusat as kod_pusat,
            c.nama_pusat as pb_name, ifnull(d.id,1) as state_id, a.tarikh_ppl as date_ppl, null as result_ppl,
            a.no_batch as batch_id, a.alamat as address,
            a.tarikh_ppl as tarikh_ppl, a.nama_syarikat as nama_syarikat, e.id as negeri_syarikat, a.ndt_sah_mula as ndt_sah_mula,
            a.ndt_sah_tamat as ndt_sah_tamat, a.tarikh_ndt_dahulu as tarikh_ndt_terdahulu, a.tarikh_mesyuarat_ndt as tarikh_mesy_ndt, a.nama_program_terdahulu as nama_program_terdahulu,
            a.no_sijil_dahulu as no_sijil_dahulu, a.ndt_sah_mula as tarikh_sijil_baru_mula,
            CASE
                when a.jenis_sijil_ndt=1 then 'BAHARU'
                when a.jenis_sijil_ndt=2 then 'PEMBAHARUAN'
                when a.jenis_sijil_ndt=3 then 'PERSIJILAN SEMULA'
            END as jenis_sijil
            from mosq.skm as a
            left join mosq.program as b on b.kod_program = a.kod_program
            left join mosq.pb as c on a.kod_pusat = c.kod_pusat
            left join mosq.negeri as d on d.kod_negeri = c.kod_negeri
            left join mosq.negeri as e on a.negeri_syarikat = e.kod_negeri
            where 1 = 1
            and a.sebab_cetak = 0
            and a.jenis_tauliah = 3");
    }

    public function updateSKMSource()
    {
        return DB::select("select b.`id_skm`, a.`name`, a.`ic_number`, a.`certificate_number`, a.`date_print`
            from certificates a
            join mosq.skm b on (a.ic_number = b.no_ic 
            and a.batch_id = b.no_batch 
            and a.`programme_code`=b.`kod_program`)
            where a.certificate_number is not null
            and a.date_print is not null");
    }

    public function fallbackFalse()
    {
        return DB::select("select c.ic_or_passport as ic_number,
	        b.no_batch as batch_id
            from mosq.penilaian_bukan_kredit as a
            left join mosq.daftar_batch as b on a.batch_id = b.id
            left join mosq.profil_pelatih as c on a.pelatih_id = c.id
            join mosq.program as d on b.program_id = d.id
            join mosq.pb as e on b.pusat_id = e.id
            left join mosq.urus_ppl as f on a.urus_ppl_id = f.id
            join mosq.negeri as g on g.kod_negeri = e.kod_negeri
            where 1 = 1
            and a.keputusan_ppl = 0
            and a.keputusan_jpp = 0");
    }

    public function numToWord($num)
    {
        switch (trim($num)) {
            case '0':
                return 'kosong';
                break;
            case '1':
                return 'satu';
                break;
            case '2':
                return 'dua';
                break;
            case '3':
                return 'tiga';
                break;
            case '4':
                return 'empat';
                break;
            case '5':
                return 'lima';
                break;
            case '6':
                return 'enam';
                break;
            case '7':
                return 'tujuh';
                break;
            case '8':
                return 'lapan';
                break;
            case '9':
                return 'sembilan';
                break;
            default:
                return trim($num);
                break;
        }
    }

    public function updateCertificateToY()
    {
        Certificate::whereNotNull('certificate_number')
            ->update(['flag_printed' => 'Y']);
    }
}
