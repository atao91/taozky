<?php

namespace App\Http\Controllers\Auth;

use App\Models\TzkBusines;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'  => ['required','regex:/^1[3456789][0-9]{9}$/','unique:tzk_users',Rule::unique('tzk_user_black','username')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'code' => [
                'required', 'digits:4',
                Rule::exists('tzk_user_code')->where(function ($query) {
                    $limit_secords = date("Y-m-d H:i:s",strtotime('-5 minutes'));
                    $query->where('mobile', \request()->username)->where('created_at','>=',$limit_secords);
                }),
            ],

            'address'   => ['required','max:100'],
            'wechart'   => ['required','max:100'],
            'name'      => ['required','string','max:30',Rule::unique('tzk_user_black','name')],
            'card_id' => ['required', 'min:18', 'max:18'],
            'bank_name' => ['required', 'string', 'min:4'],
            'bank_no' => ['required',  'max:20'],
            'bank_addr' => ['required', 'max:100'],
            'bank_branch' => ['required', 'max:50'],
            'wechats' => ['required', 'max:50'],
            'qq' => ['max:15'],
            'id_card_img' => ['required'],
            'bank_img' => ['required'],
        ]);
    }

    protected function attributes()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'code'      => '验证码',
            'name' => '真实姓名',
            'card_id' => '身份证号',
            'bank_name' => '开户行',
            'bank_no' => '银行卡号',
            'bank_branch' => '开户支行',
            'wechats' => '微信',
            'qq' => 'QQ',
            'id_card_img' => '身份证上传',
            'bank_img' => '银行卡截图',
        ];
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referrer = User::where('username',$data['jieshao'])->select('id')->first();
//        DB::beginTransaction();
//        try {
//            $data =  [
//                "username" => $data['username'],
//                "password" => Hash::make($data['password']),
//                "name" => $data['name'],
//                "wechats" => $data['wechats'],
//                "card_id" => $data['card_id'],
//                "bank_name" => $data['bank_name'],
//                "bank_branch" => $data['bank_branch'],
//                "bank_no" => $data['bank_no'],
//                "bank_addr" => $data['bank_addr'],
//                "referrer" => isset($referrer)?$referrer->id:null,
//                'status' => 1,
//                "id_card_img" => $data['id_card_img'],
//                "bank_img" => $data['bank_img'],
//                "created_at" => date("Y-m-d H:i:s"),
//                "updated_at" => date("Y-m-d H:i:s"),
//            ];
//            $id = DB::table('tzk_users')->insertGetId($data);
//            if (isset($referrer)){
//                DB::table('tzk_users')->where('id',$referrer->id)->increment('people_num');
//            }
//            DB::commit();
//            return User::where('id',$id)->first();
//        }catch (\Exception $e){
//            DB::rollBack();
//            return false;
//        }
        $data =  [
            "username" => $data['username'],
            "password" => Hash::make($data['password']),
            "name" => $data['name'],
            "wechats" => $data['wechats'],
            "card_id" => $data['card_id'],
            "bank_name" => $data['bank_name'],
            "bank_branch" => $data['bank_branch'],
            "bank_no" => $data['bank_no'],
            "bank_addr" => $data['bank_addr'],
            "referrer" => isset($referrer)?$referrer->id:null,
            'status' => 1,
            "id_card_img" => $data['id_card_img'],
            "bank_img" => $data['bank_img'],
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ];


//        $data =  [
//            "username" => $data['username'],
//            "password" => Hash::make($data['password']),
//            "name" => $data['name'],
//            "wechats" => $data['wechats'],
//            "card_id" => $data['card_id'],
//            "bank_name" => $data['bank_name'],
//            "bank_branch" => $data['bank_branch'],
//            "bank_no" => $data['bank_no'],
//            "bank_addr" => $data['bank_addr'],
//            "referrer" => isset($referrer)?$referrer->id:null,
//            'status' => 1,
//            "id_card_img" => $data['id_card_img'],
//            "bank_img" => $data['bank_img'],
//            "created_at" => date("Y-m-d H:i:s"),
//            "updated_at" => date("Y-m-d H:i:s"),
//        ];
        return User::create($data);
    }
}
