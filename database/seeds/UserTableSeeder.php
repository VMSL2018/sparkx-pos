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
        DB::table('users')->insert([
            'name' => 'Shovon Rahman Shuvo',
            'email' => 'akandshuvo@gmail.com',
            'password' => bcrypt('dg344i'),
            'type' => '1',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@sparkx.com',
            'password' => bcrypt('dg344i'),
            'type' => '1',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@sparkx.com',
            'password' => bcrypt('dg344i'),
            'type' => '2',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Store Manager',
            'email' => 'storemanager@sparkx.com',
            'password' => bcrypt('dg344i'),
            'type' => '3',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);
    }
}
