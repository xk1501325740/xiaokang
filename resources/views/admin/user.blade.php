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
<h1>第一次使用larval框架--视图层</h1>
<center>
    <a href="add">添加</a>
    <a href="up">修改</a>
    <a href="del">删除</a>
    <a href="phone">文件上传</a>
    <a href="javascript:;" class="qx">全选/反选</a>
    <a href="javascript:;" class="qbx">全不选</a>
    <a href="javascript:;" class="del">批量删除</a>
<table >
    <tr>
        <td>Id</td>
        <td>名称</td>
    </tr>
    @foreach ($data as $user)
    <tr>
        <td><input type="checkbox" class="id" value=" {{ $user->id }}">{{ $user->id }}</td>
        <td> {{ $user->name }}</td>
        <td>
            <a href="add">添加</a>
            <a href="up?id={{ $user->id }}">修改</a>
            <a href="del?id={{ $user->id }}">删除</a>
        </td>

    </tr>
    @endforeach
</table>
    <a href="javascript:;" zhi="{{1}}" class="fy">首页</a>
    <a href="javascript:;" zhi="{{$zhi-1}}"  class="fy">上一页</a>
    <a href="javascript:;"  zhi="{{$zhi+1}}"  class="fy">下一页</a>
    <a href="javascript:;" zhi="{{$count}}"  class="fy">尾页</a>

</center>
</body>
</html>
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script>
    $(function () {

            $.ajax({
                url:'ceshi',
                method:'get',
            }).done(function (e) {
             alert(e)
            })



        //ajax分页
        $('.fy').click(function () {

          var zhi =  $(this).attr('zhi')
            $.ajax({
                url:'user',
                method:'get',
                data:{pa:zhi}
            }).done(function (e) {
                $('body').html(e)
            })
        })

        //全选或者反选
        $('.qx').click(function () {

            $('.id').each(function () {
                $(this).prop('checked',!$(this).prop('checked'))

            })

          
        })
        //全不选
        $('.qbx').click(function () {

            $('.id').each(function () {

                $(this).prop('checked',false)

            })
        })

        //批量删除
        $('.del').click(function () {
            var zhi = [];
            $('.id').each(function () {
                if($(this).prop('checked')){
                    zhi.push($(this).val())
                }

            })

           $.ajax({
               method:'get',
               url:'del',
               data:{id : zhi}
           }).done(function (msg) {
               alert( msg )
               history.go(0)
           })
        })
    })
</script>