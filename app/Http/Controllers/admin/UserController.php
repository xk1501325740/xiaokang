<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = DB::select('select * from ceshi  ');
        //限制
        $count = 2;
        //
        $page = $request->get('pa');
        $pages = isset( $page )?$page:'1';
        $pagess = ($pages - 1)*$count;
        $users = DB::select("select * from ceshi limit $pagess,$count ");
        //echo count($users);
        return view('admin.user',['data' => $users ,'zhi' =>$pages,'count' =>count( $users ) ]);

    }

    public function ceshi(Request $request){

        if( $request->isMethod('get') ){
            echo 1;
        }else{
            echo 2;
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        if($request->isMethod('post')){
            $data = $request->post();

            DB::table('ceshi')->insert([
                'name' =>$data['name'] ,

            ]);
        }else{
            return view('admin.add');
        }

    }

     public function up(Request $request){

        if($request->isMethod('post')){
           $name =  $request->post('name');
            DB::table('ceshi')
                ->where('id', $request->get('id'))
                ->update(['name' => $name]);

        }else{
            $users = DB::select('select * from ceshi where id =  '.$request->get('id'));
           return view('admin.set',['data' => $users ]);
        }

     }

     public function del(Request $request){

         if( !is_array( $request->get('id') )){
             //单个删除
             $res =  DB::table('ceshi')->where('id', '=' ,$request->get('id') )->delete();

         }else{
             //批量删除
             $id = implode(',', $request->get('id') );
             $res = DB::delete("delete  from ceshi where id in ( $id ) ");

         }


        if( $res ){
            echo '成功';
        }else{
            echo '失败';
        }
     }

     //文件上传
    public function file(Request $request){
        if( $request->isMethod('post')){
            $photo = $request->file('phone');
            $extension = $photo->extension();
            //$store_result = $photo->store('photo');
            $store_result = $photo->storeAs('photo', 'test.jpg');
        }else{
            return view('admin.file');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
