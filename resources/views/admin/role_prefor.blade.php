<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 14:20
 */
?>
@extends('app')
@section('') @show
@section('button1')
    @parent
    <form action="{{url('admin/role_preadd')}}" method="post" onsubmit="return sub()" >
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

            <tr>
                <td width="80" align="right">输入角色：</td>
                <td>
                    <input type="text" name="role">
                </td>
            </tr>
            <tr>
                <td align="right">权限分配</td>
                <td>
                    @foreach($pression as $key=>$val)
                        <input type="checkbox" name="pression_id[]"  id="pression_id" value="{{$val->id}}" >{{$val->pname}}
                        <?php if($val->parent==0) { ?>
                        <br>
                        <?php }  ?>
                        <?php if($val->parent==$val->id) { ?>
                        <input type="checkbox" name="pression_id[]" id="pression_id" value="{{$val->id}}"
                               class="press">{{$val->pname}}
                        <?php } ?>
                    @endforeach
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
    <script>
        function sub() {

            var role=$("input[name='role']").val()
            var pre=$("input:checkbox[id='pression_id']:checked").val()
            if(role==null || pre==undefined){
                alert('有某项未输入')
                return false
            }
            return true
        }
    </script>
@endsection

