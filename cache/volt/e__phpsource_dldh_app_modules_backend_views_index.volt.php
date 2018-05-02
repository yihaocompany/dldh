 <!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $_config['webname'] ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= $this->tag->stylesheetLink('/back/css/bootstrap.min.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/bootstrap-responsive.min.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/fullcalendar.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/matrix-style.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/matrix-media.css') ?>
    <?= $this->tag->stylesheetLink('/back/font-awesome/css/font-awesome.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/jquery.gritter.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/uniform.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/select2.css') ?>
    <?= $this->tag->stylesheetLink('/css/bootstrapSwitch.css') ?>
    <?= $this->tag->stylesheetLink('/css/bootstrap-pager.css') ?>
    <?= $this->tag->javascriptInclude('/js/excanvas.min.js') ?>
    <?= $this->tag->javascriptInclude('/js/jquery.min.js') ?>
    <?= $this->tag->javascriptInclude('/sweetalert/sweetalert/sweetalert.min.js') ?>
    <?= $this->tag->javascriptInclude('/js/bootstrap-paginator.min.js') ?>
    <?= $this->tag->javascriptInclude('/js/bootstrapSwitch.js') ?>
</head>
<body>
 
<div id="header">
    <h1><a href="dashboard.html">电力后台 Admin</a></h1>
</div>
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
<div id="search">
    <input type="text" placeholder="Search here..." id="tosearch"/>
    <button type="button" class="tip-bottom" title="Search"  id="globsearch"><i class="icon-search icon-white" ></i></button>
</div>

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 管理菜单</a>
    <ul>
        <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>管理菜单</span></a> </li>
        <li> <a href="/backend/workers/sign"><i class="icon icon-signal"></i> <span>签到</span><span class="label label-important">5</span></a> </li>
        <li> <a href="/backend/workers/"><i class="icon icon-inbox"></i> <span>员工管理</span><span class="label label-important">5</span></a> </li>
        <li><a href="/backend/pole/index"><i class="icon icon-th"></i> <span>塔杆管理</span><span class="label label-important">5</span></a></li>
        <li><a href="/backend/notice"><i class="icon icon-fullscreen"></i> <span>通知</span></a></li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>数据分析</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="/backend/pole/map">塔杆地图</a></li>
                <li><a href="/backend/worker/data">签到统计</a></li>
                <li><a href="/backend/data/">数据汇总</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>管理员管理</span> <span class="label label-important">5</span></a>
            <ul>
                <li><a href="/backend/system/adduser">增加管理员</a></li>
                <li><a href="/backend/system/users">修改管理员</a></li>
            </ul>
        </li>
    </ul>
</div>

 <?= $this->getContent() ?>
 
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; <a href="<?= $_config['tecurl'] ?>" target="_blank" title="<?= $_config['tec'] ?>"><?= $_config['tec'] ?></a> </div>
</div>
<!--end-Footer-part-->
<?= $this->tag->javascriptInclude('/js/jquery.ui.custom.js') ?>
<?= $this->tag->javascriptInclude('/js/bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.flot.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.flot.resize.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.peity.min.js') ?>
<?= $this->tag->javascriptInclude('/js/fullcalendar.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.dashboard.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.gritter.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.interface.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.chat.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.validate.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.form_validation.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.wizard.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.uniform.js') ?>
<?= $this->tag->javascriptInclude('/js/select2.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.popover.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.dataTables.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.tables.js') ?>
<?= $this->tag->javascriptInclude('/js/bootstrap-pager.js') ?>
<?= $this->tag->javascriptInclude('/sweetalert/sweetalert/sweetalert.min.js') ?>
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

