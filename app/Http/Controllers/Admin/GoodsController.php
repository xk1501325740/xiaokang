<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class GoodsController extends Controller
{
    //展示数据
    public function goods_List(){

        return view('admin.goods-list');

    }


    public function goods_onedata(Request $request){
       $name =  $request->get('goods_name');
      $data =  DB::select("select * from goods_master where   goods_name like '%$name%' ");
      //return $data;
        $a =  json_encode([
                'code'=> 0,
                'msg'=>"",
                'data'=>
                   $data

            ]
        );
        return $a;
    }

    //数据
    public function goods_data(){

        $users = DB::table('goods_master')->get();
        $a =  json_encode([
                'code'=> 0,
                'msg'=>"",
                'data'=>
                    $users

                ]
        );
        return $a;

    }

    //添加
    public function goods_add(){


        return view('admin.goods_add');
    }

    //添加
    public function goods_adds(Request $request){

        if( $request->isMethod('post')){
            var_dump($request->post());
            $file =  $_FILES;
            $file_name = $file['tupian']['tmp_name'] ;
            var_dump(  $file_name );
            //$this->phone_img();
        }
        die;


    }

    public function phone_img($file_name){
        // 引入鉴权类

        // 需要填写你的 Access Key 和 Secret Key
        $accessKey =env('ak');
        $secretKey = env('sk');
        $bucket = env('bt');
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        // 要上传文件的本地路径

        $filePath = $file_name;
        // 上传到七牛后保存的文件名
        $key = 'kang.png';
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        echo "\n====> putFile result: \n";
        if ($err !== null) {
            var_dump(1);
        } else {
            var_dump(2);
        }
    }


    //删除
    public function goods_del(){}

    //编辑
    public function goods_set(){}

}
