<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'employee_profile_id', 'name', 'examining_body', 'credential_id', 'issued_on', 'expires', 'expires_on', 'credential_url'
    ]; 
    
    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
