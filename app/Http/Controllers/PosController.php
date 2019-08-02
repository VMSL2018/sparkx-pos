<?php

namespace App\Http\Controllers;

use Auth;
use App\Pos;
use App\PosPrimary;
use App\Inventory;
use App\Supplier;
use App\Products;
use App\Showroom;
use App\Warehouse;
use App\ItemCodes;
use App\Customer;
use App\Employee;
use App\Settings;
use App\Classes\ItemCode;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {

        $showroom = Auth::user()->showroom;
        $from = date("Y-m-d 00:00:00");
        $to = date("Y-m-d 23:59:59");

        //$dailysales = Pos::join('pos_primaries', 'pos.pos_session_code', '=', 'pos_primaries.pos_session_code')->whereBetween('pos.created_at', array($from,$to ))->get(['pos.*','pos_primaries.customer_type']);
        if( Auth::user()->type != 1){
            $dailysales = PosPrimary::where('pos_primaries.showroom',$showroom)->whereBetween('pos_primaries.created_at', array($from,$to ))->get();
        }else{
            $dailysales = PosPrimary::whereBetween('pos_primaries.created_at', array($from,$to ))->get();
        }
        
        //dd($dailysales);

        return view('pos.index',compact('dailysales'));
    }

    public function newentry()
    {

        return view('pos.newentry');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // GETTING THE WEEKDAY NAME
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];




        $itemcode = $request->itemcode;

        $checkItemCode = Inventory::where('item_code',$itemcode)->count();

        $false =0;

        $true = 1;
        
        $message = "";


        if($checkItemCode >= 1){

            $items = Pos::where('itemcode', $request->itemcode)->count();

            if($items >=1){
                $array = ['message'=>"Duplicate Item"];
                return $array;
            
            }else{

                $itemData = Inventory::where('item_code',$itemcode)->first();

                //BONUS
                //$bonuses = Settings::get();
                
                $total_price = $itemData->selling_price;
                
                if($total_price <= 500){
                
                    $bonus = Settings::where('id',1)->value('value');
                
                }
                
                if($total_price <= 1000 && $total_price > 500){
                
                    $bonus = Settings::where('id',2)->value('value');
                
                }
                
                if($total_price < 2000 && $total_price > 1000){
                
                    $bonus = Settings::where('id',3)->value('value');
                
                }

                if($total_price >= 2000){
                
                    $bonus = Settings::where('id',4)->value('value');
                }
                //dd($bonus);

                Pos::create([
                    "pos_session_code"          =>  $request->pos_session_code,

                    "product_code"              =>  $itemData->products_id,
                    
                    "product_name"              =>  $itemData->product_name,
                    
                    "itemcode"                  =>  $request->itemcode,
                    
                    "tag_price"                 =>  $itemData->selling_price,

                    "total_price"               =>  $itemData->selling_price,

                    "supplier_id"               =>  $itemData->supplier_id,
                    
                    "supplier_name"             =>  $itemData->supplier_name,

                    "weekday"                   =>  $weekday,

                    "bonus"                     =>  $bonus,

                    "created_at"                =>  Carbon::now(),
                    
                    "updated_at"                =>  Carbon::now(),
                ]);


                // GET SUB TOTAL PRICE
                $sub_total_price=Pos::where('pos_session_code',$request->pos_session_code)->sum('total_price');
                
                $array = ['message'=>1,'sub_total_price'=>$sub_total_price];

                return $array;
            }


        }else{
            $array = ['message'=>0];
            return $array;
        }





    }


    public function itemlist(Request $request)
    {
        $items = Pos::where('pos_session_code', $request->pos_session_code)->get();
        return $items;
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Pos $po)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pos $po)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pos $po)
    {
        $pay = $request->pay; // status =1
        $hold = $request->hold; // status =2
        $cancel = $request->cancel; //status =3

        $pos_session_code = $po->pos_session_code;
        $invoice = $po->pos_session_code;
        $employee_id = $request->employee_id;
        $customer_type = $request->customer_type;
        $customer_number = $request->customer_number;
        $payment_method = $request->payment_method;
        $transaction_id = $request->transaction_id; 
        $showroom = $request->showroom;
        $weekday = $request->weekday;

        // GET SUB TOTAL PRICE
        $sub_total_price=Pos::where('pos_session_code',$pos_session_code)->sum('total_price');

        



        if($pay!=null){
            

            $ids = Pos::where('pos_session_code',$pos_session_code)->get(['id']);
            $itemcodes = Pos::where('pos_session_code',$pos_session_code)->get(['itemcode']);



            foreach ($ids as $id){
                Pos::where('id',$id->id)
                    ->update(['status' => 1,'employee_id'=>$employee_id,'customer_type'=>$customer_type,'payment_method'=>$payment_method,'weekday'=>$weekday]);

            }

            foreach($itemcodes as $itemcode){
                Inventory::where('item_code',$itemcode->itemcode)
                    ->update(['selling_status' => 1]);
            }


            return "success";


        }

        if($hold!=null){
            $pos_session_code = $po->pos_session_code;

            $ids = Pos::where('pos_session_code',$pos_session_code)->get(['id']);

            foreach ($ids as $id){
                Pos::where('id',$id->id)
                    ->update(['status' => 2]);


            }
            return "success";
        }

        if($cancel!=null){
            $pos_session_code = $po->pos_session_code;

            $ids = Pos::where('pos_session_code',$pos_session_code)->get(['id']);

            foreach ($ids as $id){
                Pos::where('id',$id->id)
                    ->update(['status' => 3]);


            }
            return "success";
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pos $po)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pos
     * @return \Illuminate\Http\Response
     */
    public function customDelete(Request $request){

        $id = $request->id;
        
        // GET POS SESSION CODE
        $pos_session_code=Pos::where('id',$id)->pluck('pos_session_code');

        $item = Pos::where('id',$id)->delete();



        // GET SUB TOTAL PRICE
        $sub_total_price=Pos::where('pos_session_code',$pos_session_code)->sum('total_price');

        $array = ['message'=>"success",'sub_total_price'=>$sub_total_price];

        if($item == TRUE){
            return $array;
        }else{
            return "failed";
        }


    }


    public function individual_discount(Request $request){

        $id = $request->id;
        $tag_price = $request->tag_price;
        $individual_discount = $request->individual_discount;
        $individual_discount_type = $request->individual_discount_type;
        $total_price ='';
        
        //Discount in Percent
        if($individual_discount_type == 1){
            (int)$total_price = ceil(floatval($tag_price) - round((floatval($tag_price)*floatval($individual_discount))/100,2));
        }
        //Discount in Taka
        if($individual_discount_type == 2){
            (int)$total_price = ceil(floatval($tag_price) - floatval($individual_discount));
        }

        //bonus
        $bonus = '';
        if($total_price < 500){
            $bonus = 5;
        }
        if($total_price <= 1000 && $total_price > 500){
            $bonus = 10;
        }
        if($total_price < 2000 && $total_price > 1000){
            $bonus = 15;
        }
        if($total_price > 2000){
            $bonus = 20;
        }

        // Updating some data
        Pos::where('id',$id)
            ->update(['discount_price' => $individual_discount,'total_price'=>$total_price,'bonus'=>$bonus]);

        // GET POS SESSION CODE
        $pos_session_code=Pos::where('id',$id)->pluck('pos_session_code');
      
        // GET SUB TOTAL PRICE
        $sub_total_price=Pos::where('pos_session_code',$pos_session_code)->sum('total_price');


            
        $array = ['total_price'=>$total_price,'sub_total_price'=>$sub_total_price];    

        return $array;    

    }

    public function StorePosPrimary(Request $request){
        
        $pos_session_code= $request->pos_session_code;
        $invoice= $request->pos_session_code;
        $employee_id = $request->employee_id;
        $employee_name = Employee::where('employee_id',$employee_id)->value('employee_name');
        $customer_type = $request->customer_type;
        $customer_number= $request->customer_number;
        $payment_method = $request->payment_method;
        $transaction_id = $request->transaction_id;
        
        $showroom = $request->showroom;
        $weekday = $request->weekday;

        //TOTAL PRICE
        $subtotal_price = Pos::where('pos_session_code',$pos_session_code)->sum('tag_price');
        
        $total_price=Pos::where('pos_session_code',$pos_session_code)->sum('total_price');

        $discount_price = $subtotal_price - $total_price;

        PosPrimary::create([
           'pos_session_code' => $pos_session_code,
           'invoice' => $invoice,
           'employee_id' => $employee_id,
           
           'customer_type' => 	$customer_type,
           'customer_number' => $customer_number,
           'subtotal_price' =>$subtotal_price,
           'discount_price'=> $discount_price,
           'total_price' => $total_price,
           'payment_method' => $payment_method,
           'transaction_id' => $transaction_id,
           'showroom' => $showroom,
           'weekday' => $weekday, 
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        if($customer_number !=null){
            $count = Customer::where('customer_number',$customer_number)->count();
            if($count == 0){
                Customer::create([
                    'customer_number' => $customer_number,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                 ]);
            }
        }


        $ids = Pos::where('pos_session_code',$pos_session_code)->get(['id']);
        $itemcodes = Pos::where('pos_session_code',$pos_session_code)->get(['itemcode']);


        
        foreach ($ids as $id){
            Pos::where('id',$id->id)
                ->update(['status' => 1,'employee_id'=>$employee_id,'employee_name' => $employee_name,]);
        }

        foreach ($itemcodes as $itemcode){
            $codes[] = $itemcode->itemcode;
        }
        foreach($codes as $code){
            $itemcode_ids[] = Inventory::where('item_code',$code)->value('id');
        }

        foreach ($itemcode_ids as $id){
            Inventory::where('id',$id)
               ->update(['selling_status' => 1,'return_status'=>1]);
        }
        

        //$from_pos_primary=PosPrimary::where('pos_session_code',$pos_session_code)->get();

        //$from_pos=Pos::where('pos_session_code',$pos_session_code)->get(['product_name','itemcode','total_price','tag_price']);

        //$array = ['from_pos_primary'=>$from_pos_primary,'from_pos'=>$from_pos];

        //return  $array;
        return  $pos_session_code;
    }

    public function print(Request $request){
        $pos_session_code = $request->pos_session_code;

        $from_pos_primary=PosPrimary::where('pos_session_code',$pos_session_code)->get();

        $from_pos=Pos::where('pos_session_code',$pos_session_code)->get(['product_name','itemcode','total_price','tag_price','discount_price']);

        $data = ['from_pos_primary'=>$from_pos_primary,'from_pos'=>$from_pos];

        //dd($data);

        return view('pos.print',compact('data'));
    }
}
