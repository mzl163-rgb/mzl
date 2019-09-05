
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box{
            width: 300px;
            height: 60px;
            border:3px solid #ccc;
            border-radius: 15px;
            text-align: center;
            line-height:60px;
            margin:10px;
            background-color: yellowgreen;
            float: left;
        }
    </style>
</head>
<body onload="init()">
<button onclick="start()">随机点名开始</button>
<button onclick = "end() ">随机点名结束</button>
<div id="path"></div>

</body>
<script>
    // 实现随机点名系统第一步就需要建立一个数组
    var arr = ['张轩铭','王国晓','周书同','胡嘉诚','宋明轩','马振林',
        '刘东鑫','王琪民','周海范','范旭鑫','孙日盛','孙浩','李阳','贾世勇'
        ,'丁煜','李凯','刘洲伯','赵振宇','陈文超'];
    // 设置一个索引值
    var index = -1;//这个必须要是-1的，只有这样随机点名的效果才会出现
    // 设置一个顶点事件段，用来停止用
    var time;
    //  遍历数组，能够实现简单的功能
    // 当页面初次进行加载的时候
    function nowSend() {

        if(index != -1) {
            //将上一个选中的div的背景还原
            document.getElementById("id" + index).style.backgroundColor = "gray";
        }
        //随机数
        var num = Math.floor(Math.random() * arr.length);
        index = num; //记录被选中的div的id
        //获取对应的div
        var div = document.getElementById("id" + num);
        //设置背景颜色
        div.style.backgroundColor = "red";
    }

    // 随机点名开始
    function start() {
        //    要想要】跑起来，可以直接在里面设置一个定时器
        time = setInterval('nowSend()',100);
    }
    // 随机点名结束
    function end() {
        // 可以直接在里面放一个清除定时器的
        clearInterval(time);
        alert('恭喜'+arr[index]+'中奖')
    }
    // 初始化操作
    function init() {
        //将数组显示在页面上
        for(var i = 0; i < arr.length; i++) {
            //获取父容器
            var fa = document.getElementById("path");
            //创建小div
            var div = document.createElement("div");
            //设置id属性,方便寻找
            div.id = "id" + i;
            div.className = "box"; //方便给小div设置样式
            //设置小div中显示的内容
            div.innerHTML = arr[i];
            //将小div放在父容器中
            fa.appendChild(div);
        }
    }
</script>
</html>
