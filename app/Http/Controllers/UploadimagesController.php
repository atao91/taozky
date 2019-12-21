<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UploadimagesController extends Controller
{
    public function uploader(Request $request){
        $img = isset($_POST['img'])? $_POST['img'] : '';
        // 获取图片
        list($type, $data) = explode(',', $img);
        // 判断类型
        if(strstr($type,'image/jpeg')!=''){
            $ext = '.jpg';
        }elseif(strstr($type,'image/gif')!=''){
            $ext = '.gif';
        }elseif(strstr($type,'image/png')!=''){
            $ext = '.png';
        }
        // 生成的文件名
        $photo = "../upload/".time().$ext;
        // 生成文件
        file_put_contents($photo, base64_decode($data), true);
        // 返回
        header('content-type:application/json;charset=utf-8');
        $res = array('img'=>$photo);
        echo json_encode($res);
    }
}
