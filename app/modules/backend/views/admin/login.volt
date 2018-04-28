<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo  $_config['webname']?></title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/css/matrix-login.css" />
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <!-- <link  rel="stylesheet" href="/css/messenger.css">
    <link  rel="stylesheet" href="/css/messenger-theme-future.css">-->
</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="post" action="/backend/admin/verylogin">
        <div class="control-group normal_text"> <h3><img src="{{ _config['logo'] }}" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text"  name="username" placeholder="用户名" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="密码" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                {{ content() }}
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">开发公司联系方式</a></span>
            <span class="pull-right"><input type="button" id="login" href="#" class="flip-link btn btn-info"  value="登陆"/> </span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">如不能登陆请联系管理员.QQ:<?php echo  $_config['tecqq']?> 手机:<?php echo  $_config['tecphone']?></p>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo;返回</a></span>
        </div>
    </form>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/matrix.login.js"></script>
<script src="/js/messenger.min.js"></script>
<script src="/sweetalert/sweetalert/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){
        $("#login").click(function () {
            if($('#loginform input[name=username]').val()==""){
                swal({
                    title: "用户名不能为空!",
                    timer: 2000
                });
                return;
            }
            if($('#loginform input[name=password]').val()==""){
                swal({
                    title: "密码不能为空!",
                    timer: 2000
                });
                return;
            }
           $("#loginform").submit();
        });
    });

</script>
</body>
</html>
