<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => ['required','regex:/^1[3|4|5|6|7|8][0-9]{9}$/', 'unique:tzk_users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['yq'])){
            $info = User::where('user_no',$data['yq'])->select('id')->first();
            $insert = [
                'name' => $data['name'],
                'status' => 1,
                'referrer' => $info->id,
                'password' => Hash::make($data['password']),
            ];
        }else{
            $map = [
                'name' => $data['rec_phone'],
                'username' => $data['rec_name'],
            ];
            $info = User::where($map)->select('id')->first();
            $insert = [
                'name' => $data['name'],
                'status' => 1,
                'rec_phone' => $data['rec_phone'],
                'rec_name' => $data['rec_name'],
                'rec_wechart' => $data['rec_wechart'],
                'password' => Hash::make($data['password']),
            ];
            if ($info){
                $insert['referrer'] =$info->id;
            }

        }
        return User::create($insert);
    }
}
