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
            'name'      => 'company',
            'nick'      => 'Syarikat Pencetak',
            'access_power' => 500,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pencetak',
            'nick'      => 'Pegawai Pencetak',
            'access_power' => 1000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'akauntan',
            'nick'      => 'Pegawai Pembayar',
            'access_power' => 2000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'pegawai_admin',
            'nick'      => 'Officer Admin',
            'access_power' => 5000,
            'status'    => 'active',
            'description' => ''
        ]);

        Role::create([
            'name'      => 'admin',
            'nick'      => 'Admin JPK',
            'access_power' => 8000,
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
