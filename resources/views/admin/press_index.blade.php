@extends('app')

@section('') @show
@section('biaoti', '权限用户展示')
@section('button1')
    @parent
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <button class="layui-btn layui-btn-sm layui-btn-normal"><a href="{{url('admin/admin-form')}}">新增用户</a></button>

            <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
            <th width="40" align="center">编号</th>
            <th width="80" align="center">名称</th>
            <th width="80" align="center">角色</th>
            <th width="80" align="center">添加日期</th>
            <th width="80" align="center">状态</th>
            <th width="80" align="center">操作</th>
        </tr>
        @foreach($list as $key=> $val)
        <tr>
            <td align="center"><input type="checkbox" name="checkbox[]" value="{{$val->admin_id}}" /></td>
            <td align="center">{{$key+1}}</td>
            <td align="center">{{$val->username}}</td>
            <td align="center">{{$val->role}}</td>
            <td><a href="product.php?rec=edit&id=15">{{date("Y-m-d H:i:s",$val->create_time)}}</a></td>
            <td align="center"><a href="product.php?cat_id=3">{{$val->status==1 ?'已激活':'待激活' }}</a></td>
            <td align="center">
                <a href="{{url('admin/adminup')}}?admin={{$val->admin_id}}&role={{$val->role_id}}">编辑</a> | <a href="product.php?rec=del&id=15">删除</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
