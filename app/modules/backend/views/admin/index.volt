<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>操作提示</title>
</head>
<style>
    *{margin: 0 auto;padding: 0;}
    .tranjump{background: url(/img/tac.jpg) no-repeat;width: 100%;height: 100%;}
    .rectangle_box{position: absolute;left: 50%;right: 50%;top: 50%;bottom: 50%;margin-left: -189.5px;margin-top: -77px;}
    .borderopely{width: 363px;height: 138px;border: 8px solid rgba(255,255,255,0.6);}
    .tipbox{width: 363px;height: 138px;background: white;text-align: center;}
    .welcople{color: #666666;font-size: 16px;padding-top: 18px;}
    .welcople .litps{background: url(/img/socp.png) no-repeat;width: 31px;height: 31px;display: inline-block;vertical-align: text-bottom;}
    .welcople .modifysu{background: url(/img/socp2.png) no-repeat;width: 34px;height: 37px;}
    .welcople .modifyfail{background: url(/img/socp3.png) no-repeat;width: 24px;height: 28px;}
    .ma-to-30{margin-top: 30px;}
    .ma-to-20{margin-top: 20px;}
    .ma-to-10{margin-top: 10px;}
    .cloblu{color: #3c8dbc;font-size: 16px;}
    .waittim{color: #666666;font-size: 16px;margin-left: 10px;}
    .ht-colblue{color: #3c8dbc;}
    a{text-decoration: none;}
    .waittim em{color: #3c8dbc;}
    em{font-style: normal;}
    .recigle{width: 379px;text-align: center;margin-top: 10px;}
    .recigle p{color: #333333;font-size: 16px;line-height: 20px;}
    .recigle .copyright{color: #3c8dbc;}
</style>
<body class="tranjump">
<div class="rectangle_box">
    <div class="borderopely">
        <!--修改失败-s-->
        <div class="tipbox" style="">
            <div class="welcople">
                <i class="litps modifyfail"></i>    <?php $this -> flashSession -> output();  ?></div>
            <div class="ma-to-20">
                <span class="cloblu">页面自动跳转中...</span>
                <span class="waittim"><a id="href" href="{{url  }}" style="color: #666666">等待时间：<em id="wait">3</em></a></span>
            </div>
            <div class="ma-to-10">
            </div>
        </div>
        <!--修改失败-e-->
    </div>
    <div class="recigle">
        <p>Copyright©2014-2018<em class="copyright"><a class="copyright" href="{{_config['teculr'] }}">Ming.biz Shop BETA 0.01</a></em></p>
        <p><em class="copyright"><a class="copyright" href="{{ _config['teculr'] }}">{{ _config['tec'] }}</a></em</p>
    </div>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>