<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkOrder extends Model
{
    protected $table = 'tzk_order';

    public static function getOrderNo(){
        $date = date("Ymd");
        $start = date("Y-m-d 00:00:00");
        $end = date("Y-m-d 23:59:59");
        $count = (new static())->whereBetween('created_at',[$start,$end])->count();
        return 'DD'.$date.str_pad($count+1,3,"0",STR_PAD_LEFT);
    }

    public function templates(){
        return $this->belongsTo(TzkTemplate::class,'templates_id','id');
    }

    public function works(){
        return $this->hasMany(TzkWork::class,'order_id','id');
    }
}
