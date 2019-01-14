<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 20:18
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public $table="comment";
    public $timestamps=false;

    //评论展示
    public function c_list(){
      return  DB::select("select * from users inner join comment on comment.user_id=users.id inner join goods_master on goods_master.goods_id=comment.commod_id  ");
    }
    //根据商品进行评论编辑   页面
    public function c_edit($commod_id){
        return DB::select("select * from comment inner join users on users.id=comment.user_id inner join goods_master on comment.commod_id=goods_master.goods_id  where commod_id=$commod_id ");
    }
    //追加评论
    public function c_addedit($uname,$goods,$content,$img,$c_time){
        $this->user_id=$uname;
        $this->commod_id=$goods;
        $this->content=$content;
        $this->c_img=$img;
        $this->c_time=$c_time;
        $res=$this->save();
        return $res;
    }

}