
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{ stylesheet_link("/back/css/bootstrap.min.css" ) }}
    {{ stylesheet_link("/back/css/bootstrap-responsive.min.css" ) }}
    {{ stylesheet_link("/back/css/matrix-style.css")}}
    {{ stylesheet_link("/back/css/matrix-media.css" )}}
    {{ stylesheet_link("/back/font-awesome/css/font-awesome.css") }}
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
    <div id="footer" class="span12"> 2020 &copy; <a href="{{ _config['tecurl'] }}" target="_blank" title="{{ _config['tec'] }}">{{ _config['tec'] }}</a> </div>
</div>
<!--end-Footer-part-->
    {{ javascript_include("/js/jquery.min.js") }}
    {{ javascript_include("/js/jquery.ui.custom.js") }}
    {{ javascript_include("/js/bootstrap.min.js") }}
    {{ javascript_include("/js/matrix.js") }}

</body>
</html>
