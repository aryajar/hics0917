<?php /*a:2:{s:56:"E:\PHP\web\email\application\admin\view\posts\index.html";i:1582900465;s:51:"E:\PHP\web\email\application\admin\view\layout.html";i:1582895148;}*/ ?>
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
        <small>日记列表</small>
    </h1>
</section>
<!-- Main content -->
    <div class="content">
        <div class="content-area">
            <div class="layui-row" style="margin-top: 25px;">
                <div class="layui-form">

                    <div class="layui-col-md3" style="text-align: right">
                        <label class="layui-inline" >标题：</label>
                        <div class="layui-input-inline" style="margin-left: -4px; margin-top: -1px;">
                            <input type="text" class="layui-input search-text" id="title">
                        </div>
                        <div class="layui-input-inline">
                            <a href="javascript:;" class="layui-btn search-btn" id="search">搜索</a>
                        </div>
                    </div>

                </div>
            </div>
            <table class="layui-table" id="dataList">
                <thead>
                <tr>
                    <th>院</th>
                    <th>系</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="registerList">


                </tbody>
            </table>
        </div>
    </div>

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


        //删除
        $(document).on('click', '.del-btn', function () {
            var id = document.getElementById('data_id').innerHTML;
            $.post('del', {
                'id' : id
            }).then(function (resp) {
                console.log(resp);
                alert("删除成功");

            });
        });

        var identity = getCookie("identity");

        sellerList();

        function sellerList(){
            var title = $("#title").val();
            $.post('indexList', {
                'title' : title
            }).then(function (resp) {
                var str = JSON.stringify(resp);
                console.log(str);
                var html = "";
                $(resp).each(function (i) {
                    html += "<tr>";
                    html +="<td>"+this.yard_name+"</td>";
                    html +="<td>"+this.system_name+"</td>";
                    html +="<td>"+this.title+"</td>";
                    html +="<td>"+this.content+"</td>";
                    html +='<td><span id="data_id" style="display: none;">'+this.id+'</span>';
                    html +='<a href="./get/'+this.id+'.html">' ;
                    html +='<span style="color: #f39c12;">详情</span></a>';
                    if(identity == 1){
                        html += "<br><a href=\"\" class=\"del-btn\"><span style=\"color: #dd4b39;\" >删除</span></a>";
                    }
                    html += "</td>";
                    html += "</tr>";
                });
                $('#registerList').html(html);
                form.render();

            });
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

        $(document).on('click', '#search', function () {
            sellerList();
        })

    })
</script>


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
