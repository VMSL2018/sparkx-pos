<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Pos;
use App\Supplier;
use App\Products;
use App\Showroom;
use App\Warehouse;
use App\ItemCodes;
use App\ReturnItem;
use App\Classes\ItemCode;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventoryController extends Controller
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
    public function index(){

        $warehouses = Warehouse::all();   // GETTING SUPPLIERS LIST FROM showrooms TABLE
        return view('inventory.list-product',compact('warehouses'));
    }

    public function alldata(Request $request){

        $item_code = $request->item_code;
        $invoice_number = $request->invoice_number;
        $lot_number = $request->lot_number;
        $selling_status = $request->selling_status;
        $warehouse_id = $request->warehouse_id;
        

        if($request->from != NULL){
            $from = $request->from;
        }else{
            $from = date("2000-01-01 00:00:00");
        }
        if($request->to != NULL){
            $to = $request->to;
        }else{
            $to = date("Y-m-d 23:59:59");
        }
        
        // Building search query
        $query = Inventory::select('inventories.*');

        if($item_code != NULL){
            $query->where('item_code',$item_code);
        }
            
        if($invoice_number != NULL){
            $query->where('invoice_number',$invoice_number);
        }
            
        if($lot_number != NULL){
            $query->where('lot_number',$lot_number);
        }
            
        if($selling_status != NULL){
            $query->where('selling_status',$selling_status);
        }
            
        if($warehouse_id != NULL){
            $query->where('warehouse_id',$warehouse_id);
        }

        $query->whereBetween('created_at', array($from,$to));

        $inventories = $query->get();

        return view('inventory.inventory-registry',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();   // GETTING SUPPLIERS LIST FROM suppliers TABLE
        
        $showrooms = Showroom::all();   // GETTING SHOWROOMS LIST FROM showrooms TABLE
        $warehouses = Warehouse::all(); // GETTING SUPPLIERS LIST FROM showrooms TABLE

        $men= Products::where('category','MAN')->get();     // GETTING SUPPLIERS LIST FROM products TABLE
        $ladies= Products::where('category','LADY')->get();     // GETTING SUPPLIERS LIST FROM products TABLE
        $boys= Products::where('category','BOY')->get();     // GETTING SUPPLIERS LIST FROM products TABLE
        $girls= Products::where('category','GIRL')->get();     // GETTING SUPPLIERS LIST FROM products TABLE
        

        $itemcode = Itemcodes::where('used',0)->first();
        



        return view('inventory.add-product',compact('suppliers','men','ladies','boys','girls','showrooms','warehouses','itemcode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $total_item         = $request->total_item;
        $unit_total_cost    = $request->unit_cost + $request->transportation_cost;
        $gp_taka            = $request->selling_price - $unit_total_cost;
        $gp_margin          = round(($gp_taka *100)/$unit_total_cost);




        $itemcodes = ItemCodes::where('used', 0)
            ->orderBy('id', 'asc')
            ->take($total_item)
            ->get();

		

	
        $supplier_name      = Supplier::where('id', request('supplier_id'))->get();
       
       
        $product_name       = Products::where('product_code',request('product_id'))->get();
       
        $showroom_name      = Showroom::where('id', request('showroom_id'))->get();
       
        $warehouse_name     = Warehouse::where('id', request('warehouse_id'))->get();
 

        foreach($itemcodes as $itemcode){

            Inventory::create([

                'invoice_number'        =>      request('invoice_number'),
                'invoice_date'          =>      request('invoice_date'),
                'invoice_cost'          =>      request('invoice_cost'),
                'lot_number'            =>      request('lot_number'),


                'item_code'=>$itemcode->itemcode,

                'products_id'=> (string)$request->product_id ,
                'product_name'=>$product_name[0]->product_name,
                'category'=>$product_name[0]->category,

                'supplier_id'=>request('supplier_id'),
                'supplier_name'=>$supplier_name[0]->name,

                'total_item'=>request('total_item'),
                'unit_cost'=>request('unit_cost'),
                'transportation_cost'=>request('transportation_cost'),
                'unit_total_cost' => $unit_total_cost,
                'selling_price'=>request('selling_price'),

                'gp_taka'=>$gp_taka,
                'gp_margin'=>$gp_margin,

                'showroom_id'=>request('showroom_id'),
                'showroom_name'=>$showroom_name[0]->showroom_name,

                'warehouse_id'=>request('warehouse_id'),
                'warehouse_name'=>$warehouse_name[0]->warehouse_name,

                'return_status'=>0,
                'selling_status'=>0,


                "created_at"                => \Carbon\Carbon::now(),
                "updated_at"                => \Carbon\Carbon::now(),


            ]);

        }


        foreach($itemcodes as $itemcode){
            ItemCodes::where('id', $itemcode->id)
                        ->update(['used' => 1]);
        }



        return  redirect('/inventory/create');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return "EDIT DATA";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $item_code = $inventory->item_code;
        $inventories = Inventory::where('item_code',$item_code)->get();
        $suppliers = Supplier::all();   // GETTING SUPPLIERS LIST FROM suppliers TABLE
        $products= Products::all();     // GETTING SUPPLIERS LIST FROM products TABLE
        $showrooms = Showroom::all();   // GETTING SUPPLIERS LIST FROM showrooms TABLE
        $warehouses = Warehouse::all(); // GETTING SUPPLIERS LIST FROM showrooms TABLE
        return view('inventory.edit-item',compact('inventories','suppliers','products','showrooms','warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        
        //return $inventory->id;
        $id = Inventory::find($request->id);

        $supplier_id = $request->supplier_name;
        $supplier_name = Supplier::where('id',$supplier_id)->value('name');

        $product_id = $request->product_name;
        $product_name = Products::where('product_code',$product_id)->value('product_name');

        $showroom_id = $request->showroom_name;
        $showroom_name = Showroom::where('id',$showroom_id)->value('showroom_name');

        $warehouse_id = $request->warehouse_name;
        $warehouse_name = Warehouse::where('id',$warehouse_id)->value('warehouse_name');

        //return $showroom_name;


        $unit_total_cost    = $request->unit_cost + $request->transportation_cost;
        $gp_taka            = $request->selling_price - $unit_total_cost;
        $gp_margin          = round(($gp_taka *100)/$unit_total_cost);
        
        $id->lot_number = $request->lot_number;
        $id->products_id            =    $product_id;
        $id->product_name           =   $product_name;
        $id->category               =   $request->category;
        $id->supplier_id            =   $supplier_id;
        $id->supplier_name          =   $supplier_name;
        $id->unit_cost              =   $request->unit_cost;
        $id->transportation_cost    =   $request->transportation_cost;
        $id->unit_total_cost        =   $unit_total_cost;
        $id->gp_taka                =   $gp_taka;
        $id->gp_margin              =   $gp_margin;
        $id->selling_price          =   $request->selling_price;
        $id->showroom_id            =   $showroom_id;
        $id->showroom_name          =   $showroom_name;
        $id->warehouse_id           =   $warehouse_id;
        $id->warehouse_name         =   $warehouse_name;
        $id->selling_status         =   $request->selling_status;
        $id->return_status          =   $request->selling_status;

        $id->save();
    
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }




    
    //RETURN PRODUCT FROM CUSTOMER
    
    public function returnitem(){

        $returns = Pos::where('status',2)->get();

        return view('inventory.return',compact('returns'));
        
    }

    public function returnupdate(Request $request){

        // Validatiion
        $this->validate($request,[
            'item_code'  =>  'required',
            'return_reason' =>  'required',
        ]);

        Pos::where('itemcode',$request->item_code)->update(['return_reason'=> $request->return_reason,'status' => 2]);// Return from customer status is 2

        Inventory::where('item_code',$request->item_code)->update(['return_status'=> 2,'selling_status' => 2]); // Return from customer status is 2

        ReturnItem::create([
            'item_code'=>  $request->item_code,
            'return_reason'=> $request->return_reason,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        
        return "success";
    }

    // DAMAGE CONTROL

    public function damageitem(){
        return view('inventory.damage');
    }

    public function damageupdate(Request $request){
        // Validatiion
        $this->validate($request,[
            'item_code'  =>  'required',
            //'return_reason' =>  'required',
        ]);

        Inventory::where('item_code',$request->item_code)->update(['return_status'=> 4,'selling_status'=> 4]);
        return "success";
    }

    //  INPUT LOST ITEMS
    public function lostitem(){
        return view('inventory.lost');
    }

    public function lostupdate(Request $request){
        // Validatiion
        $this->validate($request,[
            'item_code'  =>  'required',
            //'return_reason' =>  'required',
        ]);

        Inventory::where('item_code',$request->item_code)->update(['return_status'=> 3,'selling_status'=> 3]);
        return "success";
    }

    public function multiple( Request $request){

            $total_items = $request->items;
            $suppliers = Supplier::all();   // GETTING SUPPLIERS LIST FROM suppliers TABLE
            $products= Products::all();     // GETTING SUPPLIERS LIST FROM products TABLE
            $showrooms = Showroom::all();   // GETTING SUPPLIERS LIST FROM showrooms TABLE
            $warehouses = Warehouse::all(); // GETTING SUPPLIERS LIST FROM showrooms TABLE

            $itemcodes = Itemcodes::where('used',0)->take($total_items)->get();        
            return view('inventory.add-product-2',compact('suppliers','products','showrooms','warehouses','itemcodes','total_items'));
    }

    public function multipleInsert( Request $request){

        $itemcodes =  $request->item_code;
        $selling_prices =  $request->selling_price;


        $unit_total_cost    = $request->unit_cost + $request->transportation_cost;
        

        $supplier_name      = Supplier::where('id', request('supplier_id'))->get();
        $product_name       = Products::where('product_code',request('product_id'))->get();
        $showroom_name      = Showroom::where('id', request('showroom_id'))->get();
        $warehouse_name     = Warehouse::where('id', request('warehouse_id'))->get();
 
        $count = count($itemcodes);

        for($i=0;$i< $count;$i++){

            $gp_taka            = $selling_prices[$i] - $unit_total_cost;
            $gp_margin          = round(($gp_taka *100)/$unit_total_cost);

            Inventory::create([

                'invoice_number'        =>      request('invoice_number'),
                'invoice_date'          =>      request('invoice_date'),
                'invoice_cost'          =>      request('invoice_cost'),
                'lot_number'            =>      request('lot_number'),


                'item_code'=> $itemcodes[$i],

                'products_id'=> (string)$request->product_id ,
                'product_name'=>$product_name[0]->product_name,
                'category'=>$product_name[0]->category,

                'supplier_id'=>request('supplier_id'),
                'supplier_name'=>$supplier_name[0]->name,

                'total_item'=>count($itemcodes),
                'unit_cost'=>request('unit_cost'),
                'transportation_cost'=>request('transportation_cost'),
                'unit_total_cost' => $unit_total_cost,

                'selling_price'=>$selling_prices[$i],

                'gp_taka'=>$gp_taka,
                'gp_margin'=>$gp_margin,

                'showroom_id'=>request('showroom_id'),
                'showroom_name'=>$showroom_name[0]->showroom_name,

                'warehouse_id'=>request('warehouse_id'),
                'warehouse_name'=>$warehouse_name[0]->warehouse_name,

                'return_status'=>0,
                'selling_status'=>0,


                "created_at"                => \Carbon\Carbon::now(),
                "updated_at"                => \Carbon\Carbon::now(),


            ]);
        }



        foreach($itemcodes as $itemcode){
            ItemCodes::where('itemcode', $itemcode)
                        ->update(['used' => 1]);
        }

        return view('inventory.multiple-sales');

    }

    public function inventorysearch(Request $request)
    {
        $suppliers = Supplier::all();   // GETTING SUPPLIERS LIST FROM suppliers TABLE
        $products= Products::all();     // GETTING SUPPLIERS LIST FROM products TABLE
        $showrooms = Showroom::all();   // GETTING SUPPLIERS LIST FROM showrooms TABLE
        $warehouses = Warehouse::all(); // GETTING SUPPLIERS LIST FROM showrooms TABLE

        $lot_number = $request->lot; 

        $inventories = Inventory::where('lot_number',$lot_number)->where('selling_status','!=',1)->get();
       

        return view('inventory.search-inventory',compact('inventories','products','suppliers','warehouses','showrooms'));
    }

    public function bulkupdate(Request $request){
        
        $count = count($request->id);
        $invoice_number = $request->invoice_number;
        $lot_number = $request->lot; 
        for($i=0;$i< $count; $i++){
            $id = Inventory::find($request->id[$i]);

            $supplier_id = $request->supplier_name[$i];
            $supplier_name = Supplier::where('id',$supplier_id)->value('name');

            $product_id = $request->product_name[$i];
            $product_name = Products::where('product_code',$product_id)->value('product_name');

            $showroom_id = $request->showroom_name[$i];
            $showroom_name = Showroom::where('id',$showroom_id)->value('showroom_name');

            $warehouse_id = $request->warehouse_name[$i];
            $warehouse_name = Warehouse::where('id',$warehouse_id)->value('warehouse_name');

            $unit_total_cost    = $request->unit_cost[$i] + $request->transportation_cost[$i];
            $gp_taka            = $request->selling_price[$i] - $unit_total_cost;
            $gp_margin          = round(($gp_taka *100)/$unit_total_cost);

            $id->lot_number             = $request->lot_number[$i];
            $id->products_id             =   $product_id;
            $id->product_name           =   $product_name;
            $id->category               =   $request->category[$i];
            $id->supplier_id            =   $supplier_id;
            $id->supplier_name          =   $supplier_name;
            $id->unit_cost              =   $request->unit_cost[$i];
            $id->transportation_cost    =   $request->transportation_cost[$i];
            $id->unit_total_cost        =   $unit_total_cost;
            $id->gp_taka                =   $gp_taka;
            $id->gp_margin              =   $gp_margin;
            $id->selling_price          =   $request->selling_price[$i];
            $id->showroom_id            =   $showroom_id;
            $id->showroom_name          =   $showroom_name;
            $id->warehouse_id           =   $warehouse_id;
            $id->warehouse_name         =   $warehouse_name;
            $id->selling_status         =   $request->selling_status[$i];
            $id->return_status          =   $request->selling_status[$i];

            $id->save();
        }

        return  redirect('/inventory-search?lot='.$lot_number);

    }

    public function transfer( Request $request){

        if($request->lot){
            $lot_number = $request->lot;
            $warehouse_name = Inventory::select('warehouse_name')->where('lot_number',$lot_number)->groupBy('warehouse_name')->first();
            return $warehouse_name;
        }
        
        elseif($request->transfer_product){
            $lot_number = $request->lot_number;
            $warehouse_to = $request->warehouse_to;

            $ids = Inventory::select('id')->where('lot_number',$lot_number)->get();

            $warehouse_id = Warehouse::where('warehouse_code',$warehouse_to )->value('id');
            $warehouse_name = Warehouse::where('warehouse_code',$warehouse_to)->value('warehouse_name');

            for($i=0;$i< count($ids);$i++){
                $id = Inventory::find($ids[$i]['id']);
                $id->warehouse_id           =   $warehouse_id;
                $id->warehouse_name         =   $warehouse_name;
                $id->save();
            }


            //if($update_inventory){
                $lot_numbers = Inventory::select('lot_number')->groupBy('lot_number')->get(['lot_number']);
                $warehouses = Warehouse::get(['warehouse_code','warehouse_name']);
                return view('inventory.transfer',compact('lot_numbers','warehouses'));
            //}

        }
        
        else{
            $lot_numbers = Inventory::select('lot_number')->groupBy('lot_number')->get(['lot_number']);
            $warehouses = Warehouse::get(['warehouse_code','warehouse_name']);
            return view('inventory.transfer',compact('lot_numbers','warehouses'));
        }


    }
}
