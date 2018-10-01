<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;


class StudentExport implements FromQuery, WithHeadings, Responsable
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

    public function currentId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function query()
    {
        return Certificate::query()
            ->select('certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                'states.name', 'certificates.date_ppl',
                'certificates.batch_id', 'certificates.address', 'certificates.qrlink', DB::raw('concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(certificates.date_ppl,\'\'))'))
            ->join('states', 'certificates.state_id', '=', 'states.id')
            ->where('certificates.ic_number', $this->id)->where('certificates.flag_printed', 'N')
            ->where('certificates.source', 'syarikat')->orderBy('certificates.name','asc');
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
            'State ID', 'Tarikh PPL',
            'No Batch', 'Alamat', 'QR Code', 'Footer',
        ];
    }

}
