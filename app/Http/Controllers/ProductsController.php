<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        $products = Products::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Products::create([
            'product_code'=>request('product_code'),
            'product_name'=>request('product_name'),
            'category'=>request('category'),

            "created_at"                => \Carbon\Carbon::now(),
            "updated_at"                => \Carbon\Carbon::now(),

        ]);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Products $products)
    {
        $id = $request->product;
        $products = Products::where('id',$id)->first(); 

        return view('product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $id = $id;

        $required_quantity = $request->required_quantity;
        $reorder_level = $request->reorder_level;


        Products::where('id',$id)
        ->update([
            'required_quantity'     =>  $required_quantity,
            'reorder_level'         =>  $reorder_level,
            ]);

        return "success";

    }



    public function updateData(Request $request, Products $products)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
