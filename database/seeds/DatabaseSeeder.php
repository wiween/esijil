<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(LookupTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TypeReplacementTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(SourceTableSeeder::class);
        //$this->call(EspkmTableSeeder::class);
        $this->call(CertificateTableSeeder::class);
        $this->call(JenispersijilanTableSeeder::class);
        $this->call(DiplomaTableSeeder::class);
        $this->call(SysvarsSeeder::class);
    }
}
