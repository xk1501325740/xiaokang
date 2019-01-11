<?php
namespace APP\Http\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model {
    public $table = 'category';
    public  $timestamps = false ;
//分类展示
    public function show ()
    {
        $res = DB::table('category')->get();
        // return $res;
        return $this->tree($res,$f_id=0,$lev=0);
    }

    public function tree($res,$p_id,$level)
    {
        static $tree = [] ;
        foreach ($res as $k => $v){
            if($v->parent_id == $p_id){
                $tree[] = [
                    'category_id' =>$v->category_id,
                    'category_name' =>$v->category_name,
                    'category_code' =>$v->category_code,
                    'category_level' =>$level,
                    'parent_id' =>$v->parent_id,
                    'modified_time' =>$v->modified_time
                ] ;
                $this->tree($res,$v->category_id,$level+1);
            }
        }
        return $tree;
    }
    //添加
    public function  ins($data)
    {
        return $res = DB::table('category')->insert($data);
    }
    //删除
    public function  del($id)
    {
        return $res = DB::table('category')->where('category_id',$id)->delete();
    }
    //根据id查找
    public function sel($id)
    {
        return  $res = DB::table('category')->where('category_id',$id)->get();
    }
    //根据id查找
    public function upd($data)
    {
        return  $res = DB::table('category')->update($data);
    }

}
