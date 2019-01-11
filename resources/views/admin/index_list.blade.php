@extends('app')
@section('') @show
@section('button1')
    @parent

    <script src="{{asset('admin/js/echarts.js')}}"></script>
    <div class="layadmin-tabsbody-item layui-show">
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md8">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md6">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    <i class="iconfont icon-caozuo"></i>快捷操作
                                </div>
                                <div class="layui-card-body">
                                    <div class="layui-carousel layadmin-carousel layadmin-shortcut">
                                        <ul class="layui-row layui-col-space10 layui-this">
                                          {{--  <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-goods"></i>
                                                    <cite>商品</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-dingdan1"></i>
                                                    <cite>订单</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-user"></i>
                                                    <cite>会员</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-gonggao"></i>
                                                    <cite>公告</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-coupon"></i>
                                                    <cite>促销</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-bangzhupeisongfuwu"></i>
                                                    <cite>配送</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-zhifu-01"></i>
                                                    <cite>支付方式</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="">
                                                    <i class="iconfont icon-review"></i>
                                                    <cite>店铺设置</cite>
                                                </a>
                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-md6">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    <i class="iconfont icon-daiban"></i>待办事项
                                </div>
                                <div class="layui-card-body">
                                    <div class="layui-carousel layadmin-carousel layadmin-backlog">
                                        <ul class="layui-row layui-col-space10 layui-this">
                                            {{--<li class="layui-col-xs6">
                                                <a href="" class="layadmin-backlog-body">
                                                    <h3>待支付</h3>
                                                    <p><cite>312321</cite></p>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs6">
                                                <a href="" class="layadmin-backlog-body">
                                                    <h3>待发货</h3>
                                                    <p><cite>321312</cite></p>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs6">
                                                <a href="" class="layadmin-backlog-body">
                                                    <h3>待售后</h3>
                                                    <p><cite>123</cite></p>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs6">
                                                <a href="" class="layadmin-backlog-body">
                                                    <h3>库存报警</h3>
                                                    <p><cite>123123</cite></p>
                                                </a>
                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <i class="iconfont icon-gonggao"></i>版本信息
                        </div>

                        <div class="layui-card-body layui-text" id="view">

                        </div>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <i class="iconfont icon-dingdan1"></i>订单统计
                        </div>
                        <div class="layui-card-body">
                            <div id="graphic" class="">
                                <div id="main" class="main" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <i class="iconfont icon-user"></i>会员统计
                        </div>
                        <div class="layui-card-body">
                            <div id="graphics" class="">
                                <div id="users" class="main" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <i class="iconfont icon-dingdan1"></i>最近登录
                        </div>

                        <div class="layui-card-body" id="loginLog"></div>

                    </div>
                </div>

                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <i class="iconfont icon-dingdan1"></i>操作日志
                        </div>
                        <div class="layui-card-body" id="oplog-table"></div>
                    </div>
                </div>

                <script id="demo" type="text/html">
                    <table class="layui-table">
                        <tbody>

                        <tr>
                            <td><i>1</i><a class="notice" href="javascript:;" id="">1</a></td>
                        </tr>

                        </tbody>
                    </table>
                </script>


                <script id="log" type="text/html">



                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>状态</th>
                            <th>记录时间</th>
                            <th>登录IP</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>

                        </tbody>
                    </table>

                </script>

                <script id="version" type="text/html">
                    <table class="layui-table">
                        <colgroup>
                            <col width="100">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>产品名称</td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>当前版本</td>
                            <td>
                                <a href="https://gitee.com/hnjihai/jshop_mall" target="_blank" style="padding-left: 15px;">更新日志</a>
                            </td>
                        </tr>
                        <tr>
                            <td>是否授权</td>
                            <td>

                                <a href="https://www.jihainet.com/" style="color: green;" target="_blank">已授权</a>

                             {{--   <a href="https://www.jihainet.com/" style="color: red;" target="_blank">未授权</a>--}}

                            </td>
                        </tr>
                        <tr>
                            <td>产品授权</td>
                            <td style="padding-bottom: 0;">
                                <div class="layui-btn-container">

                                    <a href="https://www.jihainet.com/download/download.php?class2=39" target="_blank"
                                       class="layui-btn  layui-btn-sm">下载更新</a>

                                   {{-- <a href="https://www.jihainet.com/" target="_blank"
                                       class="layui-btn layui-btn-danger  layui-btn-sm">获取授权</a>
                                    <a href="https://www.jihainet.com/download/download.php?class2=39" target="_blank"
                                       class="layui-btn  layui-btn-sm">立即下载</a>--}}

                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </script>


                <script id="oplog" type="text/html">




                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>操作员</th>
                            <th>操作时间</th>
                            <th>操作内容</th>
                            <th>操作IP</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>

                </script>


                <script type="text/javascript">
                    layui.use(['laytpl','layer'],function(){
                        var $ = layui.$, laytpl = layui.laytpl,layer = layui.layer;
                        $.get("{:url('manage/manage/getVersion')}",function(data){
                            var getTpl = version.innerHTML,view = document.getElementById('view');
                            laytpl(getTpl).render(data.data, function(html){
                                view.innerHTML = html;
                            });
                        });


                        //获取历史登录记录
                        $.get("{:url('manage/User/userLogList',array('state'=>1))}",function(data){
                            var getTpl = log.innerHTML,view = document.getElementById('loginLog');
                            laytpl(getTpl).render(data.data,function(html){
                                view.innerHTML = html;
                            })
                        });
                        JsGet("{:url('manage/OperationLog/getLastLog')}",function (data) {
                            var getTpl = oplog.innerHTML,view = document.getElementById('oplog-table');
                            laytpl(getTpl).render(data.data,function(html){
                                view.innerHTML = html;
                            })
                        });
                    });
                    // 路径配置
                    require.config({
                        paths: {
                            echarts: '__STATIC_LIB__echarts/build/dist'
                        }
                    });
                    require(
                        ['echarts','echarts/chart/line'],
                        function (ec) {
                            var myChart = ec.init(document.getElementById('main'));
                            var option = {
                                title: {text:'最近7天订单量统计'},
                                tooltip: {show:true},
                                legend: {},
                                yAxis: [{type:'value'}],
                                xAxis: [],
                                series: []
                            };
                            $.get('{:url("order/statistics")}').done(function (data) {
                                myChart.setOption({
                                    legend: data.legend,
                                    xAxis: data.xAxis,
                                    series: data.series
                                });
                            });
                            myChart.setOption(option);
                        }
                    );
                    require(
                        [
                            'echarts',
                            'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
                        ],


                        function (ec) {
                            // 基于准备好的dom，初始化echarts图表
                            var myChart = ec.init(document.getElementById('users'));

                            var option = {

                                tooltip: {
                                    show: true
                                },
                                legend: {},
                                xAxis : [],
                                yAxis : [],
                                series : []
                            };
                            $.get('{:url("user/statistics")}').done(function (data) {
                                myChart.setOption({
                                    legend: data.legend,
                                    xAxis: data.xAxis,
                                    series: data.series
                                });
                            });
                            // 为echarts对象加载数据
                            myChart.setOption(option);
                        }
                    );
                </script>
            </div>
        </div>
    </div>
@endsection
