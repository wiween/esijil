<?php

use App\Source;
use Illuminate\Database\Seeder;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sources')->delete();

        Source::create([
            'name' => 'dalaman',
            'status' => 'active'
        ]);

        Source::create([
            'name' => 'syarikat',
            'status' => 'active'
        ]);


    }
}
