<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 8:58
 */?>
@extends('app')
@section('') @show
@section('button1')
    @parent
    <form action="{{url('admin/adminupd')}}" method="post" onsubmit="return  sub()" >
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="80" align="right">用户名称:</td>
                <td>
                    <b>{{$list->username}}</b>
                    <input type="hidden" name="unameid" value="{{$list->admin_id}}">
                </td>
            </tr>
            <tr>
                <td width="80" align="right">角色:</td>
                <td>
                    @foreach($role as $val)
                        <input type="radio" name="role"  value="{{$val->id}}">{{$val->role}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td width="80" align="right">启用/禁用:</td>
                <td>
                    <input type="radio" name="status" value="1" >启用
                    <input type="radio" name="status" value="0" >禁用
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input name="button" class="btn" type="submit" value="提交" />
                </td>
            </tr>
        </table>
    </form>
    <script>
        function sub() {
            var uname=$("input:radio[name='role']:checked").val()
            var status=$("input:radio[name='status']:checked").val()
            if(uname==null || status==null){
                alert('有某项未输入')
                return false;
            }
                return true;
        }
    </script>

@endsection
