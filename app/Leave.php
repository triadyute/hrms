<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{

   protected $fillable = [
      'employee_profile_id', 'vacation', 'sick_leave', 'maternity_leave', 'compassionate_leave', 'personal_leave', 'other', 'other_details'. 'total_days'
   ];


   public function employee_profile()
   {
      return $this->belongsTo('App\EmployeeProfile');
   }
}
