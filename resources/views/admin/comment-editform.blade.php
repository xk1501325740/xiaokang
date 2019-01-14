<?php
/**
 * Created by PhpStorm.
 * User: ccn
 * Date: 2019/1/11
 * Time: 21:18
 */?>
@extends('app')
@section('') @show
@section('button1')
    @parent
    <h3>所评商品: <i style="color: red" > {{$list[0]->goods_name}}</i></h3>
    <input type="hidden" name="goodsid" value="{{$list[0]->goods_id}}" >
    <input type="hidden" id="uname" value="{{$list[0]->user_id}}">
    <div class="layui-fluid layadmin-message-fluid">
        <div class="layui-row">
            <div class="layui-col-md12">
                <form class="layui-form">
                    <div class="layui-form-item layui-form-text">
                        <div class="layui-input-block">
                            <textarea   placeholder="请输入内容"  class="layui-textarea" id="content" ></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item" style="overflow: hidden;">
                        <div class="layui-input-block layui-input-right">
                            <span class="layui-btn" lay-submit lay-filter="formDemo" id="addcomment" >发表</span>
                        </div >

                        <div class="layadmin-messag-icon">
                            <a href="javascript:;"><i class="layui-icon layui-icon-face-smile-b"></i></a>




                                <input type="file" name="cimgs"  id="cimgs" style="display:none" multiple="multiple">
                                <a href="javascript:;" onclick="selectFile()" ><i class="layui-icon layui-icon-picture"></i></a>



                            <a href="javascript:;"><i class="layui-icon layui-icon-link"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="layui-col-md12 layadmin-homepage-list-imgtxt message-content" id="div1">
                @foreach($list as $v)
                      <div class="media-body">
                    <a href="javascript:;" class="media-left" style="float: left;">
                        <img src="" height="46px" width="46px">
                    </a>
                    <div class="pad-btm">
                        <p class="fontColor"><a href="javascript:;">{{$v->username}}</a></p>
                        <p>发表时间：{{date("Y-m-d H:i:s",$v->c_time) }}</p>
                        <p class="min-font">
              <span class="layui-breadcrumb" lay-separator="-">
                <a href="javascript:;" class="layui-icon layui-icon-cellphone"></a>
                <a href="javascript:;">从移动</a>
                <a href="javascript:;">11分钟前</a>
              </span>
                        </p>
                    </div>
                    <p class="message-text">{{$v->content}}</p>
                    <button class="layui-btn layui-btn-primary layui-btn-sm">回复</button>
                </div>
                @endforeach
                <div class="layui-row message-content-btn">
                    <a href="javascript:;" class="layui-btn">更多</a>
                </div>
            </div>

        </div>
    </div>
    <script>
        function selectFile(){
            $("#cimgs").trigger("click");
        }
        $("#addcomment").click(function () {
            var cimgs=document.getElementById('cimgs').files[0];
                var content=$("#content").val()
                var uname=$("#uname").val()
                var goods=$("input[name='goodsid']").val();
                var fd = new FormData();
                fd.append('content',content);
                fd.append('goods',goods);
                fd.append('uname',uname);
                fd.append('cimgs',cimgs);
                $.ajax({
                    method:'post',
                    url:"{{url('admin/comment-edit')}}",
                    data:fd,
                    processData:false,
                    contentType:false,
                    success:function (e) {
                         if(e.code==0){
                                alert('评论成功');
                                history.go(0)
                         }
                    },
                    error:function () {
                        alert('上传图片')
                    }
                })

        })


    </script>


@endsection

