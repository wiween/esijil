<?php

use App\Jenispersijilan;
use Illuminate\Database\Seeder;

class JenispersijilanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenispersijilans')->delete();

        Jenispersijilan::create([
            'name'      => 'Tiada',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'NDT',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'SLDN',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'PB',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'PPT',
            'status'    => 'active'
        ]);
    }
}
