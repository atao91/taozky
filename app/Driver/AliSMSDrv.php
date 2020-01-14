<?php
namespace App\Driver;
use Mrgoon\AliSms\AliSms;

class AliSMSDrv
{

    /**
     * 发送验证码
     * @param $account
     * @param $msg
     * @return bool|mixed
     */
    public function sendCode($account,$msg)
    {
        $response = $this->sendSMS($account,array('msgno'=>$msg));
        return $response;
    }

    /**
     * 通用
     * @param $mobile   //手机号
     * @param $data     //数据格式
     * $data = array('key1'=>'value1','key2'=>'value2', …… )
     * @param string $templateCode  短信模板Code
     * @return bool
     */
    public static function sendSMS($mobile, $data, $templateCode='你的模板id') {
        $aliSms = new AliSms();
        $response = $aliSms->sendSms($mobile,$templateCode, $data);
        if($response->Message == 'OK'){
            return true;
        }else {
            return false;
        }

    }

}
