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
        $record = Certificate::where('ic_number', $id)->firstOrFail();

        $this->id = $id;
        $this->type = $record->type;

        return $this;
    }

    public function query()
    {
        if ($this->type == 'ndt') {
            return Certificate::query()
                ->select(
                    'certificates.Name',
                    'certificates.ic_number',
                    'certificates.programme_name',
                    'certificates.programme_code',
                    DB::raw('ucase(certificates.level)'),
                    'certificates.pb_name',
                    'states.name',
                    'certificates.batch_id',
                    'certificates.address',
                    'certificates.qrlink',
                    'tarikh_ppl',
                    'nama_syarikat',
                    'states2.name as name2',
                    'ndt_sah_mula',
                    'ndt_sah_tamat',
                    'tarikh_ndt_terdahulu',
                    'tarikh_mesy_ndt',
                    'nama_program_terdahulu',
                    'no_sijil_dahulu',
                    'tarikh_sijil_baru_mula',
                    'jenis_sijil',
                    DB::raw('concat(ifnull(certificates.batch_id, \'\'), "-", ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.kod_pusat,\'\'), "-", ifnull(certificates.date_ppl,\'\'))')
                )
                ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                ->leftJoin('states as states2', 'certificates.negeri_syarikat', '=', 'states2.id')
                ->where('certificates.ic_number', $this->id)->where('certificates.flag_printed', 'N')
                ->where('certificates.source', 'syarikat')->orderBy('certificates.name', 'asc');

        }

        if ($this->type == 'sldn') {
            return Certificate::query()
                ->select(
                    'certificates.Name',
                    'certificates.ic_number',
                    'certificates.programme_name',
                    'certificates.programme_code',
                    DB::raw('ucase(certificates.level)'),
                    'certificates.pb_name',
                    'states.name',
                    'certificates.batch_id',
                    'nama_syarikat',
                    'states2.name as name2',
                    'certificates.qrlink',
                    DB::raw('concat(ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.date_ppl,\'\'), "-", ifnull(certificates.batch_id, \'\'))')
                )
                ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
                ->leftJoin('states as states2', 'certificates.negeri_syarikat', '=', 'states2.id')
                ->where('certificates.ic_number', $this->id)->where('certificates.flag_printed', 'N')
                ->where('certificates.source', 'syarikat')->orderBy('certificates.name', 'asc');
        }

        return Certificate::query()
            ->select('certificates.Name', 'certificates.ic_number', 'certificates.programme_name',
                'certificates.programme_code', DB::raw('ucase(certificates.level)'), 'certificates.pb_name',
                'states.name',
                'certificates.batch_id', 'certificates.address', 'certificates.qrlink',
                DB::raw('concat(ifnull(certificates.programme_code,\'\'), "-", ifnull(certificates.date_ppl,\'\'), "-", ifnull(certificates.batch_id, \'\'))')
                )
            ->leftJoin('states', 'certificates.state_id', '=', 'states.id')
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
        if ($this->type == 'ndt') {
            return [
                'Name', 'NoKP', 'Nama Program',
                'Kod Program', 'Tahap', 'Nama PB',
                'State ID',
                'No Batch', 'Alamat', 'QR Code',
                'Tarikh ppl',
                'Nama Syarikat',
                'Negeri Syarikat',
                'NDT Sah Mula',
                'NDT Sah Tamat',
                'Tarikh NDT Terdahulu',
                'Tarikh Mesyuarat NDT',
                'Nama Program Terdahulu',
                'No Sijil Terdahulu',
                'Tarikh Sijil Baru Mula',
                'Footer',
            ];
        }

        if ($this->type == 'sldn') {
            return [
                'Name', 'NoKP', 'Nama Program',
                'Kod Program', 'Tahap', 'Nama PB',
                'State ID', 'No Batch',
                'Nama Syarikat', 'Negeri Syarikat', 'QR Code', 'Footer',
            ];
        }

        return [
            'Name', 'NoKP', 'Nama Program',
            'Kod Program', 'Tahap', 'Nama PB',
            'State ID','No Batch', 'Alamat', 'QR Code', 'Footer',
        ];
    }

}
