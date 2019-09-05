<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>

{{--<form action="logins" method="post">--}}
    <table>
        <tr>
            <td>username</td>
            <td><input type="text" name="name" placeholder="请输入用户名"><br></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="pwd" placeholder="请输入密码"><br></td>
        </tr>
        <tr>
            <td></td>
             <td><button class="login" type="submit" value="登陆">登陆</button></td>
        </tr>
    </table>



{{--</form>        --}}
</body>
</html>
<script>
     $(".login").click(function(){
         location.href="login_list";

     });
</script>