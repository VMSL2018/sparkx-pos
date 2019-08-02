<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inventory;
use App\Pos;
use App\PosPrimary;
use App\Supplier;
use App\Products;
use App\Showroom;
use App\Warehouse;
use App\ItemCodes;
use App\ReturnItem;
use App\Classes\ItemCode;
use Carbon\Carbon;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_item_inventory = Inventory::count();
        $total_supplier = Supplier::count();

        $from = date('Y-m-d 23:59:59');
        
        $to = date('Y-m-d 00:00:00', mktime(0,0,0,date("m"),(date("d")-7),date("Y")));

        $weekly_sales = Pos::whereBetween('created_at', array($to,$from ))->sum('total_price');

        $from = date('Y-m-d 23:59:59');
        
        $to = date('Y-m-d 00:00:00', mktime(0,0,0,date("m"),(date("d")-30),date("Y")));

        $monthly_sales = Pos::whereBetween('created_at', array($to,$from ))->sum('total_price');

        $showroom = Showroom::count();

        $days =['Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday'];

        $dodsales = [];
       
        for($i=0;$i<count($days);$i++){
        	
            $weekday =$days[$i];
            $quantity = PosPrimary::where('weekday',$weekday)->count('id');
            $taka = PosPrimary::where('weekday',$weekday)->sum('total_price');
            
            $total = PosPrimary::sum('total_price');
            if($total != null){
            	 $percentage=ceil((PosPrimary::where('weekday',$weekday)->sum('total_price')*100)/PosPrimary::sum('total_price'));
            }else{
            	 $percentage=ceil((PosPrimary::where('weekday',$weekday)->sum('total_price')*100)/1);
            }
           

            $dailysales = ['weekday'=>$weekday,'quantity'=>$quantity,'taka'=>$taka,'percentage'=>$percentage]; 
            $dodsales [] = $dailysales; 

       
        }

        
        

       

        return view('dashboard',compact('total_supplier','weekly_sales','monthly_sales','showroom','dodsales','total_item_inventory'));
    }


}
