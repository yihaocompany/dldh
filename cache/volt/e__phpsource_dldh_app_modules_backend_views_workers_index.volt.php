<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/backend" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">系统设置</a> </div>
        <h1>员工管理</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>员工管理</h5> <span class="pull-right">     <h5><button class="btn btn-primary btn-mini" id="0"  data-toggle="modal" data-target="#myModal" onclick="showmodal(this)">新增员工</button></h5></span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="tablelist">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>头像</th>
                                <th>用户登陆名</th>
                                <th>用户名</th>
                                <th>手机</th>
                                <th>邮件</th>
                                <th>微信</th>
                                <th>QQ</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr class="odd gradeX">
                                    <td> <?= $item['id'] ?></td>
                                    <td><img src="<?= $item['head'] ?>" width="50" > </td>
                                    <td><?= $item['username'] ?>  </td>
                                    <td><?= $item['realname'] ?>  </td>
                                    <td><?= $item['phone'] ?>  </td>
                                    <td><?= $item['email'] ?>  </td>
                                    <td><?= $item['weixin'] ?>  </td>
                                    <td><?= $item['qq'] ?>  </td>
                                    <td>
                                        <div class="switch"   id="switch_<?= $item['id'] ?>"  data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                            <input type="checkbox"
                                                    <?php if ($item['status'] == '1') { ?>
                                                        checked
                                                   <?php } ?>
                                                   id="ch_<?= $item['id'] ?>" />
                                        </div>
                                    </td>
                                    <td class="center">
                                        <button class="btn btn-primary btn-mini"   data-toggle="modal" id="<?= $item['id'] ?>" data-target="#myModal" onclick="showmodal(this)">修改</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                <?php $disabled = 'ui-state-disabled'; ?>
<?php $disabledurl = 'javascript:void(0)'; ?>
<div id="mypagers">
    <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
        <div class="dataTables_filter" id="DataTables_Table_0_filter"></div>
        <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
            <a tabindex="0" href="<?php if ($first == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $first ?><?php } ?>" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default <?php if ($first == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_first">第1页</a>
            <a tabindex="0" href="<?php if ($pre == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $pre ?><?php } ?>" class="previous fg-button ui-button ui-state-default <?php if ($pre == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_previous">上页</a><span>
                <?php $i = 0; ?>
                <?php foreach ($pager as $p) { ?>
                    <?php if ($i == 0) { ?>
                        <a href="javascript:void(0)" tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled"><?= $p ?></a>
                        <?php } else { ?>
                        <a href="<?= $url ?><?= $p ?>" tabindex="0" class="fg-button ui-button ui-state-default"><?= $p ?></a>
                    <?php } ?>
                    <?php $i = $i + 1; ?>
            <?php } ?>
            </span>
            <a tabindex="0" href="<?php if ($next == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $next ?><?php } ?>" class="next fg-button ui-button ui-state-default <?php if ($next == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_next" >下页</a>
            <a tabindex="0" href="<?php if ($last == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $last ?><?php } ?>" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default  <?php if ($last == 0) { ?><?= $disabled ?><?php } ?> " id="DataTables_Table_0_last" >最后</a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: auto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">员工设置</h4>
            </div>
            <div class="modal-body">
                <div class="span6">
                <div class="widget-box">
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">头象（600*600）</label>
                            <div class="controls">
                                <input type="hidden" name="id"   id="id"   class="span3" placeholder="值" value="0" />
                                <input type="file"   class="span3" id="images"    name="file" />
                                <input type="button" class="span3" id="upbutton"  name="upbutton"  class="upbutton" value="上传" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls">
                                <img src="#" class="image_thumb" alt="图片预览" id="image_thumb" width="100"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">头象（600*600）*</label>
                            <div class="controls">
                                <input type="text" name="head" id="head" class="span3" placeholder="头象" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">登陆名*</label>
                            <div class="controls">
                                <input type="text" name="username" id="username" class="span3" placeholder="登陆名" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">用户名*</label>
                            <div class="controls">
                                <input type="text" name="realname" id="realname" class="span3" placeholder="用户名" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">手机*</label>
                            <div class="controls">
                                <input type="text" name="phone" id="phone" class="span3" placeholder="手机" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">邮件</label>
                            <div class="controls">
                                <input type="text" name="email" id="email" class="span3" placeholder="邮件" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">微信</label>
                            <div class="controls">
                                <input type="text" name="weixin" id="weixin" class="span3" placeholder="微信" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">QQ</label>
                            <div class="controls">
                                <input type="text" name="qq" id="qq" class="span3" placeholder="QQ" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">状态</label>
                            <div class="controls">
                                <div  id="cstatus" class="switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                    <input type="checkbox" checked id="status" />
                                </div>
                            </div>
                     </div>
                    </form>
                </div>
            </div>
       </div>
        </div>
            <div class="modal-footer">
                <div id="myAlert" class="alert alert-success">
                    <strong id="myAlertok_string">提示！</strong><span id="msg">*表示为必需</span>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="mysubmit" onclick="to_submit()">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
    function warnmsg(varstring){
            $('#msg').html(varstring);
    }
    $('.switch').on('switch-change', function (e, data) {
        let $el = $(data.el), value = data.value;
        let status=value?1:0;
        let strid=$el[0].id;
        let reg = new RegExp(/\d+/, 'g');
        let newstrid=reg.exec(strid);
        $.ajax({
            async: true,
            type : "post",
            url : '/backend/workers/status',
            data : {
                "id" : newstrid ,'status': status
            },
            dataType : 'json',
            success : function(res) {
                if ( res.code !=1) {
                    newalert(res.message);
                } else {
                    newalert(res.message);
                }
            }
        });
    });
    function to_submit() {
        if($('#head').val()==''){
            warnmsg("请上传头象");
            return;
        }
        if($('#username').val()==''){
            warnmsg("请输入登陆名");
            return;
        }
        if($('#realname').val()==''){
            warnmsg("请输入真实姓名");
            return;
        }
        if($('#phone').val()==''){
            warnmsg("请输入手机号");
            return;
        }
        let status=1;
        if($("#status").attr('checked')=='checked'){
            status=1;
        }else{
            status=0;
        }
            $.ajax({
                type : "POST",
                url : '/backend/workers/updateworker',
                data : {
                    "id" : $("#id").val(),
                    'head':$('#head').val(),
                    'username':$('#username').val(),
                    'realname':$("#realname").val(),
                    'phone':$('#phone').val(),
                    'email': $('#email').val(),
                    'weixin':  $('#weixin').val(),
                    'qq': $('#qq').val(),
                    'status':status
                },
                dataType : 'json',
                success : function(result) {
                    if ( result.code==1 ) {
                        warnmsg(result.message);
                        let v_id=$("#id").val();
                        if(v_id>0){
                            $('#value_'+v_id).text($('#value').val());
                            $('#txt_'+v_id).text($('#txt').val());
                            $("#tablelist").find("tr").each(function(i){
                                $(this).children('td').each(function(j){
                                    if(j==0){
                                        if( JSON.parse(v_id)== JSON.parse($(this).text())){
                                            let tablelinenumber=i-1;
                                            let obj="#tablelist tbody tr:eq("+tablelinenumber+") ";
                                            $(obj+"  td:eq(1) img:eq(0)").attr('src',$('#head').val());
                                            $(obj+"  td:eq(2)").text( $('#username').val());
                                            $(obj+"  td:eq(3)").text( $('#realname').val());
                                            $(obj+"  td:eq(4)").text( $('#phone').val());
                                            $(obj+"  td:eq(5)").text( $('#email').val());
                                            $(obj+"  td:eq(6)").text( $('#weixin').val());
                                            $(obj+"  td:eq(7)").text(  $('#qq').val());
                                            $('#switch_'+$("#id").val()).bootstrapSwitch('setState', status);
                                        }
                                    }
                                });
                            });
                        }else{
                            location.href="/backend/workers/index";

                            let schecked='checked';
                            if(status==1){
                                schecked='checked';
                            }else{
                                schecked='';
                            }
                            let  rowIndex = $("#tablelist tr:last").attr("data-row");
                            if (rowIndex == "" || rowIndex == null) {
                                rowIndex = parseInt(1);
                            } else {
                                rowIndex = parseInt(rowIndex) + 1;
                            }
 let  htmlList = '<tr class=\'odd gradeX\'>';
   htmlList += '<td>'+result.data.dataid+'</td>';
   htmlList += '<td><img src='+$('#head').val()+' width=50/></td>';
   htmlList += '<td>' +$('#username').val()+ '</td>';
   htmlList += '<td>' +$('#realname').val()+ '</td>';
   htmlList += '<td>' +$('#phone').val()+ '</td>';
   htmlList += '<td>' +$('#email').val()+ '</td>';
   htmlList += '<td>' +$('#weixin').val()+ '</td>';
   htmlList += '<td>' +$('#qq').val()+ '</td>';
   htmlList += '<td><div class=\'switch\'  id=\'switch_'+$('#head').val()+'\' data-on-label="<i class=\'icon-ok icon-white\'></i>" data-off-label=\"<i class=\'icon-remove\'></i>\">';
   htmlList += '<input type=checkbox ' +schecked+ ' id=ch_'+$('#head').val()+'/>';
   htmlList +='</div></td>';
   htmlList +='<td class=center><button class=\'btn btn-primary btn-mini\'  data-toggle=modal id='+ result.data.dataid  +' data-target=#myModal onclick=showmodal(this)>修改</button></td>';
   htmlList +='</tr>';
      $("#tablelist tr:last").after(htmlList);
  }
                        $('#myModal').modal('hide');
                    } else {
                        warnmsg(result.message);
                    }
                }
            });
    }
    function showmodal(obj) {
         if(obj.id>0){
             $("#id").val(obj.id);
             $("#tablelist").find("tr").each(function(i){
                 $(this).children('td').each(function(j){
                     if(j==0){
                         if( JSON.parse(obj.id)== JSON.parse($(this).text())){
                             let tablelinenumber=i-1;
                             let obj="#tablelist tbody tr:eq("+tablelinenumber+") ";
                             let img=   $(obj+"   td:eq(1) img:eq(0)").attr('src');
                             $('#head').val(img);
                             $("#image_thumb").attr('src',img);
                             let username=  $(obj+"  td:eq(2)").text();
                             $('#username').val(username);
                             let realname=  $(obj+"  td:eq(3)").text();
                             $('#realname').val(realname);
                             let phone=  $(obj+"  td:eq(4)").text();
                             $('#phone').val(phone);
                             let email=  $(obj+"  td:eq(5)").text();
                             $('#email').val(email);
                             let weixin= $(obj+"  td:eq(6)").text();
                             $('#weixin').val(weixin);
                             let qq= $(obj+"  td:eq(7)").text();
                             $('#qq').val(qq);
                             if($(obj+"  td:eq(8)").find('input').attr('checked')=='checked'){
                                 $('#cstatus').bootstrapSwitch('setState', true);
                             }else{
                                 $('#cstatus').bootstrapSwitch('setState', false);
                             }
                         }
                     }
                 });
             });
         }else{
             $('#id').val("");
             $('#head').val("");
             $('#username').val("");
             $('#realname').val("");
             $('#phone').val("");
             $('#email').val("");
             $('#weixin').val("");
             $('#qq').val("");
         }
    }
    $("#upbutton").click(function(){
        let ret={};
        if($("#images").val()==""){
            ret={message:'请选择图片'};
            warnmsg(ret.message);
        }
        let  filetype = ['jpg','jpeg','png','gif'];
        if($('#images').get(0).files){
            fi = $('#images').get(0).files[0];
            let fname = fi.name.split('.');
            if(filetype.indexOf(fname[1].toLowerCase()) == -1){
                ret={message:'文件格式不支持'}
            }else{
                let fr = new FileReader();
                fr.readAsDataURL(fi);
                fr.onload = function(frev){
                    pic = frev.target.result;
                    $('.image_thumb').attr('src',pic);
                    $.ajax({
                        type : "POST",
                        url : '/home/index/upload',
                        data :      {message:pic, filename:fname[0], filetype:fname[1], filesize:fi.size, 'head':'/head/','worker': $("#id").val()},
                        dataType : 'json',
                        success : function(res) {
                            if ( res.code ==1) {
                                $('#head').val(res.data.picurl);

                                ret={message:'上传成功'}
                            } else {
                                ret={message:'上传失败'}
                            }
                        }
                    });
                }
            }
        }else {
            ret={message:'请选择图片'}
        }
        warnmsg(ret.message);
    });

    function swetalert(str) {
        swal({
            title: str,
            timer: 2000
        });
    }
    function newalert(str) {
        swal({
            title: str,
            timer: 2000
        });
    }
</script>