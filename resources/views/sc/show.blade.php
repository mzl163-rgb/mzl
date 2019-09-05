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
         <h1>欢迎游客12142424进入聊天室</h1>
         <br><br><br><br>
           <table>
               @foreach($data as $k =>$v)
               <tr>
                     <td><?php echo $v->text?></td>
               </tr>
                   @endforeach
           </table>
         <form action="show1" method="post">
             <input type="text" name="text"><input type="submit" value="回复"><br>
         </form>


</body>
</html>