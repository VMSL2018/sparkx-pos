<?php

use Illuminate\Database\Seeder;

class ShowroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showrooms')->insert(
            [
                'showroom_code'=>'0001',
                'showroom_name' => 'Chuadanga',
                'showroom_address' => 'Chuadanga',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );

        DB::table('showrooms')->insert(
            [
                'showroom_code'=>'0002',
                'showroom_name' => 'Navaron',
                'showroom_address' => 'Navaron',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );
    }
}
