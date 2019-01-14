@section('top')
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3       .org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心</title>
    <meta name="Copyright" content="Douco Design." />
    <link href="{{asset('admin/css/public.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/public.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}"  media="all">
    <script type="text/javascript" src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/wangEditor.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/global.js')}}"></script>
    <script src="{{asset('layui/layui.js')}}" charset="utf-8"></script>
</head>
<body>
@show


@section('top1')
    <div id="dcWrap">
        <div id="dcHead">
            <div id="head">
                <div class="logo"><a href="index.html"><img src="images/dclogo.gif" alt="logo"></a></div>
                <div class="nav">

                    <ul class="navRight">
                        <li class="M noLeft"><a href="JavaScript:void(0);">您好，{{session('name')}}</a>
                            <div class="drop mUser">
                                <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                                <a href="manager.php?rec=cloud_account">设置云账户</a>
                            </div>
                        </li>
                        <li class="noRight"><a href="login.php?rec=logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
                <ul class="top">
                    <li><a href="javascript:;"><i class="home"></i><em>商品管理</em></a></li>
                </ul>
                <ul>
                    <li><a href="goods-list"><i class="system"></i><em>商品展示</em></a></li>
                    <li><a href="cate_list"><i class="nav"></i><em>分类展示</em></a></li>
                    <li><a href="show.html"><i class="show"></i><em>品牌展示</em></a></li>
                    <li><a href="page.html"><i class="page"></i><em>订单</em></a></li>
                </ul>
                <ul class="top">
                    <li><a href="pression-list"><i class="home"></i><em>权限管理</em></a></li>
                </ul>
                <ul>
                    <li><a href="pression-list"><i class="system"></i><em>权限展示</em></a></li>
                    <li><a href="pression-allot"><i class="nav"></i><em>权限分配</em></a></li>
                    <li><a href="page.html"><i class="page"></i><em>待定</em></a></li>
                </ul>
                <ul>
                    <li><a href="comment-list"><i class="system"></i><em>用户评论</em></a></li>
                    <li><a href="comment-list"><i class="system"></i><em>评论列表</em></a></li>

                </ul>
            </div></div>
        <div id="dcMain"> <!-- 当前位置 -->
            <div id="urHere">DouPHP 管理中心- @yield('biaoti')</div>  <div id="index" class="mainBox" style="padding-top:18px;height:auto!important;height:550px;min-height:550px;">



                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="indexBoxTwo">
                    <tr>
                        <td width="65%" valign="top" class="pr">
@show
@section('button1')

@show
@section('button')
                            </td>

                        </tr>
                    </table>
                  {{--  <div class="indexBox">


                    </div>
                    <div class="indexBox">

                    </div>--}}

                </div>
            </div>
            <div class="clear"></div>
            <div id="dcFooter">
                <div id="footer">
                    <div class="line"></div>
                    <ul>
                        版权所有 © 2019-2025 k技有限公司，并保留所有权利。
                    </ul>
                </div>
            </div><!-- dcFooter 结束 -->
            <div class="clear"></div> </div>
</body>
</html>
@show


