<?php

use App\Sysvars;
use App\CertSeq;
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
        $seqs = CertSeq::get();

        Sysvars::create([
            'code' => 'SYARIKAT_NULL',
            'datatype' => 'NULL',
            'value' => ($seqs->where('abjad', 'NULL')->first()) ? $seqs->where('abjad', 'NULL')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_A',
            'datatype' => 'A',
            'value' => ($seqs->where('abjad', 'A')->first()) ? $seqs->where('abjad', 'A')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_B',
            'datatype' => 'B',
            'value' => ($seqs->where('abjad', 'B')->first()) ? $seqs->where('abjad', 'B')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_C',
            'datatype' => 'C',
            'value' => ($seqs->where('abjad', 'C')->first()) ? $seqs->where('abjad', 'C')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_D',
            'datatype' => 'D',
            'value' => ($seqs->where('abjad', 'D')->first()) ? $seqs->where('abjad', 'D')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_E',
            'datatype' => 'E',
            'value' => ($seqs->where('abjad', 'E')->first()) ? $seqs->where('abjad', 'E')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'SYARIKAT_N',
            'datatype' => 'N',
            'value' => ($seqs->where('abjad', 'N')->first()) ? $seqs->where('abjad', 'N')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_NULL',
            'datatype' => 'NULL',
            'value' => ($seqs->where('abjad', 'NULL')->first()) ? $seqs->where('abjad', 'NULL')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_A',
            'datatype' => 'A',
            'value' => ($seqs->where('abjad', 'A')->first()) ? $seqs->where('abjad', 'A')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_B',
            'datatype' => 'B',
            'value' => ($seqs->where('abjad', 'B')->first()) ? $seqs->where('abjad', 'B')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_C',
            'datatype' => 'C',
            'value' => ($seqs->where('abjad', 'C')->first()) ? $seqs->where('abjad', 'C')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_D',
            'datatype' => 'D',
            'value' => ($seqs->where('abjad', 'D')->first()) ? $seqs->where('abjad', 'D')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_E',
            'datatype' => 'E',
            'value' => ($seqs->where('abjad', 'E')->first()) ? $seqs->where('abjad', 'E')->first()->run_num : 0,
        ]);

        Sysvars::create([
            'code' => 'DALAMAN_N',
            'datatype' => 'N',
            'value' => ($seqs->where('abjad', 'N')->first()) ? $seqs->where('abjad', 'N')->first()->run_num : 0,
        ]);
    }
}
