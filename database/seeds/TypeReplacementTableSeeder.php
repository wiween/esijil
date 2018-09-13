<?php

use App\TypeReplacement;
use Illuminate\Database\Seeder;

class TypeReplacementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_replacements')->delete();

       TypeReplacement::create([
            'name' => 'rosak',
            'status' => 'active'
        ]);

        TypeReplacement::create([
            'name' => 'hilang',
            'status' => 'active'
        ]);


    }
}
