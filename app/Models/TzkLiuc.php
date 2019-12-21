<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TzkLiuc extends Model
{
    //
    protected $table = 'tzk_liucheng';
    public function ali(){
        return $this->belongsTo(TzkUserAli::class,'ali_id','id');
    }
    public function works(){
        return $this->belongsTo(TzkWork::class,'work_id','id');
    }

    

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
