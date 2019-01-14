<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\models\admin;
use App\models\Admin_role;

use App\models\Pression;
use App\models\Role_pression;
use Illuminate\Support\Facades\DB;
class CeshiController extends Controller
{
        public $name ;
        public $url=[];
        public $request;
    public function __construct(Request $request)
    {
            $this->request = $request->path();

    }

     public function check(){
         $name = Redis::get('name');
         $admin = new admin();
         $admin_role = new Admin_role();
         $role_pression = new Role_pression();
         //根据用户名查询单条信息
         $admin_one = $admin->login_yz($name);

         //根据用户的id查询当前的角色
         $role_id = $admin_role->get_role( $admin_one[0]['id'] );


         //角色的id  查询对应的权限
         $press_id = $role_pression->get_pre($role_id[0] );

         //分割成数组
         $db = explode(',',$press_id[0]['pression_id']);

         //循环便利
         for($i=0;$i<count($db);$i++){
             $this->url[] =  DB::table('pression')->where('id',$db[$i])->value('url');
         }

         if(in_array($this->request,$this->url)){
             return 'true';
         }else{
             return  'false';
         }
     }

}
