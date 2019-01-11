@extends('app')

@section('') @show
@section('button1')
    @parent
    <div class="layui-tab layui-tab-card" lay-filter="goods-tab">
        <div class="layui-tab-content" >

            <div class="demoTable">
                <button class="layui-btn" id="addGoods" style="float: right">添加商品</button>
                搜索商品名称：
                <div class="layui-inline">
                    <input class="layui-input" name="goods_name" id="demoReload" autocomplete="off">
                </div>
                <button class="layui-btn" id="do_search">搜索</button>
            </div>
        </div>
    </div>
    <div class="layui-tab layui-tab-card" lay-filter="goods-tab">
        <div class="layui-tab-content" >
    <table class="layui-hide" id="test" lay-filter="test" lay-data="{id: 'idTest'}"></table>
            <script type="text/html" id="switchTpl">

                <input type="checkbox" name="goods_status"  lay-text="上架|下架" lay-filter="goods_statusDemo"  value="{{1}}" lay-skin="switch"  {{ 1 == 1 ? 'checked' : '' }} >

            </script>
            <script type="text/html" id="audit_status">

                <input type="checkbox" name="audit_status"  lay-text="已审核|未审核" lay-filter="audit_statusDemo"  value="{{1}}" lay-skin="switch"  {{ 1 == 1 ? 'checked' : '' }} >

            </script>
        </div>
    </div>

                         <script type="text/html" id="toolbarDemo">
                             <div class="layui-btn-container">
                                 <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                                 <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                                 <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                             </div>
                         </script>

                         <script type="text/html" id="barDemo">
                             <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                             <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                         </script>


                         <script src="{{URL::asset('layui/layui.js')}}" charset="utf-8"></script>

                         <script src="{{URL::asset('/admin/js/jquery-3.3.1.min.js')}}" charset="utf-8"></script>
                         <script>
                             layui.use(['table','form'], function(){
                                 var table = layui.table;


                                 table.render({
                                     elem: '#test'
                                     ,id:'test'
                                     ,url:'goods-data'
                                     ,toolbar: '#toolbarDemo'
                                     ,title: '用户数据表'
                                     ,page: true
                                     ,width: 1120
                                     ,limit:10
                                     ,cols: [[
                                         {type: 'checkbox', fixed: 'left'}
                                         ,{field:'goods_id', title:'ID', width:80,  align: 'center',fixed: 'left', sort: true}
                                         ,{field:'brand_id', title:'品牌', width:120, align: 'center'
                                         }
                                         ,{field:'cate_id', title:'分类', align: 'center',width:100
                                         }
                                         ,{field:'goods_code', title:'商品编码',align: 'center', width:120, edit: 'text', sort: true}
                                         ,{field:'goods_name', title:'商品名称',align: 'center', edit: 'text',width:120}
                                         ,{field:'info_desc', title:'商品详情',align: 'center', edit: 'text',width:120}
                                         ,{field:'coment_count', title:'评论总次数',align: 'center', width:120, sort: true}
                                         ,{field:'info_date', title:'商品生产日期',align: 'center', width:120, sort: true}
                                         ,{field:'supplier_id', title:'商品供应商',align: 'center', width:120}
                                         ,{field:'price', title:'商销售价格',align: 'center', edit: 'text',width:120, sort: true}
                                         ,{field:'market_price', title:'商品价格', edit: 'text',align: 'center', width:120, sort: true}
                                         ,{field:'stock', title:'商品库存', edit: 'text',align: 'center', width:120}
                                         ,{field:'goods_status', title:'状态', align: 'center',width:120,
                                             templet: '#switchTpl', unresize: true}
                                         ,{field:'audit_status', title:'审核',align: 'center',width:120,templet: '#audit_status', unresize: true}
                                         ,{field:'create_time', title:'创建时间',align: 'center', width:120}
                                         ,{field:'update_time', title:'修改时间',align: 'center',width:120}
                                         ,{fixed: 'right', title:'操作',align: 'center', toolbar: '#barDemo', width:150}
                                     ]]

                                 });

                                 table.on('edit(test)', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
                                     console.log(obj.data.goods_id);
                                     console.log(obj.value); //得到修改后的值
                                     console.log(obj.field); //当前编辑的字段名
                                     $.ajax({
                                         method: "get",
                                         url: "goods_set",
                                         data: { id:obj.data.goods_id,filed: obj.field,value:obj.value }                                                                           })
                                 });

                                 $('#do_search').on('click', function () {
                                     // 搜索条件
                                     var send_name = $('#demoReload').val();
                                     //alert(send_name)
                                     table.reload('test', {
                                         url: 'goods-onedata',
                                         method: 'get'
                                         , where: {
                                             'goods_name': send_name
                                         }
                                         , page: {
                                             curr: 1
                                         }
                                     });
                                 });


                                 //监听审核
                                 layui.form.on('switch(audit_statusDemo)', function(obj){
                                     /*layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);*/
                                    // alert(123)
                                      //console.log(obj)
                                 });
                                 //监听商品状态
                                 layui.form.on('switch(goods_statusDemo)', function(obj){
                                 /*layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);*/
                                 // console.log(obj)
                                 });

                                 //头工具栏事件
                                 table.on('toolbar(test)', function(obj){
                                     var checkStatus = table.checkStatus(obj.config.id);
                                     switch(obj.event){
                                         case 'getCheckData':
                                             var data = checkStatus.data;
                                             layer.alert(JSON.stringify(data));
                                             break;
                                         case 'getCheckLength':
                                             var data = checkStatus.data;
                                             layer.msg('选中了：'+ data.length + ' 个');
                                             break;
                                         case 'isAll':
                                             layer.msg(checkStatus.isAll ? '全选': '未全选');
                                             break;
                                     };
                                 });

                                 //监听行工具事件
                                 table.on('tool(test)', function(obj){
                                     var data = obj.data;

                                     if(obj.event === 'del'){
                                         layer.confirm('真的删除行么', function(index){
                                             obj.del();
                                             layer.close(index);
                                             $.ajax({
                                                   method: "get",
                                                   url: "goods_del",
                                                   data: { id: data.goods_id }                                                                           }).done(function( msg ) {
                                                       // alert(msg)
                                                 });

                                         });
                                     } else if(obj.event === 'edit'){

                                         layer.prompt({
                                             formType: 2
                                             ,value: data.info_desc
                                         }, function(value, index){
                                             obj.update({
                                                 info_desc:value
                                             });
                                             layer.close(index);

                                             //console.log(index+'***'+value)
                                             $.ajax({
                                                 method: "get",
                                                 url: "goods_set",
                                                 data: { id:obj.data.goods_id,filed: 'info_desc',value:value }                                                                           }).done(function(res){
                                                     console.log(res)
                                             })

                                         });
                                     }
                                 });
                             });
                             $('#addGoods').click(function(){
                                 window.location.href="goods_add";
                                 return false;
                             })
                         </script>

@endsection


