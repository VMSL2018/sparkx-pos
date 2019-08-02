<?php

namespace App\Http\Controllers;

use App\Report;
use App\Pos;
use App\PosPrimary;
use App\Inventory;
use App\Employee;
use App\Products;
use App\Supplier;
use App\Showroom;
use Illuminate\Http\Request;
use DateTime;
use Carbon\CarbonPeriod;

class ReportController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
    /*------------------------------------*/

// Sales Report
    public function salesreport( Request $request){

        $from = $request->from;

        $to = $request->to;


        if($from ==null  && $to == null){
            $sales = '';
            return view('report.sale',compact('sales'));
        }

        if($from !=null  && $to != null){
            $from = $from.' '.'00:00:00';
            $to = $to.' '.'23:59:59';

            //$sales = Pos::join('pos_primaries', 'pos.pos_session_code', '=', 'pos_primaries.pos_session_code')->whereBetween('pos.created_at', array($from,$to ))->get();
            $sales = Pos::join('pos_primaries', 'pos.pos_session_code', '=', 'pos_primaries.pos_session_code')
                            ->whereBetween('pos.created_at', array($from,$to ))->get(['pos.*','pos_primaries.customer_type','pos_primaries.showroom']);
            return view('report.sale',compact('sales'));
        }


    }

// Return Report
    public function returnreport(Request $request){

        $from = $request->from;

        $to = $request->to;


        if($from ==null  && $to == null){

        }

        if($from !=null  && $to != null){
            $from = $from.' '.'00:00:00';
            $to = $to.' '.'23:59:59';

        }

        $dailysales = Pos::where('return_reason','!=',null)->get();

        foreach($dailysales as $row){
            $pos_session_code[] = $row['pos_session_code'];
        }

        $pos_session_code = $pos_session_code;
        //dd($pos_session_code);

        foreach($pos_session_code as $row){
            $employees[] = PosPrimary :: where('pos_session_code',$row)->get(['employee_id','customer_type']);
        }





        return view('report.return',compact('dailysales','employees'));
    }


    public function productgroupreport(){
        /*-----------PRODUCT GROUP REPORTS------------------*/

                $ProductsArray = array(
                    "product_code" => "-",
                    "product_name" => "-",
                    "category" => "-",
                    "purchased_quantity" => "-",
                    "unit_cost" =>"-",
                    "transport_cost" => "-",
                    "total_cost" => "-",
                    "gp_taka" => "-",
                    "product_mix" => "-",
                    "rating" => "-",
                    "sold_quantity" => "-",
                    "unsold_quantity" => "-",
                    "total_quantity" => "-",
                    "required_quantity" => "-",
                    "reorder_level" => "-",
                    "reorder_status" => "-"
                );


                $products = Products::all();

                foreach($products as $row){

                        $product_code = $row->product_code;

                        $ProductsArray['product_code'] = $row['product_code'];
                        $ProductsArray['product_name'] = $row['product_name'];
                        $ProductsArray['category'] = $row['category'];


                        $purchased_quantity = Inventory::where('products_id',$row->product_code)->count();
                        $ProductsArray['purchased_quantity'] = $purchased_quantity;


                        $transportation_cost = Inventory::where('products_id',$product_code)->get(['transportation_cost']);
                        $TotalTransportationAmount =0;
                        foreach($transportation_cost as $row){
                            $TotalTransportationAmount  +=  $row['transportation_cost'];

                        }
                        $ProductsArray['transport_cost'] = $TotalTransportationAmount;


                        $unit_cost = Inventory::where('products_id',$product_code)->get(['unit_cost']);
                        //dd($unit_cost);
                        $TotalUnitAmount =0;
                        foreach($unit_cost as $row){
                            $TotalUnitAmount  +=  $row['unit_cost'];

                        }
                        $ProductsArray['unit_cost'] = $TotalUnitAmount;


                        $gp_takas = Inventory::where('products_id', $product_code)->get(['gp_taka']);
                        $TotalGpAmount =0;
                        foreach($gp_takas  as $gp_taka){
                            $TotalGpAmount  +=  $gp_taka['gp_taka'];

                        }
                        $ProductsArray['gp_taka'] = $TotalGpAmount;



                        $total_cost = $TotalUnitAmount+$TotalTransportationAmount;
                        $ProductsArray['total_cost'] = $total_cost;



                        $sold_quantity = Inventory::where('products_id', $product_code)
                                                    ->where('selling_status',1)
                                                    ->count();
                        $ProductsArray['sold_quantity'] = $sold_quantity;



                        $unsold_quantity = Inventory::where('products_id', $product_code)
                        ->where('selling_status',0)
                        ->count();

                        $ProductsArray['unsold_quantity'] = $unsold_quantity;






                        $total_quantity = Inventory::where('products_id', $product_code)
                                            ->count();

                        $ProductsArray['total_quantity'] = $total_quantity;


                        /*------------*/
                        $total_product_quantity = Inventory::count();
                        $ProductsArray['product_mix'] =round(($total_quantity*100)/$total_product_quantity,3);

                        $ratings[] =$purchased_quantity;


                        /*-----------*/


                        $required_quantity = Products::where('product_code', $product_code)
                                                ->value('required_quantity');
                        $ProductsArray['required_quantity'] = $required_quantity;




                        $reorder_level = Products::where('product_code', $product_code)
                                            ->value('reorder_level');
                        $ProductsArray['reorder_level'] = $reorder_level;





                        $reorder_status = Products::where('product_code', $product_code)
                            ->value('reorder_status');
                        $ProductsArray['reorder_status'] = $reorder_status;

                        if($ProductsArray['unsold_quantity']< $reorder_level){
                            $ProductsArray['reorder_status'] = 1;
                        }else{
                            $ProductsArray['reorder_status'] = 0;
                        }


                    $reports[] = $ProductsArray;
                }


        return view('report.product',compact('reports'));

        /*---------------------------------------PRODUCT GROUP REPORTS ENDS HERE----------------------------------------------------------*/

    }


    public function mompurchasereport(Request $request){

        if($request->year !=null){
            $Y = $request->year;
        }else{
            $Y =date("Y");
        }
        /*---------------------------------------MOM PURCHASE REPORT STARTS HERE----------------------------------------------------------*/

        $MomPurchaseArray = array(
            "product_code" => "",
            "product_name" => "",
            "category"=>"",
            "january" => "",
            "february" => "",
            "march" =>"",
            "april" => "",
            "may" => "",
            "june" => "",
            "july" => "",
            "august" => "",
            "september" => "",
            "october" => "",
            "november" => "",
            "december" => "",
        );

        $reports  = array();

        $products = Products::all();

        foreach($products as $row){

            $product_code = $row['product_code'];

            $MomPurchaseArray ['product_code'] = $row['product_code'];
            $MomPurchaseArray ['product_name'] = $row['product_name'];
            $MomPurchaseArray ['category'] = $row['category'];

            /*----------JANUARY----------*/

            $january_start  = $Y.'-'.date('01-01 00:00:00');
            $january_end    = $Y.'-'.date('01-31 23:59:59');

            $january = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($january_start,$january_end))
                ->get(['unit_cost','transportation_cost']);

            $january_unit_cost = 0;
            $january_transportation_cost = 0;

            foreach($january as $row){

                    $january_unit_cost += $row['unit_cost'];
                    $january_transportation_cost += $row['transportation_cost'];


            }

            $january_purchase  = $january_unit_cost+$january_transportation_cost;

            $MomPurchaseArray ['january'] = $january_purchase;

            /*--------------------------*/

            /*----------FEBRUARY----------*/

            $february_start  = $Y.'-'.date('02-01 00:00:00');
            $february_end    = $Y.'-'.date('03-31 23:59:59');

            $february = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($february_start,$february_end))
                ->get(['unit_cost','transportation_cost']);

            $february_unit_cost = 0;
            $february_transportation_cost = 0;
            foreach($february as $row){
                $february_unit_cost += $row['unit_cost'];
                $february_transportation_cost += $row['transportation_cost'];
            }
            $february_purchase  = $february_unit_cost+$february_transportation_cost;

            $MomPurchaseArray ['february'] = $february_purchase;




            /*--------------------------*/

            /*----------MARCH----------*/
            $march_start  = $Y.'-'.date('03-01 00:00:00');
            $march_end    = $Y.'-'.date('03-31 23:59:59');

            $march = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($march_start,$march_end))
                ->get(['unit_cost','transportation_cost']);

            $march_unit_cost = 0;
            $march_transportation_cost = 0;

            foreach($march as $row){
                $march_unit_cost += $row['unit_cost'];
                $march_transportation_cost += $row['transportation_cost'];
            }
            $march_purchase  = $march_unit_cost+$march_transportation_cost;

            $MomPurchaseArray ['march'] = $march_purchase;


            /*--------------------------*/

            /*----------APRIL----------*/

            $april_start  = $Y.'-'.date('04-01 00:00:00');
            $april_end    = $Y.'-'.date('04-31 23:59:59');

            $april = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($april_start,$april_end))
                ->get(['unit_cost','transportation_cost']);

            $april_unit_cost = 0;
            $april_transportation_cost = 0;

            foreach($april as $row){
                $april_unit_cost += $row['unit_cost'];
                $april_transportation_cost += $row['transportation_cost'];
            }
            $april_purchase  = $april_unit_cost+$april_transportation_cost;

            $MomPurchaseArray ['april'] = $april_purchase;


            /*--------------------------*/

            /*----------MAY----------*/

            $may_start  = $Y.'-'.date('05-01 00:00:00');
            $may_end    = $Y.'-'.date('05-31 23:59:59');

            $may = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($may_start,$may_end))
                ->get(['unit_cost','transportation_cost']);

            $may_unit_cost = 0;
            $may_transportation_cost = 0;

            foreach($may as $row){
                $may_unit_cost += $row['unit_cost'];
                $may_transportation_cost += $row['transportation_cost'];
            }
            $may_purchase  = $may_unit_cost+$may_transportation_cost;

            $MomPurchaseArray ['may'] = $may_purchase;



            /*--------------------------*/

            /*----------JUNE----------*/

            $june_start  = $Y.'-'.date('06-01 00:00:00');
            $june_end    = $Y.'-'.date('06-31 23:59:59');

            $june = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($june_start,$june_end))
                ->get(['unit_cost','transportation_cost']);

            $june_unit_cost = 0;
            $june_transportation_cost = 0;
            foreach($june as $row){
                $june_unit_cost += $row['unit_cost'];
                $june_transportation_cost += $row['transportation_cost'];
            }
            $june_purchase  = $june_unit_cost+$june_transportation_cost;

            $MomPurchaseArray ['june'] = $june_purchase;


            /*--------------------------*/

            /*----------JULY----------*/

            $july_start  = $Y.'-'.date('07-01 00:00:00');
            $july_end    = $Y.'-'.date('07-31 23:59:59');

            $july = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($july_start,$july_end))
                ->get(['unit_cost','transportation_cost']);

            $july_unit_cost = 0;
            $july_transportation_cost = 0;
            foreach($july as $row){
                $july_unit_cost += $row['unit_cost'];
                $july_transportation_cost += $row['transportation_cost'];
            }
            $july_purchase  = $july_unit_cost+$july_transportation_cost;

            $MomPurchaseArray ['july'] = $july_purchase;


            /*--------------------------*/

            /*----------AUGUST----------*/

            $august_start  = $Y.'-'.date('08-01 00:00:00');
            $august_end    = $Y.'-'.date('08-31 23:59:59');

            $august = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($august_start,$august_end))
                ->get(['unit_cost','transportation_cost']);

            $august_unit_cost = 0;
            $august_transportation_cost = 0;

            foreach($august as $row){
                $august_unit_cost += $row['unit_cost'];
                $august_transportation_cost += $row['transportation_cost'];
            }
            $august_purchase  = $august_unit_cost+$august_transportation_cost;

            $MomPurchaseArray ['august'] = $august_purchase;


            /*--------------------------*/


            /*----------SEPTEMBER----------*/

            $september_start  = $Y.'-'.date('09-01 00:00:00');
            $september_end    = $Y.'-'.date('09-31 23:59:59');

            $september = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($september_start,$september_end))
                ->get(['unit_cost','transportation_cost']);

            $september_unit_cost = 0;
            $september_transportation_cost = 0;
            foreach($september as $row){
                $september_unit_cost += $row['unit_cost'];
                $september_transportation_cost += $row['transportation_cost'];
            }
            $september_purchase  = $september_unit_cost+$september_transportation_cost;

            $MomPurchaseArray ['september'] = $september_purchase;

            /*--------------------------*/

            /*----------OCTOBER----------*/

            $october_start  = $Y.'-'.date('10-01 00:00:00');
            $october_end    = $Y.'-'.date('10-31 23:59:59');

            $october = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($october_start,$october_end))
                ->get(['unit_cost','transportation_cost']);

            $october_unit_cost =0;
            $october_transportation_cost =0;
            foreach($october as $row){
                $october_unit_cost += $row['unit_cost'];
                $october_transportation_cost += $row['transportation_cost'];
            }
            $october_purchase  = $october_unit_cost+$october_transportation_cost;

            $MomPurchaseArray ['october'] = $october_purchase;



            /*--------------------------*/

            /*----------NOVEMBER----------*/

            $november_start  = $Y.'-'.date('11-01 00:00:00');
            $november_end    = $Y.'-'.date('11-31 23:59:59');

            $november = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($november_start,$november_end))
                ->get(['unit_cost','transportation_cost']);

            $november_unit_cost = 0;
            $november_transportation_cost = 0;
            foreach($november as $row){
                $november_unit_cost += $row['unit_cost'];
                $november_transportation_cost += $row['transportation_cost'];
            }
            $november_purchase  = $november_unit_cost+$november_transportation_cost;

            $MomPurchaseArray ['november'] = $november_purchase;


            /*--------------------------*/

            /*----------DECEMBER----------*/

            $december_start  = $Y.'-'.date('12-01 00:00:00');
            $december_end    = $Y.'-'.date('12-31 23:59:59');
            $december = Inventory::where('products_id', $product_code)
                ->whereBetween('created_at', array($december_start,$december_end))
                ->get(['unit_cost','transportation_cost']);

            $december_unit_cost = 0;
            $december_transportation_cost = 0;
            foreach($december as $row){
                $december_unit_cost += $row['unit_cost'];
                $december_transportation_cost += $row['transportation_cost'];
            }
            $december_purchase  = $december_unit_cost+$december_transportation_cost;

            $MomPurchaseArray ['december'] = $december_purchase;


            /*--------------------------*/



            $reports[] = $MomPurchaseArray ;
        }

        $totalCostPerMonth = array(
            "january" => "-",
            "february" => "-",
            "march" =>"-",
            "april" => "-",
            "may" => "-",
            "june" => "-",
            "july" => "-",
            "august" => "-",
            "september" => "-",
            "october" => "-",
            "november" => "-",
            "december" => "-",
        );

        $january=0;
        $february=0;
        $march=0;
        $april=0;
        $may=0;
        $june=0;
        $july=0;
        $august=0;
        $september=0;
        $october=0;
        $november=0;
        $december=0;

        foreach($reports as $totalPerMonth){
            $january += $totalPerMonth['january'];
            $february += $totalPerMonth['february'];
            $march += $totalPerMonth['march'];
            $april += $totalPerMonth['april'];
            $may += $totalPerMonth['may'];
            $june += $totalPerMonth['june'];
            $july += $totalPerMonth['july'];
            $august += $totalPerMonth['august'];
            $september += $totalPerMonth['september'];
            $october += $totalPerMonth['october'];
            $november += $totalPerMonth['november'];
            $december += $totalPerMonth['december'];
        }

        $totalCostPerMonth ['january'] = $january;
        $totalCostPerMonth ['february'] = $february;
        $totalCostPerMonth ['march'] = $march;
        $totalCostPerMonth ['april'] = $april;
        $totalCostPerMonth ['may'] = $may;
        $totalCostPerMonth ['june'] = $june;
        $totalCostPerMonth ['july'] = $july;
        $totalCostPerMonth ['august'] = $august;
        $totalCostPerMonth ['september'] = $september;
        $totalCostPerMonth ['october'] = $october;
        $totalCostPerMonth ['november'] = $november;
        $totalCostPerMonth ['december'] = $december;


        return view('report.mom',compact('reports','totalCostPerMonth'));
    }

    // DAMAGE REPORT
    public function damagereport(){

    }

    // Supplier Sales Report
    public function suppliersalesreport(){
        $supplier_sales = [];
        $report = [];
        $ranking = [];

        $supplier_id = Pos::groupBy('supplier_id')->get(['supplier_id']);


        foreach($supplier_id as $row){

            $quantity = Pos::where('supplier_id',$row['supplier_id'])->count('id');
            $supplier_name = Supplier::where('id',$row['supplier_id'])->pluck('name');

            $supplier_sales ['supplier_id'] = $row['supplier_id'];
            $supplier_sales['supplier_name'] =  $supplier_name['0'];
            $supplier_sales['quantity'] = $quantity;

            $report[] = $supplier_sales;

        }

        foreach($report as $row){
            $ranking[] = $row['quantity'];
        }
        if($ranking){arsort($ranking);}


        return view('report.supplier',compact('report'));
    }

    // employee sales report
    public function employeesalesreport(Request $request){

        $year = $request->year;

        $month_array = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        $employee_sales = [];

        $employee_list = Employee::all();

            foreach($employee_list as $employee){

                for($i=0;$i<count($month_array);$i++){

                    if($year !=null){
                        $month_start  = date($year.'-'.$month_array[$i].'-01 00:00:00');
                        $month_end    = date($year.'-'.$month_array[$i].'-31 23:59:59');
                    }else{
                        $month_start  = date('Y-'.$month_array[$i].'-01 00:00:00');
                        $month_end    = date('Y-'.$month_array[$i].'-31 23:59:59');
                    }


                        $monthly_sales[]= PosPrimary::where('employee_id', $employee['employee_id'])
                                        ->whereBetween('created_at', array($month_start,$month_end))
                                        ->sum('total_price');
                }

                $employee_sales ['employee_id']         = $employee['employee_id'];
                $employee_sales ['employee_name']       = $employee['employee_name'];
                $employee_sales ['january']             = $monthly_sales[0];
                $employee_sales ['february']            = $monthly_sales[1];
                $employee_sales ['march']               = $monthly_sales[2];
                $employee_sales ['april']               = $monthly_sales[3];
                $employee_sales ['may']                 = $monthly_sales[4];
                $employee_sales ['june']                = $monthly_sales[5];
                $employee_sales ['july']                = $monthly_sales[6];
                $employee_sales ['august']              = $monthly_sales[7];
                $employee_sales ['september']           = $monthly_sales[8];
                $employee_sales ['october']             = $monthly_sales[9];
                $employee_sales ['november']            = $monthly_sales[10];
                $employee_sales ['december']            = $monthly_sales[11];

                unset($monthly_sales);

                $report[] = $employee_sales;

        }

        return view('report.employee',compact('report'));

    }

    //employee dod sales report
    public function employeedodsalesreport( Request $request){
        $dates    = [];
        $report   = [];

        $from = $request->from;
        $to = $request->to;

        $employees  = Employee::get(['employee_id','employee_name']);

        foreach($employees as $row){
            $employee_id[] = $row['employee_id'];
        }

        $dod = [
            "date"  =>  "",
            "weekday" => "",
        ];

        //array_push($dod,$employee_id);

        //dd($dod);

        $date_list  = PosPrimary::groupBy('created_at')->get(['created_at']);

        foreach($date_list as $row){
            $dates[] = date_format($row['created_at'],"Y-m-d");
        }

        $dates= array_unique($dates);


        if($from !=null && $to !=null){
            function createRange($startDate, $endDate) {
                $tmpDate = new DateTime($startDate);
                $tmpEndDate = new DateTime($endDate);

                $outArray = array();
                do {
                    $outArray[] = $tmpDate->format('Y-m-d');
                } while ($tmpDate->modify('+1 day') <= $tmpEndDate);

                return $outArray;
            }
            $dates = createRange($from, $to);

            foreach($dates as $row){
                $start  =       $row." "."00:00:00";
                $end    =       $row." "."23:59:59";

                foreach($employees as $employee){
                    $weekdays        =   PosPrimary::whereBetween('created_at', array($start,$end))->pluck('weekday');
                    $dod_sales[]    =   PosPrimary::where('employee_id',$employee['employee_id'])
                                            ->whereBetween('created_at', array($start,$end))
                                            ->sum('total_price');
                }

                $dod['date'] = $row;
                if(count($weekdays)>0){
                    $dod['weekday'] = $weekdays[0];
                }else{
                    $dod['weekday'] ='';
                }




                for($i=0;$i<count($dod_sales);$i++){
                    $dod[$employee_id[$i]] = $dod_sales[$i];
                }

                unset($dod_sales);

                $report[] = $dod;
            }



        }else{
            foreach($dates as $row){
                $start  =       $row." "."00:00:00";
                $end    =       $row." "."23:59:59";

                foreach($employees as $employee){
                    $weekday        =   PosPrimary::whereBetween('created_at', array($start,$end))->pluck('weekday');

                    $dod_sales[]    =   PosPrimary::where('employee_id',$employee['employee_id'])
                                            ->whereBetween('created_at', array($start,$end))
                                            ->sum('total_price');
                }

                $dod['date'] = $row;
                $dod['weekday'] = $weekday[0];

                for($i=0;$i<count($dod_sales);$i++){
                    $dod[$employee_id[$i]] = $dod_sales[$i];
                }

                unset($dod_sales);

                $report[] = $dod;

            }
        }




        return view('report.employeedod',compact('employees','report'));

    }

    // sales incentive report
    public function salesincentivereport(Request $request){
        $report   = [];
        $year = $request->year;

        $month_array = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        $employee_incentive = [];

        $employee_id = PosPrimary::groupBy('employee_id')->get(['employee_id']);

        foreach($employee_id as $row){

            //$pos_session_code = PosPrimary::where('employee_id',$row['employee_id'])->get(['pos_session_code']);

            //foreach($pos_session_code as $code){

                for($i=0;$i<count($month_array);$i++){

                    if($year !=null){
                        $month_start  = date($year.'-'.$month_array[$i].'-01 00:00:00');
                        $month_end    = date($year.'-'.$month_array[$i].'-31 23:59:59');
                    }else{
                        $month_start  = date('Y-'.$month_array[$i].'-01 00:00:00');
                        $month_end    = date('Y-'.$month_array[$i].'-31 23:59:59');
                    }


                    $monthly_incentive[]= Pos::where('employee_id',$row['employee_id'])
                                        ->where('status',1)
                                        ->whereBetween('created_at', array($month_start,$month_end))
                                        ->sum('bonus');
                }

                $employee_incentive ['employee_id']         = $row['employee_id'];
                $employee_incentive ['january']             = $monthly_incentive[0];
                $employee_incentive ['february']            = $monthly_incentive[1];
                $employee_incentive ['march']               = $monthly_incentive[2];
                $employee_incentive ['april']               = $monthly_incentive[3];
                $employee_incentive ['may']                 = $monthly_incentive[4];
                $employee_incentive ['june']                = $monthly_incentive[5];
                $employee_incentive ['july']                = $monthly_incentive[6];
                $employee_incentive ['august']              = $monthly_incentive[7];
                $employee_incentive ['september']           = $monthly_incentive[8];
                $employee_incentive ['october']             = $monthly_incentive[9];
                $employee_incentive ['november']            = $monthly_incentive[10];
                $employee_incentive ['december']            = $monthly_incentive[11];

                unset($monthly_incentive);

                $report[] = $employee_incentive;
            }

        //}

        //dd($report);

        return view('report.salesincentive',compact('report'));

    }

    public function summary(Request $request){
        $newdates = [];
        $report = [];
        $summary = array(
            "date" => "-",
            "weekday" => "-",
            "quantity" => "-",
            "total" => "-",
        );

        if($request->from !=null && $request->to !=null){
            $from   = $request->from;
            $to     =  $request->to;

            $periods = CarbonPeriod::create($from,$to);
            foreach ($periods as $date) {
                $dates[] = $date->format('Y-m-d');
            }
        }else{

            $dates = PosPrimary::get(['created_at']);
            foreach($dates as $date){
                $newdates[] = date('Y-m-d', strtotime($date->created_at));
            }
            $dates = array_unique($newdates);
        }

        foreach($dates as $date){

            $from =  $date.' '.'00:00:00';
            $to =  $date.' '.'23:59:59';
            $summary['date']        =   $date;
            $summary['weekday']     =   $weekday = PosPrimary::whereBetween('created_at',array($from,$to))->groupBy('weekday')->value('weekday');
            $summary['total']       =   $total = PosPrimary::whereBetween('created_at',array($from,$to))->sum('total_price');
            $summary['quantity']    =   $quantity = Pos::whereBetween('created_at',array($from,$to))->count();

            $report[] = $summary;

            unset($summary);
        }

        return view('report.summary',compact('report'));
    }
}
