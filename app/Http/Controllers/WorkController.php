<?php

namespace App\Http\Controllers;
//use App\Http\Requests\TzUsersRequest;
use App\Models\TzkLiuc;
use App\Models\TzkWork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Description;

class WorkController extends Controller
{
    public function index(Request $request){
        $model = TzkLiuc::where('user_id',Auth::user()->id)
            ->with(['works'=>function($q){
                $q->with(['orders'=>function($qa){
                    $qa->with(['templates']);
                }]);
            },'ali']);
        if ($request->status){
            $model->whereIn('status',[$request->status]);
        }
        $data = $model->get();

        return view('pages.work_index',['data'=>$data]);
    }

    public function goods_detail(Request $request){

        $data =TzkLiuc::where('id',$request->d)->where('user_id',Auth::user()->id)
            ->with(['works'=>function($q){
                $q->with(['orders'=>function($qa){
                    $qa->with(['templates']);
                },'shangh'=>function($q){
                    $q->select('id','username');
                }]);
            },'ali'])->first();
        return view('pages.goods_detail',['data'=>$data]);
    }

    public function work_store(Request $request){
        DB::beginTransaction();
        $status = false;
        $message = '信息有误';
        $url = '/work';
        $time = date("Y-m-d H:i:s");
        try{
            $TzData = TzkLiuc::where('id',$request->d)->first();
            // 提交需要全部齐全
            $data = [
                'check_url' =>  $request->check_url,
                'pv_img_one'  =>  $request->pv_img_one,
                'pv_img_two'  =>  $request->pv_img_two,
                'pv_img_three'  =>  $request->pv_img_three,
                'goods_img' =>  $request->goods_img,
                'shop_img'  =>  $request->shop_img,
                'pay_img' =>  $request->pay_img,
                'pay_price' =>  $request->pay_price,
                'talk_img'  =>  $request->talk_img,
                'carriage_img'  =>  $request->carriage_img,
                'status'  =>  $request->status,
                'updated_at'	=> $time,
            ];
            if($request->status ==1){
                foreach ($data as $k => $v){
                    if(empty($v)){
                        $response = [
                            'status'  => false,
                            'message' => '请上完成所有任务后, 再提交',
                            'url' => '/goods_detail?d='.$request->d,
                        ];
                        return response()->json($response);
                    }
                }
            }
            $res = DB::table('tzk_liucheng')->where('id',$request->d)->update($data);

            //保存
            if($request->status == 2){
                $message = '保存成功';
                $url = '/goods_detail?d='.$request->d;
            }
            //提交 更新任务状态 取消更新任务状态

            if(in_array($request->status,[1,5])){
                $work_data = [];
                if($request->status == 1){
                    $message = '已提交,等待审核';
                    $work_data['status'] = 2;
                }elseif($request->status == 4){
                    $work_data['status'] = '0';
                    $message = '已取消';
                }
                 DB::table('tzk_work')->where('id',$TzData->work_id)->update($work_data);
            }
            DB::commit();
            $status = true;
        } catch (\Exception $e) {
            DB::rollBack();
            $url = '/goods_detail?d='.$request->d;
        }
        $response = [
            'status'  => $status,
            'message' => $message,
            'url' => $url,
        ];
        return response()->json($response);
    }

    public function check_goods(Request $request){
        $data = TzkWork::where('id',$request->d)->with(['orders'=>function($q){
            $q->with(['templates']);
        }])->first();

        $status = false;
        $message = '错误';
        if(strstr($data->orders->templates->goods_url,$request->goods_name)){
            $status = true;
            $message = '正确';
            TzkLiuc::where('id',$request->d)->update(['check_url'=>$request->goods_name]);
        }

        $response = [
            'status'  => $status,
            'message' => $message,
        ];
        return response()->json($response);
    }

}
