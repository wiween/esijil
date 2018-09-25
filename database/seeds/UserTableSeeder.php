<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        // Super Admin
        $superAdmin = new \App\User();
        $superAdmin->name = 'Mr. Super Admin';
        $superAdmin->email = 'super.admin@gmail.com';
        $superAdmin->password = bcrypt('haha1234');
        $superAdmin->ic_number = '80080808888';
        $superAdmin->phone_number = '0198899776';
        $superAdmin->role = 'super_admin';
        $superAdmin->access_power = 10000;
        $superAdmin->avatar = '/images/user/super_admin.png';
        $superAdmin->status = 'active';
        $superAdmin->save();

        //admin
        $admin = new \App\User();
        $admin->name = 'Mr. Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin1234');
        $admin->ic_number = '800707077777';
        $admin->phone_number = '0198899777';
        $admin->role = 'pegawai';
        $admin->access_power =8000;
        $admin->status = 'active';
        $admin->save();

        //Ketua Officer
        $admin = new \App\User();
        $admin->name = 'Mr.Head of Officer';
        $admin->email = 'officer@gmail.com';
        $admin->password = bcrypt('officer1234');
        $admin->ic_number = '800707076666';
        $admin->phone_number = '0198899666';
        $admin->role = 'pegawai_admin';
        $admin->access_power = 5000;
        $admin->status = 'active';
        $admin->save();

        //cetak - dalaman
        $admin = new \App\User();
        $admin->name = 'Mr. Pencetak';
        $admin->email = 'pencetak@gmail.com';
        $admin->password = bcrypt('pencetak1234');
        $admin->ic_number = '800707074445';
        $admin->phone_number = '0198899555';
        $admin->role = 'pencetak';
        $admin->access_power = 1000;
        $admin->status = 'active';
        $admin->save();

        //akaun
        $admin = new \App\User();
        $admin->name = 'Mr. Akauntan';
        $admin->email = 'akaun@gmail.com';
        $admin->password = bcrypt('akaun1234');
        $admin->ic_number = '800707074499';
        $admin->phone_number = '0198899555';
        $admin->role = 'akauntan';
        $admin->access_power = 2000;
        $admin->status = 'active';
        $admin->save();


        //Pencetak luar
        $admin = new \App\User();
        $admin->name = 'Mr. Company';
        $admin->email = 'company@gmail.com';
        $admin->password = bcrypt('company1234');
        $admin->ic_number = '800707074444';
        $admin->phone_number = '0198899444';
        $admin->role = 'company';
        $admin->access_power = 500;
        $admin->status = 'active';
        $admin->save();

        // user
        $user = new \App\User();
        $user->name = 'Mr. User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('abcd1234');
        $user->ic_number = '800707071111';
        $user->phone_number = '0198899111';
        $user->role = 'user';
        $user->access_power = 100;
        $user->status = 'active';
        $user->save();


    }
}
