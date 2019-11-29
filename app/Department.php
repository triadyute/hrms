<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = ['name'];

    public function employeeProfiles()
    {
        return $this->hasMany('App\EmployeeProfile');
    }

    public function getEmployees(){
        return User::whereHas('employeeProfile', function($q){
            $q->where('department_id', $this->id);
        })->get();
    }
}
