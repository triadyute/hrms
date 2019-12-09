<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'business_type', 'address', 'phone', 'email', 'logo'];

    public $casts = ['address' => 'json', 'phone' => 'json', 'email' => 'json'];

    public function departments()
    {
        return $this->hasMany('App\Departments');
    }
}
