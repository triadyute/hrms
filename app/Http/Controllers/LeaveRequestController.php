<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
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
        //dd(request()->all());
        
        $dates = $request->dates;
        $dates = explode(" - ", $dates);
        $start_date =  \Carbon\Carbon::parse($dates[0]);
        $end_date = \Carbon\Carbon::parse($dates[1]);
        $period = \Carbon\CarbonPeriod::create($start_date, $end_date);
        $vacation = array();
        // Iterate over the period
        foreach ($period as $date) {
            if ($date->format('l') != 'Saturday' && $date->format('l') != 'Sunday') {
                //echo $date->toFormattedDateString().' '. $date->format('l');
                array_push($vacation, $date);
            }
        }

        // Convert the period to an array of dates
        return $vacation;
        // $data = $request->validate([
        //     'leave_type' => 'required|string|max:255',
        //     'dates' => 'required|string|max:255',
        //     'notes' => 'nullable|string',
        // ]);
        // $leave_request = LeaveRequest::create([
        //     'employee_profile_id' => Auth::user()->employeeprofile->id,
        //     'leave_type' => $data['leave_type'],
        //     'days' => 4,
        //     'notes' => $data['notes'],
        //     'start_date' => $start_date,
        //     'end_date' => $end_date
        // ]);
        // $leave_request->days = $start_date->diffInDays($end_date);
        // $leave_request->save();
        // return 'saved';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        //
    }
}
