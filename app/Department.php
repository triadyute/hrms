<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{

    protected $fillable = ['company_id', 'name'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function employeeProfiles()
    {
        return $this->hasMany('App\EmployeeProfile');
    }

    public function getEmployees(){
        return User::whereHas('employeeProfile', function($q){
            $q->where('department_id', $this->id);
        })->get();
    }

    public function getManagers(){
        return User::whereHas('employeeProfile', function($q){
            $q->where('department_id', $this->id);
        })->whereHas('roles', function ($q) {
            $q->where('name', 'Manager')->orWhere('name', 'Admin');
        })->get();
    }

    public function getAdmin()
    {
        return User::whereHas('employeeProfile', function ($q) {
            $q->where('department_id', $this->id);
        })->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();
    }
}
