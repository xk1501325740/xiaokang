<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 19:09
 */?>
@extends('app')
@section('') @show
@section('button1')
    @parent


        <h3><a href="manager.html" class="actionBtn">返回列表</a>评论列表</h3>
            <div class="filter">
                <form action="article.php" method="post">
                    <select name="cat_id">
                        <option value="0">评价</option>
                        <option value="1"> 好评</option>
                        <option value="2"> 差评</option>
                    </select>
                    <select name="cat_id">
                        <option value="0">审核</option>
                        <option value="1"> 已审核</option>
                        <option value="2"> 未审核</option>
                    </select>
                    <select name="cat_id">
                        <option value="0">图片</option>
                        <option value="1"> 有图</option>
                        <option value="2"> 无图</option>
                    </select>
                    <input name="submit" class="btnGray" type="submit" value="筛选" />
                </form>
                <span>
        </span>
            </div>
            <div id="list">
                <form name="action" method="post" action="article.php?rec=action">
                    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                        <tr>
                            <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                            <th width="40" align="center">编号</th>
                            <th width="80" align="center">评论人</th>
                            <th width="80" align="center">所评商品</th>
                            <th width="80" align="center">评论内容</th>
                            <th width="80" align="center">评论图片</th>
                            <th width="80" align="center">评论等级</th>
                            <th width="80" align="center">评论时间</th>
                            <th width="22" align="center">审核状态</th>
                            <th width="80" align="center">操作</th>
                        </tr>
                        @foreach($list as $key=>$val)
                            <tr>
                                <td align="center"><input type="checkbox" name="checkbox[]" value="{{$val->id}}" /></td>
                                <td align="center">{{$key+1}}</td>
                                <td align="center">{{$val->username}}</td>
                                <td><a href="article.php?rec=edit&id=10">{{$val->goods_name}}？</a></td>
                                <td align="center"><a href="article.php?cat_id=1">{{ trim($val->content) }}</a></td>
                                <td align="center">{{$val->c_img}}</td>
                                <td align="center"> @if($val->c_rate==2)好评@elseif($val->c_rate==1)中评@else 差评 @endif </td>
                                <td align="center">{{ date("Y-m-d H:i:s",$val->c_time) }}</td>
                                <td align="center">{{ $val->status==0?'已审核':'未审核' }}</td>
                                <td align="center">
                                    <a href=" {{url("admin/comment-editform")}}?commod={{$val->commod_id}} ">查看</a> | <a href="article.php?rec=del&id=10">删除</a>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                    <div class="action">
                        <select name="action" onchange="douAction()">
                            <option value="0">请选择...</option>
                            <option value="del_all">删除</option>
                            <option value="category_move">移动分类至</option>
                        </select>
                        <select name="new_cat_id" style="display:none">
                            <option value="0">未分类</option>
                            <option value="1"> 公司动态</option>
                            <option value="2"> 行业新闻</option>
                        </select>
                        <input name="submit" class="btn" type="submit" value="执行" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="pager">总计 10 个记录，共 1 页，当前第 1 页 | <a href="article.php?page=1">第一页</a> 上一页 下一页 <a href="article.php?page=1">最末页</a></div>           </div>


@endsection