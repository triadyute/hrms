<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = ['user_id', 'department_id', 'manager_id', 'job_title', 'hire_date', 'id_number', 'id_type', 'employment_status', 'profile_photo', 'gender', 'date_of_birth', 'marital_status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function dependents()
    {
        return $this->hasMany('App\Depemdent');
    }

    public function emergency_contacts()
    {
        return $this->hasMany('App\EmergencyContact');
    }

    public function education()
    {
        return $this->hasMany('App\Education');
    }

    public function certification()
    {
        return $this->hasMany('App\Certification');
    }

    public function contact_information()
    {
        return $this->hasMany('App\ContactInformation');
    }

    public function languages()
    {
        return $this->hasMany('App\Language');
    }

    public function leave()
    {
        return $this->hasOne('App\Leave');
    }
}
