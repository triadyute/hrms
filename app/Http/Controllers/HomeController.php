<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company =  Company::find(1);
        if(Auth::user()->hasAdminRole()){
            return view('admin-dashboard', compact('company'));
        }
        elseif(Auth::user()->hasUserRole()){
            return view('employee-dashboard', compact('company'));
        }
    }
}
