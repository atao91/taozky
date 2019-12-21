<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkWork extends Model
{
    protected $table = 'tzk_work';

    public static function getOrderNo(){
        $date = date("Ymd");
        $start = date("Y-m-d 00:00:00");
        $end = date("Y-m-d 23:59:59");
        $count = (new static())->whereBetween('created_at',[$start,$end])->count();
        return 'RW'.$date.str_pad($count+1,3,"0",STR_PAD_LEFT);
    }

    public function liuc(){
        return $this->belongsTo(TzkLiuc::class,'work_id','id');
    }

    public function orders(){
        return $this->belongsTo(TzkOrder::class,'order_id','id');
    }

}
