<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $fillable = ['employee_profile_id', 'school', 'start_date', 'end_date', 'qualification', 'notes'];
    
    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
