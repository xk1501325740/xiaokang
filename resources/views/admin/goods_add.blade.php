@extends('app')

@section('') @show
@section('button1')
    @parent
    <form class="layui-form" action="goods_adds" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入标题"  class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">品牌ID</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>



        <div class="layui-form-item">
            <label class="layui-form-label">分类</label>
            <div class="layui-input-block">
                <select name="cate" lay-filter="aihao">
                    <option value=""></option>
                    <option value="0">写作</option>
                    <option value="1" selected="">阅读</option>
                    <option value="2">游戏</option>
                    <option value="3">音乐</option>
                    <option value="4">旅行</option>
                </select>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">商品图片</label>
            <input type="file" name="name">
        </div>



        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <select name="p">
                    <option value=""></option>
                    <option value="0">写作</option>
                    <option value="1" selected="">阅读</option>
                    <option value="2">游戏</option>
                    <option value="3">音乐</option>
                    <option value="4">旅行</option>
                </select>
            </div>
        </div>

        {{--规格--}}
        <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <font class="layui-btn layui-btn-primary layui-btn-sm" id="sku">生产规格</font>
            <div class="layui-tab layui-tab-card"  id="scguige" style="">
                <div class="cc">
                规格名称: <input type="text" name="attr_name[]" style="border: solid red 1px">规格属性:<input type="text" name="attr_values[]"  style="border: solid red 1px"><a href="javascript:;" class="jiajia"> [+]</a>
                    <br>
                </div>
               
        </div>
        </div>

        {{--上传多图片--}}
        <div class="layui-form-item">
            <label class="layui-form-label">附加图片</label>
            <font class="layui-btn layui-btn-primary layui-btn-sm" id="tupian">添加图片</font>
            <div class="layui-tab layui-tab-card"  id="sctup" style="">
                <div class="tt">
                    图片: <input type="file" name="tupian[]" style="border: solid red 1px"><a href="javascript:;" class="jia"> [+]</a>
                    <br>
                </div>

            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="checkbox" name="goods_status"  lay-skin="switch" lay-text="上架|下架">
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <div class="layui-tab-content" >
            <script id="container" name="content" type="text/plain"></script>
            <div id="editor">

            </div>
                <textarea id="text1"  name="text_values"  ></textarea>
            </div>
        </div>

        
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </form>
   <script>
       var E = window.wangEditor
       var editor = new E('#editor')
       var $text1 = $('#text1')
       editor.customConfig.onchange = function (html) {
           // 监控变化，同步更新到 textarea
           $text1.val(html)
       }
       editor.create()


       $(function(){
           $('#scguige').hide();
           $('#sctup').hide();
           $('#text1').hide();

           //生产规格
             $('#sku').click(function(){

                $('#scguige').show()
             })
           //添加规格格子
             $('.jiajia').click(function(){
                 $(".cc").append(" 规格名称: <input type='text'name='attr_name[]' style='border: solid red 1px'>" +
                     "规格属性:<input type='text'name='attr_values[]'  style='border: solid red 1px'>" +
                     "<a href='javascript:;'   class='jiajia'></a>" +
                     "<br>" +

                     "");
             })

           //生产规格
           $('#tupian').click(function(){

               $('#sctup').show()
           })
           //添加规格格子
           $('.jia').click(function(){
               $(".tt").append(" 规格名称: <input type='file'name='tupian[]'>" +
                   "<br>" +
                   "");
           })



       })
       $text1.val(editor.txt.html())

        layui.use(['form', 'layedit', 'laydate','upload'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate
                ,upload = layui.upload;

            //日期
            laydate.render({
                elem: '#date'
            });
            laydate.render({
                elem: '#date1'
            });

         /*   //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字符啊';
                    }
                }
                ,pass: [
                    /^[\S]{6,12}$/
                    ,'密码必须6到12位，且不能出现空格'
                ]
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });

            //监听指定开关
            form.on('switch(switchTest)', function(data){
                layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });




            //表单初始赋值
            form.val('example', {
                "username": "贤心" // "name": "value"
                ,"password": "123456"
                ,"interest": 1
                ,"like[write]": true //复选框选中状态
                ,"close": true //开关状态
                ,"sex": "女"
                ,"desc": "我爱 layui"
            })
*/

        });
    </script>
@endsection