<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/9
 * Time: 17:56
 */

namespace App\Http\Model;


use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pression extends Model
{
    public $table='admin';
    public $timestamps=false;

    //展示
    public function show(){
        $res=DB::select("select * from admin inner join admin_role on admin_role.admin_id=admin.id inner join role on admin_role.role_id=role.id ");
        return $res;
    }
    //权限分配表单
    public function allot(){
//           $repre=DB::select("select * from pression inner join role_pression on pression.id=role_pression.pression_id inner join role on role_pression.role_id=role.id");
//           return $repre;
        $pression=DB::select("select * from  pression ");
        $role=DB::select("select * from role");
        $res=['pression'=>$pression,'role'=>$role];
        return $res;
    }
    //根据下拉框判断多选框
    public function preval($roleval){
        return DB::select("select pression_id from role_pression where role_id=$roleval ");
    }
    //权限添加
    public function allotadd($role_id,$preid){
        $role_pre=DB::select("select pression_id from role_pression where role_id=$role_id ");
        if(!$role_pre){
            $res=DB::insert("insert into role_pression values($role_id,'$preid') ");
        }else{
            $res=DB::update("update  role_pression  set pression_id='$preid' where role_id=$role_id");
        }
        return $res;
    }
    //用户添加
    public function adminadd($uname,$pwd,$c_time,$status,$role){
        DB::beginTransaction();
        try{
            $admin= DB::insert("insert into admin values (null,'$uname','$pwd',$c_time,$c_time,$status)");
            $admin_id=DB::getPdo()->lastInsertId();
            $role=DB::insert("insert into admin_role values ($admin_id,$role)");
            DB::commit();//提交
            return $role;
        }catch (Exception $e){
            DB::rollback();
            throw $e;
        }
    }
    //用户表单编辑
        public function adminupfor($admin_id,$role_id){
            $res=DB::select("select * from admin inner join admin_role on admin_role.role_id=$role_id inner join role on role.id = $role_id where admin.id=$admin_id");
            return $res;
        }
        //用户编辑
    public function admin_up($unameid,$uptime,$roleid,$status){

        DB::beginTransaction();
        try{
            $admin=DB::table('admin')->where('id',$unameid)->update(['status'=>$status,'update_time'=>$uptime]);
            $admin_role=DB::table('admin_role')->where('admin_id',$unameid)->update(['role_id'=>$roleid]);
            DB::commit();
            return $admin;
        }catch (Exception $e){
            DB::rollback();
            throw  $e;
        }
    }
    //角色添加
    public function role_add($role,$pression_id)
    {
        DB::beginTransaction();
        try{
            $role=DB::insert("insert into role values(null,'$role')");
            $role_id=DB::getPdo()->lastInsertId();
            $prerole=DB::insert("insert into role_pression values($role_id,'$pression_id')");
            DB::commit();
            return $prerole;
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }
    }


}