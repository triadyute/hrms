<?php

namespace App\Http\Controllers;
use App\LeaveRequest;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view('leave.index');
    }

    public function view_leave_requests()
    {
        $leave_requests = LeaveRequest::all();
        return view('leave.view-requests', compact('leave_requests'));
    }

    public function request_leave()
    {
        return view('leave.request-leave');
    }
}
