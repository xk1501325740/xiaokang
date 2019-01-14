<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
       //登录页面
    public  function login()
    {

        return view('home.login');
    }
    //登录信息
    public  function login_sub()
    {

    }
    //
    //登录页面
    public  function regist()
    {
        //echo 11 ; die ;
        return view('home.regist');
    }
    //登录信息
    public  function regist_sub()
    {
        return view('home.regist_sub');
    }
    //

}
