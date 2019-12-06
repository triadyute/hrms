<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
   protected $fillable =['employee_profile_id', 'leave_type', 'start_date', 'end_date', 'days'];
   
   public function employeeprofile()
   {
       return $this->belongsTo('App\EmployeeProfile');
   }
   
}
