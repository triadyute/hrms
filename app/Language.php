<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['employee_profile_id', 'language', 'fluency'];
    
    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
