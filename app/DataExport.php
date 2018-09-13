<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/06/2018
 * Time: 17:10
 */

namespace App;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

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
        return Certificate::query()->where('batch_id', $this->batch)->where('flag_printed', 'N')
            ->where('source', 'syarikat')->orderBy('name','asc');
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
            'Id',
            'Name',
            'NoKP',
            'Batch No',
            'Jenis',
        ];
    }

}
