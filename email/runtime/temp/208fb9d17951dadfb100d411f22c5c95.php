<?php /*a:1:{s:56:"E:\PHP\web\email\application\index\view\index\index.html";i:1582876977;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>某某公司客户管理系统|用户登录</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/static/css/font-awesome/css/font-awesome.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="/static/css/Ionicons/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="/static/dist/css/AdminLTE.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="/static/plugins/iCheck/square/blue.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">账号登录</p>
        <form  class="layui-form">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="输入登录账号" name="userNumber" id="number">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="输入登录密码" name="userPwd" id="pwd">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span style="color: red;display: none;">用户账号不正确!</span>
            </div>
            <div class="row">
                <div class="col-xs-12" style="text-align:center;">
                    <button type="submit" class="btn btn-primary btn-block btn-flat submitDate">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script type="text/javascript" src="/static/css/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="/static/css/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script type="text/javascript" src="/static/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript">


    layui.use(['element', 'form', 'laydate', 'laypage', 'layer', 'laytpl', 'layedit'], function() {
        var element = layui.element;
        var form = layui.form;
        var laydate = layui.laydate;
        var laypage = layui.laypage;
        var layer = layui.layer;
        var laytpl = layui.laytpl;
        var layedit = layui.layedit;


        //添加 编辑
        $(document).on('click','.submitDate',function(){
            var number = $("#number").val();
            var pwd = $("#pwd").val();
            if(number.length != 10 || number == ''){
                alert("账号为十位数字或字母组合");
            }
            if(pwd == ''){
                alert("密码不能为空");
            }

            var param = {
                number: number,
                pwd: pwd
            };

            var str11 = JSON.stringify(param);
            console.log(str11);
            $.post('/user/checkLoginTwo', param).then(function (resp) {
                var str = JSON.stringify(resp);
                console.log(str);
                if(resp.code == 2){
                    var url = "http://" + window.location.host + "/assess/index.html";
                    window.location.replace(url);
                }else{
                    alert(resp.msg);
                    history.go(0);
                }
            });

        })

    })

</script>
</body>
</html>
