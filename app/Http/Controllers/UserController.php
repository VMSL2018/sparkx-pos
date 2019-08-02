<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Showroom;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showrooms = Showroom::all();
        return view('user.create',compact('showrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validatiion
        $this->validate($request,[
            //'email' => 'required|unique'
            //'email' => ['required','unique']
            'name'  =>  'required',
            'email' =>  'required|unique:users',
        ]);
        // Insertion
        User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'type'=>request('type'),
            'showroom'=>request('showroom'),
            'password'=>bcrypt(request('password')),
            "created_at"                => \Carbon\Carbon::now(),
            "updated_at"                => \Carbon\Carbon::now(),

        ]);

        // redirection
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
