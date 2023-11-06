<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class Employee extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = \App\Models\Employee::simplePaginate(10);
        return view("Employee.viewAllEmployees", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view("Employee.addEmployee", ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "first_name" => "required",
            "last_name"=> "required",
            "company_id" =>"",
            "email"=> "required|email",
            "phone" => "nullable",
        ]);
        $employee = new \App\Models\Employee();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('employee.viewAllEmployees')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = \App\Models\Employee::find($id);
        $companies = Company::all();
        return view('Employee.editEmployee',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "first_name" => "required",
            "last_name"=> "required",
            "company_id" =>"",
            "email"=> "required|email",
            "phone" => "nullable",
        ]);
        $employee = \App\Models\Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Employee created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = \App\Models\Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee Has Been Deleted Successfully...');
    }
}
