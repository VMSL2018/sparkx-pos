<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Showroom;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $employees = Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showrooms = Showroom::all();
        return view('employee.create',compact('showrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create([
            'employee_id'           =>  $request->employee_id,
            'employee_name'         =>  $request->employee_name,
            'showroom'              =>  $request->showroom,
            'salary'                =>  $request->salary,
            "created_at"            =>  \Carbon\Carbon::now(),
            "updated_at"            =>  \Carbon\Carbon::now(),
        ]);

        return redirect('/employee');
    }


    public function employeelist(Request $request)
    {
        $employeedetails = Employee::where('employee_id',$request->employee_id)->first();
        return $employeedetails;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
