<?php /*a:2:{s:55:"E:\PHP\web\email\application\admin\view\posts\read.html";i:1582900218;s:51:"E:\PHP\web\email\application\admin\view\layout.html";i:1582895148;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>评教管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/Ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/dist/css/AdminLTE.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/dist/css/skins/_all-skins.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap-daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="/static/css/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/layer/layer.js"></script>
    <script type="text/javascript" src="/static/common/delCommon.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap-daterangepicker/daterangepicker.css" />
    <![endif]-->

    <!-- Google Font -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><?php echo htmlentities(app('config')->get('app_name')); ?></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?php echo htmlentities(app('config')->get('app_name')); ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class=" ">
                        <a href="<?php echo url('index/Index/loginOut'); ?>" >
                            <span class="hidden-xs">登出</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview" id="userCreate">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>用户管理</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo url('admin/Admin/create'); ?>"><i class="fa fa-circle-o"></i>用户创建</a></li>
                        <li><a href="<?php echo url('admin/Admin/index'); ?>"><i class="fa fa-circle-o"></i> 用户列表</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>日记管理</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo url('admin/Assess/create'); ?>"><i class="fa fa-circle-o"></i>日记创建</a></li>
                        <li><a href="<?php echo url('admin/Assess/index'); ?>"><i class="fa fa-circle-o"></i> 日记列表</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>贴吧管理</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo url('admin/Posts/create'); ?>"><i class="fa fa-circle-o"></i>帖子创建</a></li>
                        <li><a href="<?php echo url('admin/Posts/index'); ?>"><i class="fa fa-circle-o"></i> 帖子列表</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
<section class="content-header">
    <h1>
        日记管理
        <small>日记详情编辑</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" class="layui-form">
                    <div class="box-body">

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">标题：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="form-control" placeholder="" id="title" disabled >
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">院系选择：</label>
                            <div class="layui-input-inline"  >
                                <input type="text" class="form-control" placeholder="" id="yard" disabled >
                        </div>
                            <div class="layui-input-inline" >
                                <input type="text" class="form-control" placeholder="" id="system" disabled >
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">内容：</label>
                            <div class="layui-input-inline" id="contentReply">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">评论：</label>

                            <ul class="ft clearfix" style="width: 865px;" id="reply">
                            </ul>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">回帖：</label>
                            <div class="layui-col-md9">
                                <textarea id="content" name="content" style="display: none;"></textarea>
                            </div>
                        </div>

                        <div class="layui-form-item" style="text-align: center;">
                            <button type="submit" class="layui-btn submitDate">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- 配置文件 -->
<script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">


    layui.use(['element', 'form', 'laydate', 'laypage', 'layer', 'laytpl', 'layedit'], function() {
        var element = layui.element;
        var form = layui.form;
        var laydate = layui.laydate;
        var laypage = layui.laypage;
        var layer = layui.layer;
        var laytpl = layui.laytpl;
        var layedit = layui.layedit;
        var posts_id;

        var index = layedit.build('content'); //建立编辑器

        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1, url.length-5);
        //详情
        detail();
        function detail(){
            $.post('/posts/detail', {
                'id' : id
            }).then(function (resp) {
                var data = resp.msg[0];
                var result = resp.lists;
                var str11 = JSON.stringify(data);
                console.log(str11);
                posts_id = data.id;
                $("#title").val(data.title);
                $("#yard").val(data.yard_name);
                $("#system").val(data.system_name);;
                $("#contentReply").html(data.content);

                var html = '';
                $(result).each(function (i) {
                    html += '<li style="height: 30px;font-size: 15px;margin-left: 178px;"><span class="b">匿名回复：</span>'+this.content+'</li>';

                });
                $('#reply').html(html);

                form.render(); //这个很重要

            });
        }


        //添加 编辑
        $(document).on('click','.submitDate',function(){
            var content = layedit.getContent(index);
            $.post('/posts/reply', {
                posts_id: posts_id,
                content: content
            }).then(function (resp) {
                if(resp.code == 200){
                    alert(resp.msg);
                    history.go(0);
                }else{
                    alert(resp.msg);
                    history.go(0);
                }
            });

        })



    })

</script>

<style type="text/css">


</style>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>
</div>
<script type="text/javascript" src="/static/css/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="/static/css/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/dist/js/adminlte.min.js"></script>
</body>
</html>

<script type="text/javascript">
    var identity = getCookie("identity");
    if(identity == 2){
        document.getElementById("userCreate").style.visibility="hidden";
    }

    // 获取指定名称的cookie
    function getCookie(name){
        var strcookie = document.cookie;//获取cookie字符串
        var arrcookie = strcookie.split("; ");//分割
        //遍历匹配
        for ( var i = 0; i < arrcookie.length; i++) {
            var arr = arrcookie[i].split("=");
            if (arr[0] == name){
                return arr[1];
            }
        }
        return "";
    }

</script>
