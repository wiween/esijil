<?php

namespace App\Repositories;

use App\Sysvars;
use App\Certificate;
use Illuminate\Http\Request;

class LaporanRepository
{
    const F1 = 'ppt';
    const F2 = 'ndt';
    const F3 = 'pb';
    const F4 = 'sldn';

    const G1 = 'ppt';
    const G2 = 'ndt';
    const G3 = 'pb';
    const G4 = 'sldn';

    public function siriesNumber($batch, $type)
    {
        return Certificate::distinct('session')->where('batch_id', $batch)->where('type', $type)->groupBy('session')->first();
    }

    public function laporanFData($batch, $type)
    {
        return Certificate::join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->select('certificates.name', 'certificates.ic_number', 'certificates.batch_id', 'certificates.programme_name', 'certificates.programme_code', 'certificates.date_print', 'certificates.type', 'certificates.certificate_number', 'certificates.pb_name', 'certificates.level', 'posts.tracking_number as tracking_number', 'posts.date_post as date_post', 'posts.receiver as receiver')
            ->where('certificates.batch_id', $batch)
            ->where('certificates.flag_printed', 'Y')
            ->where('certificates.source', 'syarikat')
            ->where('certificates.type', $type)
            ->get();

    }

    public function laporanGData($batch, $type)
    {
        return Certificate::join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->where('certificates.batch_id', $batch)
            ->where('certificates.flag_printed', 'Y')
            ->where('certificates.source', 'syarikat')
            ->where('certificates.type', $type)
            ->first();
    }

    public function laporanMultiFData(Request $request)
    {
        $batchs = [];
        $types = [];
        $col = collect($request->batch_id);
        $col->map(function ($item, $key) use (&$batchs, &$types) {
            $row = explode('|', $item);
            array_push($batchs, $row[0]);
            array_push($types, $row[1]);
            return;
        });

        $sql = Certificate::select('certificates.name', 'certificates.ic_number', 'certificates.batch_id', 'certificates.session', 'certificates.programme_name', 'certificates.programme_code', 'certificates.date_print', 'certificates.type', 'certificates.certificate_number', 'certificates.pb_name', 'certificates.level', 'posts.tracking_number as tracking_number', 'posts.date_post as date_post', 'posts.receiver as receiver')
            ->join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->whereIn('certificates.batch_id', $batchs)
            ->whereIn('certificates.type', $types)
            ->where('certificates.flag_printed', 'Y')
            ->where('certificates.source', 'syarikat')
            ->orderBy('certificates.batch_id', 'asc')
            ->orderBy('certificates.pb_name', 'asc')
            ->get();

        return $sql;
    }

    public function laporanMultiGData(Request $request)
    {
        $batchs = [];
        $types = [];
        $col = collect($request->batch_id);
        $col->map(function ($item, $key) use (&$batchs, &$types) {
            $row = explode('|', $item);
            array_push($batchs, $row[0]);
            array_push($types, $row[1]);
            return;
        });

        $sql = Certificate::select('certificates.type', 'certificates.pb_name', 'certificates.batch_id', 'certificates.session')
            ->join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->whereIn('certificates.batch_id', $batchs)
            ->whereIn('certificates.type', $types)
            ->where('certificates.flag_printed', 'Y')
            ->where('certificates.source', 'syarikat')
            ->groupBy('certificates.type', 'certificates.pb_name', 'certificates.batch_id', 'certificates.session')
            ->orderBy('certificates.pb_name', 'asc')
            ->get();

        return $sql;
    }

    public function rateTuntut()
    {
        return Sysvars::where('code', 'TUNTUT_G')->first()->value * 1.0;
    }

    public function getCons($type)
    {
        switch ($type) {
            case 'F1':
                return SELF::F1;
                break;
            case 'F2':
                return SELF::F2;
                break;
            case 'F3':
                return SELF::F3;
                break;
            case 'F4':
                return SELF::F4;
                break;
            case 'G1':
                return SELF::G1;
                break;
            case 'G2':
                return SELF::G2;
                break;
            case 'G3':
                return SELF::G3;
                break;
            case 'G4':
                return SELF::G4;
                break;
        }
    }
}