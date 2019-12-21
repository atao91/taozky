<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TzkUserAli extends Model
{
    protected $table = 'tzk_users_ali';

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
