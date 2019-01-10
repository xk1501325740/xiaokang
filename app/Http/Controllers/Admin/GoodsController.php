<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        }


        var_dump( $request->file('name'));die;


    }


    //删除
    public function goods_del(){}

    //编辑
    public function goods_set(){}

}
