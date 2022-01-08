<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $appends = ['status_label', 'total'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return 'Pesanan Baru';
        } elseif ($this->status == 1) {
            return 'Sedang Dijemput';
        } elseif ($this->status == 2) {
            return 'Sudah Dijemput';
        } elseif ($this->status == 3) {
            return 'Sedang Diantar';
        } elseif ($this->status == 4) {
            return 'Sudah Sampai';
        } 
        return 'Selesai';
    }
    
}
