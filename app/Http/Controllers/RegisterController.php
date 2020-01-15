<?php
namespace App\Http\Controllers;
use App\Models\TzkUserCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Driver\AliSMSDrv;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public $validator;

    public function register()
    {
        return view('common.register');
    }

    public function reg()
    {
        if(isset(\request()->t)){
            $info = User::where('username',\request()->t)->select('username','people_num')->first();
            if($info->people_num > 3){
                \request()->t = null;
            }
        }
        return view('common.reg');
    }
    /**
     * 生成随机的短信验证码，修改验证码长度在AppServiceProvider中验证码拓展校验
     */
    private function genValidateCode()
    {
        return mt_rand(0000,9999);
    }
    public function sendUserCode(Request $request){
        $ip = $request->getClientIp();
        $count_num = TzkUserCode::where('ip',$ip)->where('created_at','>=',date("Y-m-d 00:00:00"))->count();
        if($count_num>=5){
            return response()->json(['status'=>301,'message'=>'发送已达上限']);
        }
        $data = User::where('username',trim($request->username))->select('id','username')->first();
        if($data){
            return response()->json(['status'=>201,'message'=>'手机号码已被注册']);
        }
        $past_time = date("Y-m-d H:i:s",strtotime("-5 minute"));
        //查询短信发送记录
        $codeData = TzkUserCode::where(['mobile' => trim($request->username)])->where('created_at','>=',$past_time)->first();
        if($codeData){
            return response()->json(['status'=>202,'message'=>'验证码5分钟内有效,请勿重复发送']);
        }
        //发送验证码
        $sendCode = [
            'code' => $this->genValidateCode()
        ];

        $result = AliSMSDrv::sendSMS(trim($request->username),$sendCode,env('ALIYUN_SMS_TEP_CODE'));
        if($result){
            try{
                $data = [
                    'mobile'     =>trim($request->username),
                    'code'       =>$sendCode['code'],
                    'ip'         =>$request->getClientIp(),
                    'status'     =>1,
                    'created_at' => date("Y-m-d H:i:s")
                ];
                DB::table('tzk_user_code')->insert($data);
                return response()->json(['status'=>100,'message'=>'发送成功']);
            }catch (\Exception $e){
                Log::error('发送验证码:'.$e->getMessage());
                dd($e);
                return response()->json(['status'=>204,'message'=>'发送失败,请重试']);
            }
        }else{
            return response()->json(['status'=>204,'message'=>'发送失败,请重试']);
        }
    }

}
