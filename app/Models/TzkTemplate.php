<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TzkTemplate extends Model
{
    protected $table = 'tzk_template';

    public function shop()
    {
        return $this->belongsTo(TzkShop::class,'shop_id','id');
    }


    public static function getSelectOptions($where){
        $options = (new static())->where($where)->select('id','title')->get();
        $selectOption = [];
        foreach ($options as $option){
            $selectOption[$option->id] = $option->title;
        }
        return $selectOption;
    }

}

