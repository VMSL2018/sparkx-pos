<?php

use Illuminate\Database\Seeder;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert(
            [
                'warehouse_code'=>'0001',
                'warehouse_name' => 'Dhaka warehouse',
                'warehouse_address' => 'Dhaka warehouse',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );

        DB::table('warehouses')->insert(
            [
                'warehouse_code'=>'0002',
                'warehouse_name' => 'Chuadanga warehouse',
                'warehouse_address' => 'Chuadanga warehouse',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );

        DB::table('warehouses')->insert(
            [
                'warehouse_code'=>'0003',
                'warehouse_name' => 'Chuadanga showroom',
                'warehouse_address' => 'Chuadanga showroom',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );
/*
        DB::table('showrooms')->insert(
            [
                'warehouse_code'=>'0004',
                'warehouse_name' => 'Sold',
                'warehouse_address' => 'Sold',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );
*/
        DB::table('warehouses')->insert(
            [
                'warehouse_code'=>'0005',
                'warehouse_name' => 'Returned to supplier',
                'warehouse_address' => 'Returned to supplier',
                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),
            ]
        );




    }
}
