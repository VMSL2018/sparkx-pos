<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Supplier;

class SupplierController extends Controller
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
        $suppliers = Supplier::all();
        return view('supplier.list-supplier',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.add-supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Supplier::create([
            'name'=>request('name'),
            'contact_person'=>request('contact_person'),
            'contact_number'=>request('contact_number'),
            'alt_contact_number'=>request('alt_contact_number'),
            'supplier_email'=>request('supplier_email'),
            'supplier_address'=>request('supplier_address'),
            'extra_info'=>request('extra_info'),

            "created_at"                => \Carbon\Carbon::now(),
            "updated_at"                => \Carbon\Carbon::now(),

        ]);

        return redirect('/supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::where('id',$id)->first();

        return view('supplier.edit-supplier',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Supplier::where('id',$id)
            ->update([
                'name' => $request->name,
                'contact_person'=>$request->contact_person,
                'contact_number'=>$request->contact_number,
                'alt_contact_number'=>$request->alt_contact_number,
                'supplier_email'=>$request->supplier_email,
                'supplier_address'=>$request->supplier_address,
                'extra_info'=>$request->extra_info,
                ]);

        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
