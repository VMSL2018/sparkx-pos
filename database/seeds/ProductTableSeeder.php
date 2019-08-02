<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'product_code'=>'001',
                'product_name' => 'MAN\'S FULL-SLEEVE CASUAL',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'002',
                'product_name' => 'MAN\'S SHORTS',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'003',
                'product_name' => 'MAN\'S KATUA',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'004',
                'product_name' => 'MAN\'S FULL-SLEEVE FORMAL',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'005',
                'product_name' => 'GIRL\'S PALAZZO',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'006',
                'product_name' => 'MAN\'S HALF-SLEEVE',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'007',
                'product_name' => 'MAN\'S POLO',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'008',
                'product_name' => 'MAN\'S T-SHIRT',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'009',
                'product_name' => 'BOY\'S POLO FULL-SLEEVE',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'010',
                'product_name' => 'THREE PIECE: GEORGETTE',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'011',
                'product_name' => 'MAN\'S JEANS PANT',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'012',
                'product_name' => 'THREE PIECE: COTTON',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'013',
                'product_name' => 'BOY\'S FULL SLEEVE',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'014',
                'product_name' => 'THREE PIECE: TOSHOR SILK',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'015',
                'product_name' => 'LADY\'S ONE PIECE',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'016',
                'product_name' => 'BOY\'S PANJABI',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'017',
                'product_name' => 'MAN\'S KOTTER PANT',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'018',
                'product_name' => 'MAN\'S GABADI PANT',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'019',
                'product_name' => 'BOY\'S KOTTER PANT',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'020',
                'product_name' => 'LADY\'S JEANS',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'021',
                'product_name' => 'LADY\'S JEGGINGS',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'022',
                'product_name' => 'LADY\'S SKIRT',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'023',
                'product_name' => 'GIRL\'S GOWN',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'024',
                'product_name' => 'GIRL\'S FROCK',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'025',
                'product_name' => 'GIRL\'S LEGGINGS',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'026',
                'product_name' => 'LADY\'S PALAZZO',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'027',
                'product_name' => 'BOY\'S TROUSER',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'028',
                'product_name' => 'BOY\'S SWEATER',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'029',
                'product_name' => 'GIRL\'S JACKET',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'030',
                'product_name' => 'GIRL\'S TOPS',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'031',
                'product_name' => 'MAN\'S UNDER-WEAR',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'032',
                'product_name' => 'GIRL\'S HOT PANT',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'033',
                'product_name' => 'LADY\'S ORNA',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'034',
                'product_name' => 'BOY\'S JEANS',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'035',
                'product_name' => 'GIRL\'S JEANS',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'036',
                'product_name' => 'MAN\'S PANJABI',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'037',
                'product_name' => 'LADY\'S FLARE PALAZZO',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'038',
                'product_name' => 'LADY\'S T-SHIRT',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'039',
                'product_name' => 'BOY\'S POLO',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'040',
                'product_name' => 'BOY\'S HALF-SLEEVE',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'041',
                'product_name' => 'BOYS THREE-QUARTER',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'042',
                'product_name' => 'GIRL\'S SHORTS',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'043',
                'product_name' => 'GIRL\'S POLO',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'044',
                'product_name' => 'BOY\'S MAGI',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'045',
                'product_name' => 'MAN\'S FORMAL PANT',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'046',
                'product_name' => 'LADY\'S SHIRT',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'047',
                'product_name' => 'GIRL\'S T-SHIRT',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'048',
                'product_name' => 'BOY\'S T-SHIRT',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'049',
                'product_name' => 'MAN\'S THREE-QUARTER',
                'category' => 'MAN'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'050',
                'product_name' => 'BOY\'S GABADIN PANT',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'051',
                'product_name' => 'LADY\'S TOPS',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'052',
                'product_name' => 'LADY\'S LEGGINGS',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'053',
                'product_name' => 'LADY\'S THREE-QUARTER',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'054',
                'product_name' => 'BOY\'S SHORTS',
                'category' => 'BOY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'055',
                'product_name' => 'GIRL\'S MAGI',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'056',
                'product_name' => 'GIRL\'S GABADIN',
                'category' => 'GIRL'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'057',
                'product_name' => 'LADY\'S KURTI',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/
        DB::table('products')->insert(
            [
                'product_code'=>'058',
                'product_name' => 'LADY\'S FORMAL PANT',
                'category' => 'LADY'
            ]
        );
        /*----------------------------------*/


    }
}
