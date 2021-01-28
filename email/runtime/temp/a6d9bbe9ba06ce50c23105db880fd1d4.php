<?php /*a:2:{s:57:"E:\PHP\web\email\application\admin\view\assess\index.html";i:1582893422;s:51:"E:\PHP\web\email\application\admin\view\layout.html";i:1582895148;}*/ ?>
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

                    <div class="layui-col-md6">
                        <label class="layui-form-label" >院系选择：</label>
                        <div class="layui-input-inline">
                            <select name="yard" id="yard" lay-filter='yard'>
                                <option value="">请选择院</option>
                                <?php if(is_array($yards) || $yards instanceof \think\Collection || $yards instanceof \think\Paginator): $i = 0; $__LIST__ = $yards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yard): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($yard['id']); ?>"><?php echo htmlentities($yard['name']); ?>
                                </option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <select name="system" id="system">
                                <option value="">请选择系</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-col-md3" style="text-align: right">
                        <label class="layui-inline" >学生姓名：</label>
                        <div class="layui-input-inline" style="margin-left: -4px; margin-top: -1px;">
                            <input type="text" class="layui-input search-text" id="stu_name">
                        </div>
                        <div class="layui-input-inline">
                            <a href="javascript:;" class="layui-btn search-btn" id="search">搜索</a>
                        </div>
                    </div>

                    <div class="layui-col-md3" style="text-align: right">
                        <div class="layui-input-inline">
                            <a href="javascript:;" class="layui-btn score-btn" id="score">计算成绩</a>
                        </div>
                    </div>

                </div>
            </div>
            <table class="layui-table" id="dataList">
                <thead>
                <tr>
                    <th>院</th>
                    <th>系</th>
                    <th>学生姓名</th>
                    <th>实习类型</th>
                    <th>实习基地</th>
                    <th>实习基地容纳量</th>
                    <th>是否有人指导</th>
                    <th>一个人指导几个学生</th>
                    <th>实习开始时间</th>
                    <th>实习结束时间</th>
                    <th>日记日期</th>
                    <th>实习日记内容</th>
                    <th>评价分数</th>
                    <th>日记分数</th>
                    <th>最终成绩</th>
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

        //院系联动
        form.on('select(yard)', function(data){
            var yardId=data.elem.value;
            $.post('system',{
                yardId:yardId
            },function (result) {
                html = "<option value='0'>请选择系</option>";
                $(result).each(function (i) {
                    html +="<option value='"+this.id+"'>"+this.name+"</option>"
                });
                $('#system').html(html);
                form.render('select'); //这个很重要
            });
        });

        //计算成绩
        $(document).on('click', '.score-btn', function () {
            $.post('scoreDate', {}).then(function (resp) {
                var str55 = JSON.stringify(resp);
                console.log(str55);
                if(resp.code == 200){
                   var con =  '<strong>成绩构成=实习日记50%+评价指标50%<br>您的成绩为：其中实习日记（'+resp.score+'）分，评价指标（'+resp.total+'）分，折合后的分数为（'+resp.grade+'）<br>实习期内您的表现不错，但还有进步的空间，加油！</strong>';
                    layer.open({
                        title: '<strong>最终成绩</strong>'
                        ,content: con
                    });
                }else{
                    alert(resp.msg);
                }

            });
        });

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
            var yard = $("#yard").find("option:selected").val();
            var system = $("#system").find("option:selected").val();
            var stu_name = $("#stu_name").val();
            $.post('indexList', {
                'yard_id' : yard,
                'system_id' : system,
                'stu_name' : stu_name
            }).then(function (resp) {
                var str = JSON.stringify(resp);
                console.log(str);
                var html = "";
                $(resp).each(function (i) {
                    html += "<tr>";
                    html +="<td>"+this.yard_name+"</td>";
                    html +="<td>"+this.system_name+"</td>";
                    html +="<td>"+this.stu_name+"</td>";
                    html +="<td>"+this.internship_type+"</td>";
                    html +="<td>"+this.base_type+"</td>";
                    html +="<td>"+this.volume+"</td>";
                    if(this.has_guide == 1){
                        html +="<td>是</td>";
                    }else{
                        html +="<td>否</td>";
                    }
                    html +="<td>"+this.count+"</td>";
                    html +="<td>"+this.starttime+"</td>";
                    html +="<td>"+this.endtime+"</td>";
                    html +="<td>"+this.date+"</td>";
                    html +="<td>"+this.content+"</td>";
                    html +="<td>"+this.score+"</td>";
                    html +="<td>"+this.total+"</td>";
                    html +="<td>"+this.grade+"</td>";
                    html +='<td><span id="data_id" style="display: none;">'+this.id+'</span>';
                    // html +='<a href="<?php echo url('admin/Assess/read', ['id' => 13]); ?>">' ;
                    html +='<a href="./get/'+this.id+'.html">' ;
                    html +='<span style="color: #f39c12;">详情</span></a><br><a href="" class="del-btn"><span style="color: #dd4b39;" >删除</span></a></td>';
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
