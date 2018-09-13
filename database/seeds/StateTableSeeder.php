<?php

use Illuminate\Database\Seeder;
use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        State::create([
            'state_code' => '01',
            'name' => 'Johor',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '02',
            'name' => 'Kedah',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '03',
            'name' => 'Kelantan',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '04',
            'name' => 'Melaka',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '05',
            'name' => 'Negeri Sembilan',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '06',
            'name' => 'Pahang',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '07',
            'name' => 'Pulau Pinang',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '08',
            'name' => 'Perak',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '09',
            'name' => 'Perlis',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '10',
            'name' => 'Selangor',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '11',
            'name' => 'Terengganu',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '12',
            'name' => 'Sabah',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '13',
            'name' => 'Sarawak',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '14',
            'name' => 'WP Kuala Lumpur',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '15',
            'name' => 'WP Labuan',
            'status' => 'active'
        ]);

        State::create([
            'state_code' => '16',
            'name' => 'WP Putrajaya',
            'status' => 'active'
        ]);
    }
}
