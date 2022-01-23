<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function ordertrack()
    {
        return $this->hasMany(OrderTrack::class, 'driver_id');
    }
}
