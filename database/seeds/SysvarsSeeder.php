<?php

use App\Sysvars;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SysvarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sysvars')->delete();

        Sysvars::create([
            'code' => 'TUNTUT_G',
            'datatype' => 'decimal',
            'value' => '2.80'
        ]);
    }
}
