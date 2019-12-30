<?php

namespace App\Http\Controllers;

use App\Models\TzkLiuc;
use App\Models\TzkUserAli;
use App\Models\TzkWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function root()
    {
        $data = TzkWork::with(['orders'=>function($q){
            $q->select('id','templates_id','actual_price','take_num')->with(['templates'=>function($qa){
                $qa->select('id','title','goods_name','goods_img');
            }]);
        }])->where('status','0')->where('work_start','<=',date("Y-m-d H:i:s"))
            ->paginate(8);
        return view('pages.root',['data'=>$data]);
    }

    public function goods(Request $request){

        $data = TzkWork::with(['orders'=>function($q){
            $q->select('id','templates_id','actual_price','take_num','sort_type','order_in','reward_price')->with(['templates'=>function($qa){
                $qa->select('id','title','goods_name','goods_img');
            }]);
        }])->where('status','0')->where('id',$request->d)->where('work_start','<=',date("Y-m-d H:i:s"))
            ->select('id','work_no','order_id','work_start','work_end')
            ->first();

        if (empty($data)){
            return redirect('/');
        }

        return view('pages.goods',['data'=>$data]);
    }

    public function goods_store(Request $request){
        // 0- 接单
        $time    = date("Y-m-d H:i:s");
        DB::beginTransaction();
        $ali = TzkUserAli::where(['user_id'=>Auth::user()->id,'status'=>1])->first();
        if(empty($ali)){
            $response = [
                'status'  => false,
                'message' => '账号未认证,不可接单!',
            ];
            return response()->json($response);
        }
        try {
            // 0- 查询最近一次任务
            $liuc_arr = TzkLiuc::where('user_id',Auth::user()->id)->with(['works'=>function($q){
                $q->with(['orders']);
            }])->orderBy('created_at','desc')->first();
            // 0.1 - 查询任务的店铺
            $work_arr = TzkWork::where('id',$request->d)->with(['orders'])->first();

            if ($liuc_arr){
                //如果店铺相同 那么最后一条流程时间 要小于当前十五天 否则 要小于10天
                $date1 = strtotime(date("Y-m-d H:i:s"));
                $date2 = strtotime($liuc_arr->created_at);
                $diff= $date1 - $date2 ;
                $days =abs(intval($diff / 86400));

                if($liuc_arr->works->orders->templates_id == $work_arr->orders->templates_id){
                    //计算两个日期之间的时间差
                    if($days < 1){
                        $response = [
                            'status'  => false,
                            'message' => '未满10-15天不可接单',
                        ];
                        return response()->json($response);
                    }
                }else{
                    if($days < 2){
                        $response = [
                            'status'  => false,
                            'message' => '未满10-15天不可接单',
                        ];
                        return response()->json($response);
                    }
                }
            }
            $data = [
                'work_id'   => $request->d,
                'user_id'   => Auth::user()->id,
                'ali_id'   => $ali->id,
                'status'    => 2,
                'created_at' => $time,                  //创建时间
                'updated_at' => $time,                  //创建时间
            ];
            $res = DB::table('tzk_liucheng')->insertGetId($data);
            // 1- 任务状态修改
            DB::table('tzk_work')->where('id',$request->d)->update(['status'=>1,'updated_at'=>$time]);
            DB::commit();
            $response = [
                'status'  => true,
                'message' => '接单,请尽快完成',
            ];
        } catch(\Illuminate\Database\QueryException $ex) {
            $response = [
                'status'  => false,
                'message' => '系统错误',
            ];
            DB::rollBack();
            Log::warning($ex->getMessage());
        }
        return response()->json($response);

    }
}


