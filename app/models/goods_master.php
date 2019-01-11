<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class goods_master extends Model
{
    //
      public $table='goods_master';


      //软删除
    public function del_one($id,$array){
        DB::table('goods_master')
            ->where('goods_id', $id)
            ->update($array);
    }

    //修改
    public function up_one( $id , $filed , $value ){
      return  DB::table('goods_master')
            ->where('goods_id', $id)
            ->update([
                $filed => $value
            ]);
    }

}
