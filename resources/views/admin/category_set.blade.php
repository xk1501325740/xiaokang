@extends('app')

@section('') @show
@section('biaoti', '分类修改')

@section('button1')
@parent

<div id="urHere">DouPHP 管理中心<b>></b><strong>修改分类</strong> </div>   <div class="mainBox" style="height:auto!important;
height:550px;min-height:550px;">
    <h3><a href="article_category.html" class="actionBtn">修改分类</a>修改分类</h3>
    <form action="{{ URL::asset('admin/set_sub') }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="80" align="right">分类名称</td>
                <td>
                    <input type="text" name="category_name" value="{{$one[0]->category_name}}" size="40"
                           class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">分类编码</td>
                <td>
                    <input type="text" name="category_code" value="{{$one[0]->category_code}}" size="40"
                           class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">上级分类</td>
                <td>
                    <select name="parent_id">
                        <option value="0">父级</option>
                        @foreach($all as $k => $v )
                            <option value="{{$v['category_id']}}">{{str_repeat('--',$v['category_level'])}}
                                {{$v['category_name']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">层级</td>
                <td>
                    <input type="text" name="category_level" value="{{$one[0]->category_level}}" size="40"
                           class="inpMain" />
                </td>
            </tr>
            <tr>
                <td align="right">状态</td>
                <td>
                    <input type="text" name="category_status" value="{{$one[0]->category_status}}" size="40"
                           class="inpMain" />
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

@endsection
