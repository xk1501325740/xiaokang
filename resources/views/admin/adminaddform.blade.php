<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/10
 * Time: 20:57
 */?>
@extends('app')
@section('') @show
@section('button1')
    @parent
    <form action="{{url('admin/adminadd')}}" method="post">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="80" align="right">用户名称</td>
                <td>
                    <input type="text" name="uname" >
                </td>
            </tr>
            <tr>
                <td width="80" align="right">密码</td>
                <td>
                    <input type="password" name="pwd" >
                </td>
            </tr>
            <tr>
                <td width="80" align="right">角色</td>
                <td>
                    @foreach($list as $val)
                        <input type="radio" name="role" value="{{$val->id}}" >{{$val->role}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td width="80" align="right">启用/禁用</td>
                <td>
                    <input type="radio" name="status" value="1" >启用
                    <input type="radio" name="status" value="0" >禁用
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="token" value="b9439ae8" />
                    <input type="hidden" name="cat_id" value="" />
                    <input name="submit" class="btn" type="submit" value="新增" />
                </td>
            </tr>
        </table>
    </form>


@endsection
