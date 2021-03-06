<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'employee_profile_id', 'first_name', 'middle_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employeeProfile()
    {
        return $this->hasOne('App\EmployeeProfile');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasAdminRole()
    {
        return $this->hasRole('Admin');
    }

    public function hasManagerRole()
    {
        return $this->hasRole('Manager');
    }

    public function hasUserRole()
    {
        return $this->hasRole('User');
    }

    public function getManagers()
    {
        return User::whereHas('employeeProfile', function ($q) {
            $q->where('department_id', $this->employeeprofile->department_id);
        })
        ->whereHas('roles', function ($q) {
            $q->where('name', 'Manager');
        })->get();
    }

}
