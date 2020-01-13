<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function uploader_img(Request $request){
        $path = '/uploads';
        $base64_image_content =  $request->imgbase64;
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $FileName = date('Y-m-d') .'/'. uniqid() . '.' . $type; //定义文件名
            Storage::disk('admin')->put($FileName, base64_decode(str_replace($result[1], '', $base64_image_content)));//存储文件
            return ['src'=>$path . '/' . $FileName];
        }else{
            return $base64_image_content;
        }
    }
}
