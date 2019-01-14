<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 19:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //评论列表
    public function comment_list(){
        $model=new Comment();
        $res=$model->c_list();
//var_dump($res);die;
        return view('admin.comment_list',['list'=>$res]);
    }
    //评论查看表单
    public function comment_editform(Request $request){
        $commod_id=$request->get('commod');
        $model=new Comment();
        $res=$model->c_edit($commod_id);
       //var_dump($res);die;
       return view('admin.comment-editform',['list'=>$res]);
    }
    //追加评论
    public function comment_edit(Request $request){
            $data=$request->post();
            $cimgs=$request->file('cimgs');
            if($cimgs->isValid()){
                $tmpname=$cimgs->getPathname();//临时文件名
                $filetype=$cimgs->getClientOriginalExtension();//文件名
                $filename=uniqid().'.'.$filetype;
                $dir='./imgs/';
                if(!file_exists($dir)){
                    mkdir($dir);
                }
                $comdir='./imgs/comment/';
                if(!file_exists($comdir)){
                    mkdir($comdir);
                }
                $path=$comdir.$filename;
                $res=move_uploaded_file($tmpname,$path);//文件上传
            }
            $uname=$data['uname'];
            $goods=$data['goods'];
            $content=$data['content'];
            $comdir=substr($comdir,'1');
            $img=$_SERVER['HTTP_HOST'].$comdir.$filename;
            $c_time=strtotime('now');
            $model=new Comment();
            $res=$model->c_addedit($uname,$goods,$content,$img,$c_time);
            if($res){
                return ['code'=>0,'msg'=>'ok'];
            }

    }
}