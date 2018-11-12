<?php

use App\Sysvars;
use Illuminate\Database\Seeder;

class SysVarsSeqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sysvars::create([
            'code' => 'SYARIKAT_NULL',
            'datatype' => 'NULL',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_A',
            'datatype' => 'A',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_B',
            'datatype' => 'B',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_C',
            'datatype' => 'C',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_D',
            'datatype' => 'D',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_E',
            'datatype' => 'E',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_N',
            'datatype' => 'N',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_NULL',
            'datatype' => 'NULL',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_A',
            'datatype' => 'A',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_B',
            'datatype' => 'B',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_C',
            'datatype' => 'C',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_D',
            'datatype' => 'D',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_E',
            'datatype' => 'E',
            'value' => 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_N',
            'datatype' => 'N',
            'value' => 0,
        ]);
    }
}
