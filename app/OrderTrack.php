<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTrack extends Model
{
    protected $guarded = [];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return 'Pesanan Baru';
        } elseif ($this->status == 1) {
            return 'Sudah Dijemput';
        } elseif ($this->status == 2) {
            return 'Sudah Sampai';
        }
        return 'Selesai';
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
