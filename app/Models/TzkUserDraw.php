<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkUserDraw extends Model
{
    protected $table = 'tzk_user_draw';

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function admins(){
        return $this->belongsTo(TzkBusines::class,'admin_id','id');
    }
}
