<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{

    protected $fillable = [
        'employee_profile_id', 'address_line_1', 'address_line_2', 'city', 'state', 'zip', 'home_phone', 'work_phone', 'mobile_phone'
    ];

    public function employee_profile()
    {
        return $this->belongsTo('App\EmployeeProfile');
    }
}
