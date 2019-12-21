<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TzUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return [
//            'user_level'	=> 'required',
//            'card_id'	=> 'required',
//            'bank_open'	=> 'required',
//            'bank_no'	=> 'required',
//            'bank_addr'	=> 'required',
//            'bank_branch'	=> 'required',
//            'qq'	=> 'required',
//        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        return [
//            'user_level'	=> '会员等级',
//            'card_id'	=> '身份证号',
//            'bank_open'	=> '开户银行',
//            'bank_no'	=> '银行卡号',
//            'bank_addr'	=> '开户地区',
//            'bank_branch'	=> '开户支行',
//            'qq'	    => 'QQ号码',
//        ];
    }
}
