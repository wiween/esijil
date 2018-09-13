<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();

        Role::create([
            'name'      => 'pusat_bertauliah',
            'nick'      => 'Standard User',
            'access_power' => 100,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pegawai_penilai',
            'nick'      => 'pegawai_penilai',
            'access_power' => 1000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pegawai_peperiksaan',
            'nick'      => 'pegawai_peperiksaan',
            'access_power' => 2000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pegawai_bayaran',
            'nick'      => 'pegawai_bayaran',
            'access_power' => 3000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pegawai_sijil',
            'nick'      => 'pegawai_sijil',
            'access_power' => 4000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'super_admin',
            'nick'      => 'Super Admin (BTM)',
            'access_power' => 10000,
            'status'    => 'active',
            'description' => ''
        ]);
    }
}
