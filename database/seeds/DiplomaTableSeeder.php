<?php

use Illuminate\Database\Seeder;
use App\Diploma;

class DiplomaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('diplomas')->delete();

        Diploma::create([
            'code_programmed' => 'C-051-4',
            'old_name' => 'PEMBANTU JURUTERA ELEKTRIK',
            'new_name' => 'TEKNOLOGI ELEKTRIK',
            'status' => 'active'

        ]);

        Diploma::create([
            'code_programmed' => 'C-051-5',
            'old_name' => 'JURUTERA ELEKTRIK',
            'new_name' => 'TEKNOLOGI ELEKTRIK',
            'status' => 'active'

        ]);

        Diploma::create([
            'code_programmed' => 'E-030-4',
            'old_name' => 'PEMBANTU JURUTERA ELEKTRONIK INDUSTRI',
            'new_name' => 'TEKNOLOGI ELEKTRONIK INDUSTRI',
            'status' => 'active'

        ]);

        Diploma::create([
            'code_programmed' => 'E-030-5',
            'old_name' => 'JURUTERA ELEKTRONIK INDUSTRI',
            'new_name' => 'TEKNOLOGI ELEKTRONIK INDUSTRI',
            'status' => 'active'

        ]);
    }
}
