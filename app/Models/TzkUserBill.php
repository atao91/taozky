<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkUserBill extends Model
{
    protected $table = 'tzk_user_bill';
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
