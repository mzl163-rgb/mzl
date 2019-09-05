@include('admin/admin_heder')
<body>

<form class="layui-form layui-form-pane1" action="login_if" method="post" lay-filter="first">
    <div class="layui-form-item">
        <label class="layui-form-label">username</label>
        <div class="layui-input-block">
            <input type="text" name="name" lay-verify="required|title" lay-reqText="导航名称不能为空" required placeholder="请输入username" autocomplete="off" class="layui-input" >
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">userpwd</label>
        <div class="layui-input-block">
            <input type="text" name="pwd" lay-verify="required|title" lay-reqText="导航url不能为空" autocomplete="off" placeholder="请输入userpwd" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <center>
                <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </center>
        </div>
    </div>
</form>

<br><br><br>


<script src="../src/layui.js"></script>
<!-- <script src="../build/lay/dest/layui.all.js"></script> -->



@include('admin/admin_foot')
