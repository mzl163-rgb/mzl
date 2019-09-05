@include('admin/admin_heder')

<br><br><br>

<table class="layui-hide" id="demo" lay-filter="test"></table>

<script type="text/html" id="barDemo">
    {{--<a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>--}}
    <a class="layui-btn layui-btn-xs" lay-event="update">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>




<script>
    layui.config({
        version: '1560414887155' //为了更新 js 缓存，可忽略
    });

    layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element', 'slider'], function(){
        var laydate = layui.laydate //日期
            ,laypage = layui.laypage //分页
            ,layer = layui.layer //弹层
            ,table = layui.table //表格
            ,carousel = layui.carousel //轮播
            ,upload = layui.upload //上传
            ,element = layui.element //元素操作
            ,slider = layui.slider //滑块

        //向世界问个好
        layer.msg('Hello World');



        //执行一个 table 实例
        table.render({
            elem: '#demo'
            ,height: 420
              ,url: 'http://www.lgc.com/admin/nv_show' //数据接口
            ,title: '用户表'
            ,page: true //开启分页
            ,toolbar: 'default' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
            ,totalRow: true //开启合计行
            ,cols: [[ //表头
                {type: 'checkbox', fixed: 'left'}
                ,{field: 'id', title: 'ID', width:80}
                ,{field: 'name', title: '导航名称', width:80}
                ,{field: 'url', title: '导航url', width: 90}
                ,{field: 'pid', title: '导航父级ID', width:80}
                ,{field: 'order', title: '显示排序', width: 80}
                ,{field: 'created_at', title: '创建时间', width:150}
                ,{field: 'updated_at', title: '修改时间', width: 200}
                 // ,{field: 'classify', title: '职业', width: 100}
                 // ,{field: 'wealth', title: '财富', width: 135, sort: true, totalRow: true}
                ,{fixed: 'right', width: 165, align:'center', toolbar: '#barDemo'}
            ]]
            //data: [{"id":10000,"username":"user-0","sex":"女","city":"城市-0","sign":"签名-0","experience":255,"logins":24,"wealth":82830700,"classify":"作家","score":57},{"id":10001,"username":"user-1","sex":"男","city":"城市-1","sign":"签名-1","experience":884,"logins":58,"wealth":64928690,"classify":"词人","score":27},{"id":10002,"username":"user-2","sex":"女","city":"城市-2","sign":"签名-2","experience":650,"logins":77,"wealth":6298078,"classify":"酱油","score":31},{"id":10003,"username":"user-3","sex":"女","city":"城市-3","sign":"签名-3","experience":362,"logins":157,"wealth":37117017,"classify":"诗人","score":68},{"id":10004,"username":"user-4","sex":"男","city":"城市-4","sign":"签名-4","experience":807,"logins":51,"wealth":76263262,"classify":"作家","score":6},{"id":10005,"username":"user-5","sex":"女","city":"城市-5","sign":"签名-5","experience":173,"logins":68,"wealth":60344147,"classify":"作家","score":87},{"id":10006,"username":"user-6","sex":"女","city":"城市-6","sign":"签名-6","experience":982,"logins":37,"wealth":57768166,"classify":"作家","score":34},{"id":10007,"username":"user-7","sex":"男","city":"城市-7","sign":"签名-7","experience":727,"logins":150,"wealth":82030578,"classify":"作家","score":28},{"id":10008,"username":"user-8","sex":"男","city":"城市-8","sign":"签名-8","experience":951,"logins":133,"wealth":16503371,"classify":"词人","score":14},{"id":10009,"username":"user-9","sex":"女","city":"城市-9","sign":"签名-9","experience":484,"logins":25,"wealth":86801934,"classify":"词人","score":75}]
            ,page: true //是否显示分页
            ,limits: [3,5,10]
            ,limit: 3 //每页默认显示的数量
        });

        //监听头工具栏事件
        table.on('toolbar(test)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id)
                ,data = checkStatus.data; //获取选中的数据
            switch(obj.event){
                case 'add':
                    layer.msg('添加');
                    break;
                case 'update':
                    if(data.length === 0){
                        layer.msg('请选择一行');
                    } else if(data.length > 1){
                        layer.msg('只能同时编辑一个');
                    } else {
                        layer.alert('编辑 [id]：'+ checkStatus.data[0].id);
                    }
                    break;
                case 'delete':
                    if(data.length === 0){
                        layer.msg('请选择一行');
                    } else {
                        layer.msg('删除');
                    }
                    break;
            };
        });

        //监听行工具事件
        table.on('tool(test)', function(obj){ //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            var data = obj.data //获得当前行数据
                ,layEvent = obj.event; //获得 lay-event 对应的值
            if(layEvent === 'detail'){
                layer.msg('查看操作');
            } else if(layEvent === 'del'){
                layer.confirm('真的删除行么', function(index){
                    // var id = obbj.data['id'];
                    // console.log(id);
                    // $.ajax({
                    //    url:"/del",
                    //     type:"post",
                    //     dataType:"json",
                    //     data:"id="+id,
                    //     success:function(e){
                    //        if(e==1){
                    //
                    //            layer.msg('删除成功');
                    //            obj.del(); //删除对应行（tr）的DOM结构
                    //             layer.close(index);
                    //        }else{
                    //            layer.msg('删除失败');
                    //        }
                    //     }
                    // });
                    $.get("del?id="+obj.data.id , function (e) {
                        if(e)
                        {
                            layer.msg('成功');
                        }
                        else
                        {
                            layer.msg('失败');
                        }
                    });
                    console.log(obj);
                    obj.del(); //删除对应行（tr）的DOM结构
                    layer.close(index);
                    //向服务端发送删除指令
                });
            } else if(layEvent === 'update'){
                layer.msg('编辑操作');

                     var id = obbj.data.id;
                    location.href="nv_update?id="+id;
                // $.get("nv_update?id="+obj.data.id,function(e){
                //
                // })
            }
        });




        //分页
        laypage.render({
            elem: 'pageDemo' //分页容器的id
            ,count: 10 //总页数
            ,skin: '#1E9FFF' //自定义选中色值
            //,skip: true //开启跳页
            ,jump: function(obj, first){
                if(!first){
                    layer.msg('第'+ obj.curr +'页', {offset: 'b'});
                }
            }
        });



        //底部信息
        // var footerTpl = lay('#footer')[0].innerHTML;
        // lay('#footer').html(layui.laytpl(footerTpl).render({}))
        //     .removeClass('layui-hide');
    });
</script>

<br><br><br>

@include('admin/admin_foot')



