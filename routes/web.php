<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ceshi', function () {
    return view('index');
});

Route::get('/user','User1Controller@abc');
//后台管理
Route::group(['namespace' => 'Admin'], function(){
    //测试
  /* Route::prefix('avxd')->group(function () {
        Route::get('ceshi','LoginController@ceshi');
        Route::post('ceshi1','LoginController@ceshi');
    });*/

    Route::get('admin/adminceshi','CeshiController@abc');

    //后台登陆
    Route::prefix('admin')->group(function () {
        Route::any('login_index','LoginController@login');
        Route::any('login_yz','LoginController@jydl');
        Route::any('login_yzz','LoginController@login_yz');
    });


    //首页
    Route::prefix('admin')->group(function () {
        Route::any('admin/index','IndexController@index_List');
        Route::any('admin/index-add','IndexController@index_add');
        Route::any('admin/index-ceshi','IndexController@ceshi');
    });


    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    //管理员
    /*Route::prefix('admin')->group(function () {
        Route::get('admin-list','AdminController@admin_list');
        Route::get('add','AdminController@admin_add');
        Route::get('set','AdminController@admin_set');
        Route::get('del','AdminController@admin_del');
    });*/


    //商品
    Route::prefix('admin')->group(function () {
        Route::get('goods-list','GoodsController@goods_list');
        Route::any('goods-data','GoodsController@goods_data');
        Route::any('goods-onedata','GoodsController@goods_onedata');
        Route::any('goods_add','GoodsController@goods_add');
        Route::any('goods_adds','GoodsController@goods_adds');
        Route::get('goods_set','GoodsController@goods_set');
        Route::get('goods_del','GoodsController@goods_del');
    });

    //品牌
    Route::prefix('admin')->group(function () {
        Route::get('brand-list','BrandController@brand_List');
        Route::get('add','BrandController@brand_add');
        Route::get('set','BrandController@brand_set');
        Route::get('del','BrandController@brand_del');
      });

    //订单
    Route::prefix('admin')->group(function () {
        Route::get('admin/order-list','OrderController@order_list');
        Route::get('admin/add','OrderController@order_add');
        Route::get('admin/set','OrderController@order_set');
        Route::get('admin/del','OrderController@order_del');

    });

    //权限
    Route::prefix('admin')->group(function () {
        Route::get('pression-list','PressionController@pression_List');//权限列表
        Route::get('pression-allot','PressionController@pression_allot');//权限分配表单
        Route::post('pallot','PressionController@pallot');//权限分配
        Route::post('pression-che','PressionController@pression_che');//根据下拉框判断多选框
        Route::get('admin-form','PressionController@adminadd_form');//用户新增表单
        Route::post('adminadd','PressionController@adminadd');//用户新增
        Route::get('adminup','PressionController@admin_upform');//用户编辑表单
        Route::post('adminupd','PressionController@admin_up');//用户编辑
        Route::get('role_prefor','PressionController@role_prefor');//角色新增表单
        Route::post('role_preadd','PressionController@role_preadd');//角色新增
    });

    //评论
    Route::prefix('admin')->group(function (){
        Route::get('comment-list','CommentController@comment_list');//评论展示
        Route::get('comment-editform','CommentController@comment_editform');//评论查看表单
        Route::post('comment-edit','CommentController@comment_edit');//追加评论
    });




    //用户
    Route::prefix('admin')->group(function () {
        Route::get('user-list','UserController@user_list');
        Route::get('add','UserController@user_add');
        Route::get('set','UserController@user_set');
        Route::get('del','UserController@user_del');

    });

    //分类
    Route::prefix('admin')->group(function () {
        Route::get('cate_list','CategoryController@category_list');
        Route::get('add','CategoryController@category_add');
        Route::any('add_sub','CategoryController@category_add_sub');

        Route::any('cate_set','CategoryController@category_set');
        Route::any('admint_sub','CategoryController@category_set_sub');
        Route::get('del','CategoryController@category_del');
    });




});


Route::group(['namespace' => 'Home'], function(){
    //登陆
    Route::get('home/login','loginController@login');
    Route::get('home/login_sub','loginController@login_sub');
    //注册
    Route::get('home/regist','loginController@regist');
    Route::get('home/regist_sub','loginController@regist_sub');
    //前台
    Route::get('home/index','indexController@index');
    Route::get('home/product','indexController@product');
    //购物车//生成订单//提交订单
    Route::get('home/buycar','buycarController@buycar');
    Route::get('home/buycar_two','buycarController@buycar_two');
    Route::get('home/buycar_three','buycarController@buycar_three');
    //品牌
    Route::get('home/brand','brandController@brand');
    Route::get('home/brand_list','brandController@brand_list');
    //分类
    //Route::get('home/category','brandController@category');
    Route::get('home/category_list','brandController@category_list');
   /* //个人管理中心
    Route::get('home/member','memberController@member');
    //个人地址管理
    Route::get('home/member_address','memberController@member_address');
    //会员
    Route::get('home/member_member','memberController@member_member');
    Route::get('home/member_member_links','memberController@member_member_list');
    Route::get('home/member_money','memberController@member_money');
    //留言
    Route::get('home/member_msg','memberController@member_msg');
    //合并订单
    Route::get('home/member_order','memberController@member_order');*/

});





Route::get('blade', function () {
    return view('child');
});
Route::get('abc', function () {
    return view('abc');
});

//明天把框架搭好并且下午继续做  --1月5号  **任务