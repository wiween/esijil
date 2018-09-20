<?php

namespace App;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

use Illuminate\Database\Eloquent\Model;

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
        return Certificate::query()->where('ic_number', $this->id)->where('flag_printed', 'N')
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
            'Nama Program',
            'Kod Program',
            'Jenis Pengajian',
            'Tahap',
            'Nama PB',
            'State ID',
            'Tarikh PPL',
            'Keputusan PPL',
            'No Batch',
            'Alamat',
            'Flag Print',
            'Sumber',
            'Pegawai Bertanggungjawab',
            'No Sijil',
            'QR Code',
            'Remark',
            'printed_remark',
            'Sesi',
            'Status',
            'Status Semasa',
            'Updated By',
            'Created At',
            'Deleted At',
        ];
    }

}
