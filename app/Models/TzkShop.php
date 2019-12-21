<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkShop extends Model
{
    protected $table = 'tzk_shop';

    protected $fillable = [
        'title',
        'shop_url',
        'tb_id',
        'province',
        'city',
        'district',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(TzkBusines::class,'id','user_id');
    }


    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
