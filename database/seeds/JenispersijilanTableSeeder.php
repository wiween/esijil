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
            'name'      => 'ndt',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'sldn',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'pb',
            'status'    => 'active'
        ]);

        Jenispersijilan::create([
            'name'      => 'ppt',
            'status'    => 'active'
        ]);
    }
}
