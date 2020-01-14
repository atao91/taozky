<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table =  'tzk_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'password', 'user_level','card_id','bank_name','bank_no','bank_addr','bank_branch','wechats','qq','referrer','status','id_card_img','bank_img'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserNo(){
        $count = (new static())->whereBetween('created_at',[date("Y-m-d 00:00:00"),date("Y-m-d 23:59:59")])->count();
        return 'TZK'.date("Ymd").str_pad($count+1,4,"0",STR_PAD_LEFT);
    }
}
