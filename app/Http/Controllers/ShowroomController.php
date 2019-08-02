<?php

namespace App\Http\Controllers;

use App\Showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
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
        $showrooms = Showroom::all();
        return view('showroom.index',compact('showrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('showroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Showroom::create([
            'showroom_code'=>request('showroom_code'),
            'showroom_name'=>request('showroom_name'),
            'showroom_address'=>request('showroom_address'),

            "created_at"                => \Carbon\Carbon::now(),
            "updated_at"                => \Carbon\Carbon::now(),

        ]);

        return redirect('/showroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function show(Showroom $showroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Showroom $showroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showroom $showroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showroom $showroom)
    {
        //
    }
}
