<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/06/2018
 * Time: 17:10
 */

namespace App;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromQuery, WithHeadings, Responsable
{
    use Exportable; //guna Exportable

    //private $fileName = 'pelajar.xlsx'; // nama fail excel yang nak download tu

    /**
     * @param $batch
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
//    public function collection()
//    {
//        //Guna database apa, lepas tu pilih column yang nak di download dalam excel
//        return Certificate::select('id', 'name', 'ic_number', 'batch_id', 'type')->get();
//
//        //Kalau nak download semua column, guna seperti di bawah
////        return User::all();
//
//    }

    public function currentBatch($batch)
    {
        $record = Certificate::where('batch_id', $batch)->firstOrFail();

        $this->batch = $batch;
        $this->type = $record->type;
        
        return $this;
    }

    public function query()
    {
        switch($this->type)
        {
            case 'ndt':
                return Certificate::query()
                    ->select(
                        'certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                        'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                        'states.name', 'certificates.batch_id', 'certificates.address',
                        'certificates.qrlink', 'certificates.tarikh_ppl', DB::raw('ifnull(date_format(certificates.ndt_sah_mula, \'%d-%m-%Y\'),\'\')'),
                        DB::raw('ifnull(date_format(certificates.ndt_sah_tamat,\'%d-%m-%Y\'),\'\')'), DB::raw('ifnull(date_format(tarikh_ndt_terdahulu,\'%d-%m-%Y\'),\'\')'), DB::raw('ifnull(date_format(certificates.tarikh_mesy_ndt,\'%d-%m-%Y\'),\'\')'),
                        'certificates.nama_program_terdahulu', 'certificates.no_sijil_dahulu', DB::raw('ifnull(date_format(certificates.tarikh_sijil_baru_mula,\'%d-%m-%Y\'),\'\')'),
                        'certificates.jenis_sijil',
                        DB::raw('concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.kod_pusat,\'\'), "-", ifnull(date_format(certificates.tarikh_mesy_ndt, \'%Y-%m-%d\'),\'\'))')
                    )
                    ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                    ->where('certificates.batch_id', $this->batch)->where('certificates.flag_printed', 'N')
                    ->where('certificates.source', 'syarikat')->orderBy('certificates.Name', 'asc');
                break;

            case 'sldn':
                return Certificate::query()
                    ->select(
                        'certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                        'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                        'states.name', 'certificates.batch_id', 'nama_syarikat', 'address',
                        'states2.name as name2', 'certificates.qrlink', DB::raw('concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(date_format(certificates.tarikh_ppl, \'%d-%m-%Y\'),\'\'))')
                    )
                    ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                    ->leftJoin('states as states2', 'certificates.negeri_syarikat', '=', 'states2.id')
                    ->where('certificates.batch_id', $this->batch)->where('certificates.flag_printed', 'N')
                    ->where('certificates.source', 'syarikat')->orderBy('certificates.Name', 'asc');
                break;

            case 'pb':
                return Certificate::query()
                    ->select(
                        'certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                        'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                        'states.name', 'certificates.batch_id', 'certificates.address',
                        'certificates.qrlink', DB::raw('concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(certificates.date_ppl,\'\'))')
                    )
                    ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                    ->where('certificates.batch_id', $this->batch)->where('certificates.flag_printed', 'N')
                    ->where('certificates.source', 'syarikat')->orderBy('certificates.Name', 'asc');
                break;

            default:
                return Certificate::query()
                    ->select(
                        'certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                        'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                        'states.name', 'certificates.batch_id', 'certificates.address',
                        'certificates.qrlink', DB::raw('concat(ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.date_ppl,\'\'), "-", ifnull(certificates.batch_id, \'\'))')
                    )
                    ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                    ->where('certificates.batch_id', $this->batch)->where('certificates.flag_printed', 'N')
                    ->where('certificates.source', 'syarikat')->orderBy('certificates.Name', 'asc');
                break;
        }
    }


//    public function collection()
//    {
//        //Guna database apa, lepas tu pilih column yang nak di download dalam excel
//        return Certificate::select('id', 'name', 'email', 'role', 'status')->query();
//
//        //Kalau nak download semua column, guna seperti di bawah
////        return User::all();
//
//    }



    public function headings(): array
    {
        //Ini untuk beri nama column
        switch($this->type)
        {
            case 'ndt':
                return [
                    'Name', 'NoKP', 'Nama Program',
                    'Kod Program', 'Tahap', 'Nama PB',
                    'State ID', 'No Batch', 'Alamat',
                    'QR Code', 'Tarikh PPL', 'NDT Sah Mula',
                    'NDT Sah Tamat', 'Tarikh NDT Terdahulu', 'Tarikh Mesyuarat NDT',
                    'Nama Program Terdahulu', 'No Sijil Terdahulu', 'Tarikh Sijil Baru Mula',
                    'Jenis Sijil', 'Footer',
                ];
                break;

            case 'sldn':
                return [
                    'Name', 'NoKP', 'Nama Program',
                    'Kod Program', 'Tahap', 'Nama PB',
                    'State ID', 'No Batch', 'Nama Syarikat', 'Alamat',
                    'Negeri Syarikat', 'QR Code', 'Footer',
                ];
                break;

            default:
                return [
                    'Name', 'NoKP', 'Nama Program',
                    'Kod Program', 'Tahap', 'Nama PB',
                    'State ID', 'No Batch', 'Alamat',
                    'QR Code', 'Footer',
                ];
                break;
        }

    }
}
