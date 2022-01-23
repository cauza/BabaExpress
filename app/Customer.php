<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    public $incrementing = false;
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'mitra_id');
    }

    
}
