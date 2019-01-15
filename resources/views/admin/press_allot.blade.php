@extends('app')
@section('') @show
@section('biaoti', '权限分配')
@section('button1')
    @parent
        <form action="{{url('admin/pallot')}}" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

                <tr>
                    <td width="80" align="right">角色选择</td>
                    <td>
                        <select name="roleid" id="role">
                            <option value=""><--请选择--></option>
                            @foreach($role as $val)
                                <option value="{{$val->id}}">{{$val->role}}</option>
                                @endforeach
                        </select>
                        <button class="layui-btn-xs layui-btn-normal"><a href="{{url('admin/role_prefor')}}">角色添加</a></button>
                    </td>
                </tr>
                <tr>
                    <td align="right">父级权限</td>
                    <td>
                        @foreach($pression as $key=>$val)
                            <input type="checkbox" name="pression_id[]"  value="{{$val->id}}"  class="press">{{$val->pname}}
                        <?php if($val->parent==0) { ?>
                            <br>
                        <?php }  ?>
                            <?php if($val->parent==$val->id) { ?>
                               <input type="checkbox" name="pression_id[]" value="{{$val->id}}"
                               class="press">{{$val->pname}}
                            <?php } ?>
                        @endforeach

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="token" value="b9439ae8" />
                        <input type="hidden" name="cat_id" value="" />
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#role").change(function () {
                //text 下拉框外部值     val 下拉框框内值
              var roleval=$("#role option:selected").val();
              $.ajax({
                  method:"post",
                  url:"{{url('admin/pression-che')}}",
                  data:{
                      roleval:roleval
                  }
                  }).done(function (e) {
                    // console.log(e[0].pression_id)
                   var preval=e[0].pression_id
                   $(preval.split(",")).each(function (key,val) {
                       $("input[name='pression_id[]'][value='"+val+"']").prop("checked",true);
                   })
              })
            })

        })


    </script>
@endsection

