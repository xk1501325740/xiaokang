<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Pression;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin;
use App\models\Admin_role;
use App\models\Role_pression;
use Illuminate\Support\Facades\DB;

class PressionController extends CeshiController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    //展示数据
    public function pression_List(){

        $res = $this->check();
        if($res=='false'){
            return view('admin.pre_error');
        }
        $model=new Pression();
        $res=$model->show();
       return view('admin.press_index',['list'=>$res]);
    }
    //权限分配表单
    public function pression_allot(){
        $res = $this->check();
        if($res=='false'){
            return view('admin.pre_error');
        }
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

    //用户编辑
    public function admin_up(Request $request){

        $unameid=$request->post('unameid');
        $uptime=strtotime('now');
        $roleid=$request->post('role');
        $stauts=$request->post('status');
        $model=new Pression();
        $res=$model->admin_up($unameid,$uptime,$roleid,$stauts);
        if($res){
            echo "<script>alert('操作成功');window.location='pression-list';</script>";
        }
    }
    //角色添加表单
    public function role_prefor()
    {
        $model=new Pression();
        $res=$model->allot();
        // var_dump($res);die;
        return view('admin.role_prefor',['pression'=>$res['pression']]);
    }
    //角色添加
    public function role_preadd(Request $request){
        //var_dump($request->post());die;
        $role=$request->post('role');
        $pression_id=$request->post('pression_id');
        $pression_id=implode(',',$pression_id);
        $model=new Pression();
        $res=$model->role_add($role,$pression_id);
        if($res){
            echo "<script>alert('操作成功');window.location='pression-list';</script>";
        }
    }




}
