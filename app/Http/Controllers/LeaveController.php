<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index(){
        return view('leave.index');
    }

    public function view_leave_requests(){
        return view('leave.view-requests');
    }
}
