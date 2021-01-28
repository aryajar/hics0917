<?php /*a:2:{s:58:"E:\PHP\web\email\application\admin\view\assess\create.html";i:1582881925;s:51:"E:\PHP\web\email\application\admin\view\layout.html";i:1582876405;}*/ ?>
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

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
<section class="content-header">
    <h1>
        日记管理
        <small>日记创建</small>
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

                        <div class="layui-form-item" style="text-align: center;font-weight:bold;font-size:20px">成绩构成=实习日记50%+评价指标50%</div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">院系选择：</label>
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

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">实习类型：</label>
                            <div class="layui-input-inline">
                                <select name="internship_type" id="internship_type">
                                    <option value="假期社会实践">假期社会实践</option>
                                    <option value="假期实习">假期实习</option>
                                    <option value="毕业实习">毕业实习</option>
                                    <option value="课程实验">课程实验</option>
                                    <option value="见习">见习</option>
                                </select>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">实习基地类型：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="form-control" placeholder="" id="base_type">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">实习基地容纳量：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="form-control" placeholder="" id="volume">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">是否有人指导：</label>
                            <!--<div class="layui-input-inline">-->
                                <input type="radio" name="has_guide" value="1" checked>有
                                <input type="radio" name="has_guide" value="2">无
                            <!--</div>-->
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">一个人指导几个学生：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="form-control" placeholder="" id="count">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">实习日期：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" id="time">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">日记日期：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" id="date">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">实习日记：</label>
                            <div class="layui-col-md9">
                                <textarea id="content" name="content" style="display: none;"></textarea>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 180px;font-weight:bold;">评价指标：</label><br>
                            <div class="layui-col-md9">
                                <span>（1）10分 实习过程是否主动、认真负责：</span>
                                <input type="radio" name="status_one" value="1" checked>是
                                <input type="radio" name="status_one" value="2">否<br>
                                <span>（2）5分 是否积极参加实习单位的业务培训：</span>
                                <input type="radio" name="status_two" value="1" checked>是
                                <input type="radio" name="status_two" value="2">否<br>
                                <span>（3）5分 业务培训成绩是否为优秀：</span>
                                <input type="radio" name="status_three" value="1" checked>是
                                <input type="radio" name="status_three" value="2">否<br>
                                <span>（4）10分 是否服从所在部门领导或负责人指挥：</span>
                                <input type="radio" name="status_four" value="1" checked>是
                                <input type="radio" name="status_four" value="2">否<br>
                                <span>（5）5分 是否能很好地将所学知识、技能应用在岗位上：</span>
                                <input type="radio" name="status_five" value="1" checked>是
                                <input type="radio" name="status_five" value="2">否<br>
                                <span>（6）5分 是否在实习指导老师的允许下能够独立完成任务：</span>
                                <input type="radio" name="status_six" value="1" checked>是
                                <input type="radio" name="status_six" value="2">否<br>
                                <span>（7）10分 是否能够按时、优质、高效地完成所分配的任务：</span>
                                <input type="radio" name="status_seven" value="1" checked>是
                                <input type="radio" name="status_seven" value="2">否<br>
                                <span>（8）10分 是否在力所能及的情况下主动承担额外的工作：</span>
                                <input type="radio" name="status_eight" value="1" checked>是
                                <input type="radio" name="status_eight" value="2">否<br>
                                <span>（9）10分 是否遵守部门内的规章制度：</span>
                                <input type="radio" name="status_nine" value="1" checked>是
                                <input type="radio" name="status_nine" value="2">否<br>
                                <span>（10）5分 是否多次请病假：</span>
                                <input type="radio" name="status_ten" value="1" checked>是
                                <input type="radio" name="status_ten" value="2">否<br>
                                <span>（11）5分 仪容仪表是否得体：</span>
                                <input type="radio" name="status_eleven" value="1" checked>是
                                <input type="radio" name="status_eleven" value="2">否<br>
                                <span>（12）10分 同学、同事关系相处是否融洽：</span>
                                <input type="radio" name="status_twelve" value="1" checked>是
                                <input type="radio" name="status_twelve" value="2">否<br>
                                <span>（13）10分 是否有不按规定迟到早退或旷工的行为：</span>
                                <input type="radio" name="status_thirteen" value="1" checked>是
                                <input type="radio" name="status_thirteen" value="2">否<br>
                            </div>
                        </div>

                        <div class="layui-form-item" style="text-align: center;">
                            <button type="submit" class="layui-btn submitDate">提交日记</button>
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

        var index = layedit.build('content'); //建立编辑器

        //日记日期
        laydate.render({
            elem: '#date' //指定元素
        });

        laydate.render({
            elem: '#time'
            ,range: true
        });

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

        //添加 编辑
        $(document).on('click','.submitDate',function(){
            var yard = $("#yard").find("option:selected").val();
            var system = $("#system").find("option:selected").val();
            var internship_type = $("#internship_type").find("option:selected").val();
            var base_type = $("#base_type").val();
            var volume = $("#volume").val();
            var has_guide = $("input[name=has_guide]:checked").val();
            var count = $("#count").val();
            var time = $('#time').val();
            var starttime = time.substring(0,11);
            var endtime = time.substring(12);
            var date = $('#date').val();
            var content = layedit.getContent(index);
            var status_one = $("input[name=status_one]:checked").val();
            var status_two = $("input[name=status_two]:checked").val();
            var status_three = $("input[name=status_three]:checked").val();
            var status_four = $("input[name=status_four]:checked").val();
            var status_five = $("input[name=status_five]:checked").val();
            var status_six = $("input[name=status_six]:checked").val();
            var status_seven = $("input[name=status_seven]:checked").val();
            var status_eight = $("input[name=status_eight]:checked").val();
            var status_nine = $("input[name=status_nine]:checked").val();
            var status_ten = $("input[name=status_ten]:checked").val();
            var status_eleven = $("input[name=status_eleven]:checked").val();
            var status_twelve = $("input[name=status_twelve]:checked").val();
            var status_thirteen = $("input[name=status_thirteen]:checked").val();

            var stt = starttime.replace('-', '/');
            var st = new Date(stt).getTime();
            var ett = endtime.replace('-', '/');
            var et = new Date(ett).getTime();
            var dtt = date.replace('-', '/');
            var dt = new Date(dtt).getTime();
            if(st > dt || et < dt){
                alert("日记日期应在实习日期区间内");
            }

            var param = {
                yard: yard,
                system: system,
                internship_type: internship_type,
                volume: volume,
                base_type: base_type,
                has_guide: has_guide,
                count: count,
                time: time,
                starttime: starttime,
                endtime: endtime,
                date: date,
                content: content,
                status_one: status_one,
                status_two: status_two,
                status_three: status_three,
                status_four: status_four,
                status_five: status_five,
                status_six: status_six,
                status_seven: status_seven,
                status_eight: status_eight,
                status_nine: status_nine,
                status_ten: status_ten,
                status_eleven: status_eleven,
                status_twelve: status_twelve,
                status_thirteen: status_thirteen
            };

            var str11 = JSON.stringify(param);
            console.log(str11);
            $.post('save', param).then(function (resp) {
                var str = JSON.stringify(resp);
                console.log(str);
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
