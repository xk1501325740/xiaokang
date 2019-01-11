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
    //后台登陆
    Route::any('admin/login_index','LoginController@login');
    Route::any('admin/login_yz','LoginController@jydl');
    Route::any('admin/login_yzz','LoginController@login_yz');


     //首页
    Route::any('admin/index','IndexController@index_List');
    Route::any('admin/index-add','IndexController@index_add');
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    //管理员
    Route::get('admin/admin-list','AdminController@admin_list');
    Route::get('admin/add','AdminController@admin_add');
    Route::get('admin/set','AdminController@admin_set');
    Route::get('admin/del','AdminController@admin_del');

    //商品
    Route::get('admin/goods-list','GoodsController@goods_list');
    Route::any('admin/goods-data','GoodsController@goods_data');
    Route::any('admin/goods-onedata','GoodsController@goods_onedata');
    Route::any('admin/goods_add','GoodsController@goods_add');
    Route::any('admin/goods_adds','GoodsController@goods_adds');
    Route::get('admin/goods_set','GoodsController@goods_set');
    Route::get('admin/goods_del','GoodsController@goods_del');

    //品牌
    Route::get('admin/brand-list','BrandController@brand_List');
    Route::get('admin/add','BrandController@brand_add');
    Route::get('admin/set','BrandController@brand_set');
    Route::get('admin/del','BrandController@brand_del');

    //订单
    Route::get('admin/order-list','OrderController@order_list');
    Route::get('admin/add','OrderController@order_add');
    Route::get('admin/set','OrderController@order_set');
    Route::get('admin/del','OrderController@order_del');

    //权限
    Route::get('admin/pression-list','PressionController@pression_List');//权限列表
    Route::get('admin/pression-allot','PressionController@pression_allot');//权限分配表单
    Route::post('admin/pallot','PressionController@pallot');//权限分配
    Route::post('admin/pression-che','PressionController@pression_che');//根据下拉框判断多选框
    Route::get('admin/admin-form','PressionController@adminadd_form');//用户新增表单
    Route::post('admin/adminadd','PressionController@adminadd');//用户新增
    Route::get('admin/adminup','PressionController@admin_upform');//用户编辑表单
    Route::get('admin/roleadd','PressionController@roleadd_form');//角色新增表单

    //用户
    Route::get('admin/user-list','UserController@user_list');
    Route::get('admin/add','UserController@user_add');
    Route::get('admin/set','UserController@user_set');
    Route::get('admin/del','UserController@user_del');

    //分类
    Route::get('admin/cate_list','CategoryController@category_list');
    Route::get('admin/add','CategoryController@category_add');
    Route::any('admin/add_sub','CategoryController@category_add_sub');

    Route::any('admint','CategoryController@category_set');
    Route::any('admint_sub','CategoryController@category_set_sub');
    Route::get('admin/del','CategoryController@category_del');



});


Route::group(['namespace' => 'Home'], function(){
    // 控制器在 "App\Http\Controllers\Home" 命名空间下
});





Route::get('blade', function () {
    return view('child');
});
Route::get('abc', function () {
    return view('abc');
});

//明天把框架搭好并且下午继续做  --1月5号  **任务