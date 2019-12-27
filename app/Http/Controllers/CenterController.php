<?php

namespace App\Http\Controllers;
//use App\Http\Requests\TzUsersRequest;
use App\Models\TzkUserAli;
use App\Models\TzkUserBill;
use App\Models\TzkUserDraw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CenterController extends Controller
{
    public function index(){
        $userali = TzkUserAli::where(['user_id'=>Auth::user()->id,'status'=>'0'])->first();
        return view('pages.center',['userali'=>$userali]);
    }

    public function setting(){
        return view('pages.setting');
    }

    public function centerStore(Request $request){
        try{
            $id_card_z = $this->base64_image_content($request->id_card_z);
            $id_card_f = $this->base64_image_content($request->id_card_f);
            $UserModel = User::find(Auth::user()->id);
            $UserModel->user_level	=	$request->user_level;
            $UserModel->card_id	=	$request->card_id;
            $UserModel->bank_open	=	$request->bank_open;
            $UserModel->bank_no	=	$request->bank_no;
            $UserModel->bank_addr	=	$request->bank_addr;
            $UserModel->bank_branch	=	$request->bank_branch;
            $UserModel->id_card_z	=	$id_card_z;
            $UserModel->id_card_f	=	$id_card_f;
            $UserModel->save();
            return response()->json(['status'=>100,'message'=>'保存成功']);
        } catch(\Illuminate\Database\QueryException $ex) {
            Log::error($ex->getMessage());
            return response()->json(['status'=>400,'message'=>'保存错误']);
        }
//
//        return redirect('setting');
    }

    /*
     * 推广
     */
    public function share(){
        return view('pages.share');
    }

    /*
     * 绑定
     */
    public function bindTb(){
        return view('pages.band_tb');
    }
    /*
     * 绑定提交
     */
    public function bindStore(Request $request){

        try{
            $data   = [
              'user_id'  => Auth::user()->id,
              'ali_name' => $request->ali_name,
              'ali_level'  => $request->ali_level,
              'sex'  => $request->sex,
              'consignee'  => $request->consignee,
              'phone'  => $request->phone,
              'sh_addr' => $request->bank_addr,
              'address'  => $request->address,
              'status' => 2,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ];
//                    $level_img =  $request->file('level_img');
//            $extension = $level_img -> guessExtension();
//            $rand = rand('0000','9999');
//            $newName = time().'-'.$rand.".".$extension;
//            $nowDay = date('Y-m-d');
//            $level_img -> move(base_path().'/storage/app/public/upload/images/'.$nowDay.'/',$newName);
//            $data['level_img'] = 'images/'.$nowDay.'/'.$newName;

            if (!empty($request->file('level_img'))){
                $tmp = $request->file('level_img');
                $path = '/uploads';
                if ($tmp->isValid()) { //判断文件上传是否有效
                    $FileType = $tmp->getClientOriginalExtension(); //获取文件后缀
                    $FilePath = $tmp->getRealPath(); //获取文件临时存放位置
                    $FileName = date('Y-m-d') .'/'. uniqid() . '.' . $FileType; //定义文件名
                    Storage::disk('admin')->put($FileName, file_get_contents($FilePath)); //存储文件
                    $data['level_img']  = $path . '/' . $FileName;
                }
            }else{
                $data['level_img'] = $request->level_img;
            }

            if (!empty($request->file('ali_auth'))){
                $tmp = $request->file('ali_auth');
                $path = '/uploads';
                if ($tmp->isValid()) { //判断文件上传是否有效
                    $FileType = $tmp->getClientOriginalExtension(); //获取文件后缀
                    $FilePath = $tmp->getRealPath(); //获取文件临时存放位置
                    $FileName = date('Y-m-d') .'/'. uniqid() . '.' . $FileType; //定义文件名
                    Storage::disk('admin')->put($FileName, file_get_contents($FilePath)); //存储文件
                    $data['ali_auth']  = $path . '/' . $FileName;
                }
            }else{
                $data['ali_auth'] = $request->level_img;
            }
            $res = DB::table('tzk_users_ali')->insert($data);
        } catch(\Exception $ex) {
            Log::warning($ex->getMessage());
        }
        return redirect('bindList');
    }
    /*
     *  绑定列表
     */
    public function bindList(){

        $data = TzkUserAli::where('user_id',Auth::user()->id)->get();
        return view('pages.bindList',['data'=>$data]);
    }


    //账单
    public function bill(){
        $data = TzkUserBill::where('user_id',Auth::user()->id)->paginate(10);
        return view('pages.billList',['data'=>$data]);
    }


    //体现
    public function refund(){
        $data = User::where('id',Auth::user()->id)->select('amount')->first();
        return view('pages.refund',['data'=>$data]);
    }

    public function refund_apply(Request $request){
        $time = date("Y-m-d H:i:s");
        $status = false;
        $message = '提现失败';
        try{
            $result = User::where('id',Auth::user()->id)->select('amount')->first();
            if($result->amount < $request->amount){
                $response = [
                    'status'  => false,
                    'message' => '余额不足',
                ];
                return response()->json($response);
            }
            //添加提现记录
            $data = [
                'user_id'       =>  Auth::user()->id,
                'draw_price'    =>  $request->amount,
                'status'        =>  1,
                'created_at'    =>  $time,
            ];
            $res = DB::table('tzk_user_draw')->insert($data);
//            //扣除账户余额
//            $bill = [
//                'user_id'   =>  Auth::user()->id,
//                'bill_price' => -$request->amount,
//                'remark'    =>  '提现申请,金额:'.$request->amount.'元',
//                'type'      =>  2,
//                'created_at' => $time,
//            ];
//            DB::table('tz_user_bill')->insert($bill);
            $res = DB::table('tzk_users')->where('id',Auth::user()->id)->decrement('amount', $request->amount);

            $status = true;
            $message = '提现申请成功';
            $response = [
                'status'  => $status,
                'message' => $message,
            ];
            return response()->json($response);
        } catch(\Illuminate\Database\QueryException $ex) {
            Log::warning($ex->getMessage());
            $response = [
                'status'  => $status,
                'message' => $message,
            ];
            return response()->json($response);
        }

    }

    public function refund_list(){
        $data = TzkUserDraw::where('user_id',Auth::user()->id)->paginate(10);
        return view('pages.refund_list',['data'=>$data]);
    }


    /**
     * [将Base64图片转换为本地图片并保存]
     * @param  [Base64] $base64_image_content [要保存的Base64]
     * @param  [目录] $path [要保存的路径]
     */
    public function base64_image_content($base64_image_content){
        $path = '/uploads';
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $FileName = date('Y-m-d') .'/'. uniqid() . '.' . $type; //定义文件名
            Storage::disk('admin')->put($FileName, base64_decode(str_replace($result[1], '', $base64_image_content)));//存储文件
            return $path . '/' . $FileName;
        }else{
            return $base64_image_content;
        }
    }
}

