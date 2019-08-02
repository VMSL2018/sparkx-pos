<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(
            [
                'name' => 'AAPSS Web Studio',
                'contact_person' => 'Shovon Rahman Shuvo',
                'contact_number' => '01534653592',
                'alt_contact_number' => '01747423813',
                'supplier_email' => 'akandshuvo@gmail.com',
                'supplier_address' => 'Mirpur 3',
                'extra_info' => 'Hello from the other side',
            ]
        );

        DB::table('suppliers')->insert(

            [
                'name' => 'Virtual Market Solution Ltd',
                'contact_person' => 'Toha Hossain Uthso',
                'contact_number' => '01534653591',
                'alt_contact_number' => '01747423812',
                'supplier_email' => 'vmsl@gmail.com',
                'supplier_address' => 'Banasri',
                'extra_info' => 'Hello from the other side',
            ]
        );
    }
}
