<?php

namespace App\Http\Controllers;

use App\EmployeeProfile;
use App\Department;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
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
        dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employeeProfile', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProfile $employeeProfile)
    {
        //
    }
}
