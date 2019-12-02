<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $fillable = ['employee_profile_id', 'name', 'relationship'];
    
    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
