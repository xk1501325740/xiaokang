@extends('app')

@section('') @show
@section('button1')
    @parent
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="article_category.html" class="actionBtn">添加分类</a>添加分类</h3>
    <form action="{{ URL::asset('admin/add_sub') }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="80" align="right">分类名称</td>
                <td>
                    <input type="text" name="category_name" value="" size="40" class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">分类编码</td>
                <td>
                    <input type="text" name="category_code" value="" size="40" class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">上级分类</td>
                <td>
                    <select name="parent_id">
                        <option value="0">父级</option>
                        @foreach($data as $k => $v )
                        <option value="{{$v['category_id']}}">{{str_repeat('--',$v['category_level'])}}
                            {{$v['category_name']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">层级</td>
                <td>
                    <input type="text" name="category_level" value="" size="40" class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">状态</td>
                <td>
                    <input type="text" name="category_status" value="" size="40" class="inpMain" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>

                    <input name="submit" class="btn" type="submit" value="提交" />
                </td>
            </tr>
        </table>
    </form>
</div>



</body>
</html>




@endsection
