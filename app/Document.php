<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = ['employee_profile_id', 'type', 'file'];
    
    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
