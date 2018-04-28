 <!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $_config['webname'] ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/back/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/back/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/back/css/fullcalendar.css" />
    <link rel="stylesheet" href="/back/css/matrix-style.css" />
    <link rel="stylesheet" href="/back/css/matrix-media.css" />
    <link rel="stylesheet" href="/back/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/back/css/jquery.gritter.css" />
    <link rel="stylesheet" href="/back/css/uniform.css" />
    <link rel="stylesheet" href="/back/css/select2.css" />
    <link rel="stylesheet" href="/css/bootstrap-pager.css" />
    <script src="/js/excanvas.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/sweetalert/sweetalert/sweetalert.min.js"></script>
</head>
<body>
 <!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">电力后台 Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
                <span class="text">欢迎 <?= $admin['username'] ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> 个人详情</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> 发布通知</a></li>
                <li class="divider"></li>
                <li>
                    <?php echo $this->tag->linkTo(array('/backend/index/loginout', '<i class=\'icon-key\'></i> 退出')) ?>
                </li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="/backend/system/index"><i class="icon icon-cog"></i> <span class="text">系统配置</span></a></li>
        <li class="">
            <?php echo $this->tag->linkTo(array('/backend/index/loginout', '<i class=\'icon icon-share-alt\'></i> <span class=text>退出</span>', 'title' => 'Logout')) ?>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 管理菜单</a>
    <ul>
        <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>管理菜单</span></a> </li>
        <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>签到</span><span class="label label-important">5</span></a> </li>
        <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>员工管理</span><span class="label label-important">5</span></a> </li>
        <li><a href="/backend/pole/index"><i class="icon icon-th"></i> <span>塔杆管理</span><span class="label label-important">5</span></a></li>
        <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>通知</span></a></li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>数据分析</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="form-common.html">塔杆地图</a></li>
                <li><a href="form-validation.html">签到统计</a></li>
                <li><a href="form-wizard.html">数据汇总</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>管理员管理</span> <span class="label label-important">5</span></a>
            <ul>
                <li><a href="index2.html">增加管理员</a></li>
                <li><a href="gallery.html">修改管理员</a></li>

            </ul>
        </li>
   <!--     <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
            <ul>
                <li><a href="error403.html">Error 403</a></li>
                <li><a href="error404.html">Error 404</a></li>
                <li><a href="error405.html">Error 405</a></li>
                <li><a href="error500.html">Error 500</a></li>
            </ul>
        </li>-->
<!--        <li class="content"> <span>Monthly Bandwidth Transfer</span>
            <div class="progress progress-mini progress-danger active progress-striped">
                <div style="width: 77%;" class="bar"></div>
            </div>
            <span class="percent">77%</span>
            <div class="stat">21419.94 / 14000 MB</div>
        </li>
        <li class="content"> <span>Disk Space Usage</span>
            <div class="progress progress-mini active progress-striped">
                <div style="width: 87%;" class="bar"></div>
            </div>
            <span class="percent">87%</span>
            <div class="stat">604.44 / 4000 MB</div>
        </li>-->
    </ul>
</div>
<!--sidebar-menu-->
 <?= $this->getContent() ?>
 
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; <a href="<?php echo  $_config['tecurl']?>" target="_blank" title="<?php echo  $_config['tec']?>"><?php echo  $_config['tec']?></a> </div>
</div>
<!--end-Footer-part-->

<script src="/js/jquery.ui.custom.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.flot.min.js"></script>
<script src="/js/jquery.flot.resize.min.js"></script>
<script src="/js/jquery.peity.min.js"></script>
<script src="/js/fullcalendar.min.js"></script>
<script src="/js/matrix.js"></script>
<script src="/js/matrix.dashboard.js"></script>
<script src="/js/jquery.gritter.min.js"></script>
<script src="/js/matrix.interface.js"></script>
<script src="/js/matrix.chat.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/js/matrix.form_validation.js"></script>
<script src="/js/jquery.wizard.js"></script>
<script src="/js/jquery.uniform.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/matrix.popover.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>
<script src="/js/bootstrap-pager.js"></script>
<script src="/sweetalert/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>

