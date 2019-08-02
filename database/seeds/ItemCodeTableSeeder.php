<?php

use Illuminate\Database\Seeder;
use App\Classes\ItemCode;
use App\ItemCodes;

class ItemCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
        ItemCodes::create([
            'itemcode' => ItemCode::itemcodes(26,'abcdefghijklmnopqrstuvwxyz')
        ]);
        */


//        for($i =0; $i<=10000;$i++){
//            DB::table('itemcodes')->insert([
//                'itemcode' => ItemCode::itemcodes(20,'123456789'),//str_random(10)
//                "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
//                "updated_at" => \Carbon\Carbon::now(),
//            ]);
//        }


//
//        for($i =0; $i<=3000000000000000000000000;$i++){
//            ItemCodes::create([
//                  'itemcode' => ItemCode::itemcodes(26,'abcdefghijklmnopqrstuvwxyz'),
//                    "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
//                    "updated_at" => \Carbon\Carbon::now(),
//            ]);
//        }

        $this->command->getOutput()->progressStart(100);
        for($i=20535;$i<=99999999;$i++){
            $num_length = strlen((string)$i);
            $prefix = '';
            if($num_length==1){  $prefix = '000000000';  }

            if($num_length==2){  $prefix = '00000000';  }

            if($num_length==3){  $prefix = '0000000';  }

            if($num_length==4){  $prefix = '000000';  }

            if($num_length==5){  $prefix = '00000';  }

            if($num_length==6){  $prefix = '0000';  }

            if($num_length==7){  $prefix = '000';  }

            if($num_length==8){  $prefix = '00';  }

            if($num_length==9){  $prefix = '0';  }

            if($num_length==10){ $prefix = '';  }

            $itemcode = $prefix.''.$i;

           
            DB::table('itemcodes')->insert([
                'itemcode' => $itemcode,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        }
        $this->command->getOutput()->progressFinish();

    }
}
