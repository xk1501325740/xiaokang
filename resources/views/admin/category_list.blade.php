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
    <h3><a href="{{ URL::asset('admin/add') }}" class="actionBtn add">添加分类</a>分类列表</h3>
    <table>
        <tr>
            <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
            <th width="40" align="center">编号</th>
            <th align="left">分类名称</th>
            <th width="150" align="center">父级id</th>
            <th width="80" align="center">层级</th>
            <th width="80" align="center">操作</th>
        </tr>
        @foreach($data as $k =>$v)
        <tr>
            <td align="center"><input type="checkbox" name="checkbox[]" value="15" /></td>
            <td align="center">{{$v['category_id']}}</td>
            <td><a href="">{{$v['category_name']}}</a></td>
            <td align="center"><a href="product.php?cat_id=3">
                    {{str_repeat('--',$v['category_level'])}}
                    {{$v['parent_id']}}
                </a></td>
            <td align="center">{{str_repeat('--',$v['category_level'])}}{{$v['category_name']}}</td>
            <td align="center">
                <a href="set?id={{$v['category_id']}}">编辑</a> | <a href="del?id={{$v['category_id']}}">删除</a>
            </td>
        </tr>
            @endforeach
    </table>
</body>
</html>    
@endsection
