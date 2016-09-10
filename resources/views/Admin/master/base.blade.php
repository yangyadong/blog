<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <title>我的网站~{{$title}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{asset('/assets')}}/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/dataTables.bootstrap.css" rel="stylesheet"/>
    <!--Beyond styles-->
    <link href="{{asset('/assets')}}/css/beyond.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/demo.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/typicons.min.css" rel="stylesheet"/>
    <link href="{{asset('/assets')}}/css/animate.min.css" rel="stylesheet"/>

    <!--引入css文件-->
    @yield("style")

</head>
<!-- /Head -->
<!-- Body -->
<body>
<div class="loading-container">
    <div class="loading-progress">
        <img src="{{asset('/assets')}}/img/loading.gif">
    </div>
</div>

<!---------提示信息模态框------------------>
<!--Success Modal Templates-->
<div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title">Success</div>

            <div class="modal-body">You have done great!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>
<!--End Success Modal Templates-->
<!--Info Modal Templates-->
<div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd got mail!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>
<!--End Info Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd done bad!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>
<!--End Danger Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-warning" class="modal modal-message modal-warning fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Warning</div>

            <div class="modal-body">Is something wrong?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>
<!---------------end------------------------->

<!-- Navbar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="{{asset('Admin')}}/image/2.jpg" alt=""/>
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings --->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="wave in dropdown-toggle" data-toggle="dropdown" title="访客留言" href="#">
                                <i class="icon fa fa-envelope"></i>
                                <span class="badge">
                                    0
                                </span>
                            </a>
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                <li class="dropdown-header bordered-darkorange">
                                    <i class="fa fa-tasks"></i>
                                    未来三天内没有活动安排哦！
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div style="border-left:none;" class="avatar" title="View your public profile">
                                    <img id="pthoto" src="{{asset('Admin')}}{{$Admin_info->photo}}">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>{{$Admin_info->name}}您好！</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <div class="row fileupload-buttonbar">
                                            <img id="picture_show" style="height: 125px;width: 125px;"
                                                 src="{{asset('Admin')}}{{$Admin_info->photo}}"
                                                 data-holder-rendered="true">
                                        </div>
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="{:U('Intruadit/edit_intro')}" class="pull-left">简介</a>
                                    <a href="{:U('Intruadit/aditpsw')}" class="pull-right">修改密码</a>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="{{url("Admin/login_out")}}">
                                        退出
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--在这里可以对后台的页面板式进行设置 -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                <li>
                    <a href={{url("Admin/index")}}>
                        <i class="menu-icon glyphicon glyphicon-home"></i>
                        <span class="menu-text"> 个人首页</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text" id="mangers"> 个人中心 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href={{url("Admin/write")}}>
                                <span class="menu-text">写文章</span>
                            </a>
                        </li>
                        <li>
                            <a href={{url("Admin/my_articles")}}>
                                <span class="menu-text">我的文章</span>
                            </a>
                        </li>
                        <li>
                            <a href={{url("Admin/edit_info")}}>
                                <span class="menu-text">编辑资料</span>
                            </a>
                        </li>
                        <li>
                            <a href={{url("Admin/edit_password")}}>
                                <span class="menu-text">修改密码</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text" id="mangers"> 我的资源 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href={{url("Admin/my_resource")}}>
                                <span class="menu-text">资源列表</span>
                            </a>
                        </li>
                        <li>
                            <a href={{url("Admin/update_resource")}}>
                                <span class="menu-text">上传资源</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text" id="mangers"> 事务处理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href={{url("Admin/rely")}}>
                                <span class="menu-text">访客留言</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text" id="mangers"> 系统设置 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href={{url("Admin/type_list")}}>
                                <span class="menu-text">分类列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    @yield("breadcrumb")
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Header -->
            <div class="page-header position-relative">
                <div class="header-title">
                    @yield("header")
                </div>
                <!--Header Buttons-->
                <div class="header-buttons">
                    <a class="sidebar-toggler" href="#">
                        <i class="fa fa-arrows-h"></i>
                    </a>
                    <a class="refresh" id="refresh-toggler" href="">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a>
                    <a class="fullscreen" id="fullscreen-toggler" href="#">
                        <i class="glyphicon glyphicon-fullscreen"></i>
                    </a>
                </div>
                <!--Header Buttons End-->
            </div>
            <!-- /Page Header -->
            <!-- Page Body -->
            <div class="page-body">
                <!-- Your Content Goes Here -->
                @yield("content")
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Container -->
    <!-- Main Container -->
</div>
<!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
<script src="{{asset('/assets')}}/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="{{asset('/assets')}}/js/jquery-2.0.3.min.js"></script>
<script src="{{asset('/assets')}}/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->
<script src="{{asset('/assets')}}/js/beyond.min.js"></script>
<script src="{{asset('/assets')}}/js/datatable/jquery.dataTables.min.js"></script>
<script src="{{asset('/assets')}}/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/assets')}}/js/datetime/moment.js"></script>
<script src="{{asset('/assets')}}/js/datetime/daterangepicker.js"></script>
<script src="{{asset('/assets')}}/js/bootbox/bootbox.js"></script>
<script src="{{asset('/assets')}}/js/validation/bootstrapValidator.js"></script>
<script src="{{asset('/assets')}}/js/fullcalendar/fullcalendar.js"></script>
<script src="{{asset('Admin')}}/js/base.js"></script>
@yield("script")
</body>
<!--  /Body -->
</html>
