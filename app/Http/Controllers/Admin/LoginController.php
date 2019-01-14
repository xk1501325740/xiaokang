<?php

namespace App\Http\Controllers\Admin;

use App\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{

   //登陆页面
    public function login(){

        return view('admin.login');
    }


    //极验
    public function jydl(){

        $GtSdk = new \GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        session_start();

        $data = array(
            "user_id" => "test", # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
        );

        $status = $GtSdk->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $data['user_id'];
        echo $GtSdk->get_response_str();

    }

    //登陆验证
    public function login_yz(Request $request){
        $login = new admin();

        session(['name' => $request->get('name')]);
        Redis::set('name',$request->get('name')); #输出testRedis
<<<<<<< HEAD
        $res = $login->login( $request->get('name'), $request->get('pwd'));
=======
       $res = $login->login( $request->get('name'), $request->get('pwd'));

>>>>>>> bf4c1d8f5d15b165a01589fcc3c1c86d44e65364
        if( $res ){
          echo '成功';
        }else{
          echo '失败';
        }

    }









}
