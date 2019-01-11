<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Pression;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressionController extends Controller
{
    //展示数据
    public function pression_List(){
        $model=new Pression();
        $res=$model->show();
       return view('admin.press_index',['list'=>$res]);
    }
    //权限分配表单
    public function pression_allot(){
        $model=new Pression();
        $res=$model->allot();
       // var_dump($res);die;
        return view('admin.press_allot',['pression'=>$res['pression'],'role'=>$res['role']]);
    }
    //根据下拉框判断多选框
    public function pression_che(Request $request){
        $roleval=$request->post('roleval');
        $model=new Pression();
        $preval=$model->preval($roleval);
        return $preval;
    }
    //权限分配
    public function pallot(Request $request){
        $role_id=$request->post('roleid');
        $pression_id=$request->post('pression_id');
        $preid=implode(',',$pression_id);
        $model=new Pression();
        $res=$model->allotadd($role_id,$preid);
        if($res){
            echo "<script>alert('操作成功');window.location='pression-list';</script>";
           // return redirect(url(''));
        }
    }
    //新增用户表单
    public function adminadd_form(){
        $model=new Pression();
        $res=$model->allot();
        return view('admin.adminaddform',['list'=>$res['role']]);
    }
    //新增用户
    public function adminadd(Request $request){
        $uname=$request->post('uname');
        $pwd=md5($request->post('pwd')) ;
        $c_time=strtotime('now');
        $status=$request->post('status');
        $role=$request->post('role');
        $model=new Pression();
        $res=$model->adminadd($uname,$pwd,$c_time,$status,$role);
        if($res){
            echo "<script>alert('操作成功');window.location='pression-list';</script>";
            // return redirect(url(''));
        }
    }
    //用户编辑表单
    public function admin_upform(Request $request){

        $admin_id=$request->get('admin');
        $role_id=$request->get('role');
        $model=new Pression();
        $res=$model->adminupfor($admin_id,$role_id);
        $result=$model->allot();

        return view('admin.admin_upform',['list'=>$res[0],'role'=>$result['role']]);
    }

}
