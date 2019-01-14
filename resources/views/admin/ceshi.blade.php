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
<h>测试ajax</h>
<a href="javascript:;" id="d">点一下</a>
<a href="javascript:;" id="t">停止</a>
<form action="" method="post"></form>
</body>
</html>
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script>
   $(function () {





       $('#d').click(function () {
           var i = 1;
           var a = setInterval(function(){
            /*   $.ajax({
                   url:'ceshi1',
                   method:'post',
                   data:{name:1324}
               }).done(function (res) {
                   alert(res)
               })*/
                 i++;
            console.log(i)
           }, 1000);
           $('#t').click(function () {
              clearTimeout(a)
           })
       })

   })
</script>