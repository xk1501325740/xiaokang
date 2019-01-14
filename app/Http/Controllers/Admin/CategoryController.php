<?php
namespace App\Http\Controllers\admin;


use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\admin;
use App\models\Admin_role;
use App\models\Role_pression;
class CategoryController extends CeshiController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

    }

    //展示分类数据
    public function category_list(){


        $tab = new Category();
        $res=$tab->show();
        return view('admin.category_list',['data'=>$res]);
    }

    //添加页面
    public function category_add(){
        $tab = new Category();
        $res=$tab->show();
        return view('admin.category_add',['data'=>$res]);
    }

    // 添加页面 接收值
    public function category_add_sub(Request $request){
        $data['category_name'] = $request->post('category_name');
        $data['category_code'] = $request->post('category_code');
        $data['parent_id'] = $request->post('parent_id');
        $data['category_level'] = $request->post('category_level')
        ;
        $data['modified_time'] = date('Y-h-d:H-i-s');
        $data['category_status'] = $request->post('category_status');
        if(empty($data['category_name'])){ echo "<script>alert('不能为空1');location.href='http://shops.com/admin/add'</script>"; }
        if(empty($data['category_code'])){ echo "<script>alert('不能为空2');location.href='http://shops.com/admin/add'</script>"; }
        if(empty($data['category_level'])){ echo "<script>alert('不能为空4');location.href='http://shops.com/admin/add'</script>"; }
        if(empty($data['category_status'])){ echo "<script>alert('不能为空6');location.href='http://shops.com/admin/add'</script>"; }
        $model = new Category();
        $list = $model->show();
        foreach ($list as $k => $v ){
            if($data['category_name'] == $v['category_name']){
                echo "<script>alert('分类已经存在');location.href='http://shops.com/admin/add'</script>";
            }
        }
        $res = $model ->ins($data);
        if($res){
            echo "<script>alert('添加成功');location.href='http://shops.com/admin/add'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='http://shops.com/admin/add'</script>";
        }
    }

    //删除
    public function category_del(Request $request){
        $id = $request->get('id');
        $model = new Category();
        $res = $model->del($id);
        if(!empty($res)){
            echo "<script>alert('删除成功');location.href='http://shops.com/admin/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='http://shops.com/admin/list'</script>";
        }
    }
    //编辑
    public function category_set(Request $request){
        $id = $request->get('id');
        $model = new Category();
        //单条分类
        $one = $model->sel($id);
        //全部分类
        $all = $model->show();
        return  view('admin.category_set',['one'=>$one,'all'=>$all]);
    }
    public function category_set_sub(Request $request){
        $data = $request->post();
        $model = new Category($data);
        $res = $model->upd($data);
        if(empty($res)){
            echo "<script>alert('修改成功');location.href='http://shops.com/admin/list'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='http://shops.com/admin/list'</script>";
        }

    }

}