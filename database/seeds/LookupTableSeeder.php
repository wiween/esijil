<?php

use Illuminate\Database\Seeder;
use App\Lookup;

class LookupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lookups')->delete();

        Lookup::create([
            'name'      => 'user_status',
            'key'       => 'active',
            'value'     => 'Active'
        ]);

        Lookup::create([
            'name'      => 'user_status',
            'key'       => 'inactive',
            'value'     => 'Inactive'
        ]);

        Lookup::create([
            'name'      => 'user_status',
            'key'       => 'banned',
            'value'     => 'Banned'
        ]);

        //course, gallery, activity
        Lookup::create([
            'name'      => 'publish_status',
            'key'       => 'published',
            'value'     => 'Published'
        ]);

        Lookup::create([
            'name'      => 'publish_status',
            'key'       => 'unpublished',
            'value'     => 'Unpublished'
        ]);

        Lookup::create([
            'name'      => 'publish_status',
            'key'       => 'inactive',
            'value'     => 'inactive'
        ]);
    }
}
