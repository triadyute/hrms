<?php

namespace App\Http\Controllers;

use App\Department;
use App\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::paginate(15);
        $departments = Department::all();
        // $users = User::whereHas('roles', function($q){
        //     $q->where('name', 'Admin')->orWhere('name', 'Manager');
        // })->get();

        //return $users;
        return view('users.index', compact('users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $random_password = Str::random(16);
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|integer',
            'role' => 'required|string|max:255'
            //'password' => 'required|string|min:8'
        ]);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $random_password
        ]);
        $employee_profile = EmployeeProfile::create();
        $employee_profile->user_id = $user->id;
        $employee_profile->department_id = $request->department;
        $employee_profile->job_title = $request->job_title;
        $employee_profile->hire_date = now();
        $user->employee_profile_id = $employee_profile->id;
        
        if(request()->role == 'role_user'){
            $role = 1;
        }
        if(request()->role == 'role_manager'){
            $role = 2;
        }
        if(request()->role == 'role_admin'){
            $role = 3;
        }
        $user->roles()->detach();
        $user->roles()->attach($role);
        $user->save();
        $employee_profile->save();
        return redirect()->route('user.index')->with('status', 'Employee added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('employees.profile', compact('user'));
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
