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
<form action="up?id={{$data[0]->id}}" method="post">
    <table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <tr>
            <td>内容</td>
            <td><input type="text" name="name" value="{{$data[0]->name}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>
</body>
</html>