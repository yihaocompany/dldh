
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= $this->tag->stylesheetLink('/back/css/bootstrap.min.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/bootstrap-responsive.min.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/matrix-style.css') ?>
    <?= $this->tag->stylesheetLink('/back/css/matrix-media.css') ?>
    <?= $this->tag->stylesheetLink('/back/font-awesome/css/font-awesome.css') ?>
</head>
<body>
<div id="header">
    <h1><a href="dashboard.html">电力导航</a></h1>
</div>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">登陆后台</a> </div>
        <h1>电力导航</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>电力导航</h5>
                    </div>
                    <div class="widget-content">
                        <div class="error_ex">
                            <h1>电力导航</h1>
                            <h3>指引方式，效率解决方案</h3>
                            <a class="btn btn-warning btn-big"  href="/backend/admin/login">登陆后台</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; <a href="<?= $_config['tecurl'] ?>" target="_blank" title="<?= $_config['tec'] ?>"><?= $_config['tec'] ?></a> </div>
</div>
<!--end-Footer-part-->
    <?= $this->tag->javascriptInclude('/js/jquery.min.js') ?>
    <?= $this->tag->javascriptInclude('/js/jquery.ui.custom.js') ?>
    <?= $this->tag->javascriptInclude('/js/bootstrap.min.js') ?>
    <?= $this->tag->javascriptInclude('/js/matrix.js') ?>

</body>
</html>
