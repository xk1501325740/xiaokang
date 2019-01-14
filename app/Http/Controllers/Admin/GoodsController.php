<?php

namespace App\Http\Controllers\admin;

use App\models\attribute;
use App\models\goods_master;
use App\models\goods_pic;

use App\models\sku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use App\models\admin;
use App\models\Admin_role;
use App\models\Role_pression;


class GoodsController extends CeshiController
{
    public $url = [];
    public $goods_master ;
    public $goods_pic ;
    public $attribute;
    public $sku;

   public function __construct(Request $request)
   {
       parent::__construct($request);
       $this->goods_master = new goods_master();
       $this->goods_pic = new  goods_pic();
       $this->attribute = new attribute();
       $this->sku = new sku();
   }


    //展示数据
    public function goods_List(){
        $res = $this->check();
        if($res=='false'){
            return view('admin.pre_error');
        }
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

        $users = DB::table('goods_master')->where('is_delet',1)->get();
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
    public function goods_adds(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->post();
            //商品添加
             $res = array_diff_key($data, ['_token' => "xy"]);
             $goods_data = [];
             $goods_data['goods_name']=  $res['goods_name'];
             $goods_data['brand_id']=  $res['brand_id'];
             $goods_data['stock']=  $res['stock'];
             $goods_data['market_price']=  $res['market_price'];
             $goods_data['price']=  $res['price'];
             $goods_data['info_date']=  $res['info_date'];
             $goods_data['supplier_id']=  $res['supplier_id'];
             $goods_data['cate_id']=  $res['cate_id'];
             $goods_data['goods_status']=  $res['goods_status']=='on'?'1':'0';
             $goods_data['info_desc']=  $res['info_desc'];
              $res =  $this->goods_master->insertGetId($goods_data);
            //图片上传
            $file = $_FILES;

               //上传到七牛云
                for($i=0;$i<count($file['tupian']['tmp_name']);$i++){

                    $this->phone_img($file['tupian']['tmp_name'][$i]);

                }

                //传到商品表的图片
                foreach ($file as $key => $val) {

                foreach ($val['name'] as $keyy=> $vall){

                    if($keyy==0){
                        $this->goods_pic->insert(['goods_id' => 6, 'pic_url' => $vall,'is_master'=>1]);
                    }else{
                        $this->goods_pic->insert(['goods_id' => 6, 'pic_url' => $vall]);
                    }

                }


            }

                //SKU

            $attr_id = [];
            foreach( $data['attr_name'] as  $k=>$v){

                  $attr_values = explode(',',$data['attr_values'][$k]);

                  foreach($attr_values as $values){
                      $attr['attr_name'] = $v;
                      $attr['attr_value'] = $values;
                      $attr['status'] = 1;

                     $a_id =  $this->attribute->insertGetId($attr);
                      $attr_id[$k][] = $a_id;
                  }


            }

             $sku = $this->CartesianProduct( $attr_id );
             for($ii=0;$ii<count($sku);$ii++){
                 $this->sku->insert(['goods_id'=>$res ,'properties'=>$sku[$ii] ,'price'=>1111]);
             }




        }


    }

    /**
     * 计算多个集合的笛卡尔积
     * @param Array $sets 集合数组
     * @return Array
     */
     public function CartesianProduct($sets){

        // 保存结果
        $result = array();

        // 循环遍历集合数据
        for($i=0,$count=count($sets); $i<$count-1; $i++){

            // 初始化
            if($i==0){
                $result = $sets[$i];
            }

            // 保存临时数据
            $tmp = array();

            // 结果与下一个集合计算笛卡尔积
            foreach($result as $res){
                foreach($sets[$i+1] as $set){
                    $tmp[] = $res.','.$set;
                }
            }

            // 将笛卡尔积写入结果
            $result = $tmp;

        }

        return $result;

    }

    public function phone_img($file_name){
        // 引入鉴权类

        // 需要填写你的 Access Key 和 Secret Key
        $accessKey =env('ak');
        $secretKey = env('sk');
        $bucket = env('bt');
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        // 要上传文件的本地路径

        $filePath = $file_name;
        // 上传到七牛后保存的文件名
        $key = 'kang.png';
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        echo "\n====> putFile result: \n";
        if ($err !== null) {
            var_dump(1);
        } else {
            var_dump(2);
        }
    }


    //删除
    public function goods_del(Request $request){

        return $this->goods_master->del_one($request->get('id'),['is_delet'=>0]);

    }

    //编辑
    public function goods_set(Request $request){

      return  $this->goods_master->up_one($request->get('id'),$request->get('filed'),$request->get('value'));


    }

}
