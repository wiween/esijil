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
        $this->batch = $batch;

        return $this;
    }

    public function query()
    {
        return Certificate::query()
            ->select('certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                'certificates.programme_code',DB::raw('ucase(certificates.level)'),'certificates.pb_name',
                'states.name', 'certificates.batch_id',
                'certificates.address', 'certificates.qrlink',
                DB::raw('if(certificates.type=\'ndt\', concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.kod_pusat,\'\'), "-", ifnull(certificates.date_ppl,\'\')), concat(ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.date_ppl,\'\'), "-", ifnull(certificates.batch_id, \'\')))')
            )
            ->join('states', 'certificates.state_id', '=', 'states.id')
            ->where('certificates.batch_id', $this->batch)->where('certificates.flag_printed', 'N')
            ->where('certificates.source', 'syarikat')->orderBy('certificates.Name','asc');
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
        return [
            'Name', 'NoKP', 'Nama Program',
            'Kod Program', 'Tahap', 'Nama PB',
            'State ID', 'No Batch',
            'Alamat', 'QR Code', 'Footer',
        ];
    }

}
