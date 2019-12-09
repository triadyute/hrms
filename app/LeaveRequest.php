<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
   protected $fillable = ['employee_profile_id', 'leave_type', 'start_date', 'end_date', 'days', 'notes', 'approved'];
   
   public function employeeProfile()
   {
       return $this->belongsTo('App\EmployeeProfile');
   }
   
}
