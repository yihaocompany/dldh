
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">管理员</a> </div>
        <h1>管理员</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>管理员</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="tablelist">
                            <thead>
                            <tr> <th>id</th>
                                <th>头像</th>
                                <th>登陆名</th>
                                <th>邮件 </th>
                                <th>状态 </th>
                                <th> 操做 </th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for item in list %}
                                <tr class="odd gradeX">
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {% if item.head !=""%}
                                        <img src="{{ item.head }}" width="50" >
                                        {% endif %}
                                  </td>
                                    <td>{{ item.username }}</td>
                                    <td>{{ item.email }}</td>
                                    <td>
                                        {% if item.id!=1  %}
                                        <div id="switch_{{ item.id }}"  class="switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                            <input type="checkbox" id="enable_{{ item.id }}" {% if item.enabled==1 %} checked {% endif %} />
                                        </div>
                                            {% else %}
                                            可用
                                        {% endif %}
                                    </td>
                                    <td>
                                    <button class="btn btn btn-mini btn-info" id="{{ item.id }}" data-toggle="modal" data-target="#myModal"  onclick="showmodal(this)">修改</button>
                                    </td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
                {% include 'public/pagernav.volt' %}
            </div>
        </div>
    </div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: auto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    管理管理
                </h4>
            </div>
            <div class="modal-body">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">头象（600*600）</label>
                    <div class="controls">
                        <input type="hidden" name="id"   id="id"  value="0" />
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
                    <label class="control-label">邮件*</label>
                    <div class="controls">

                        <input type="text" name="email" id="email" class="span3" placeholder="Email" />
                    </div>
                </div>
                                <div class="control-group">
                                    <label class="control-label">状态*</label>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="button" class="btn btn-primary" id="mysubmit">
                    提交更改
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#mysubmit').click( function() {
            if($('#head').val()==''){
                warnmsg("请上传头象");
                return;
            }
            if($('#username').val()==''){
                warnmsg("请输入登陆名");
                return;
            }
            if($('#email').val()==''){
                warnmsg("请输入EMAIL");
                return;
            }

            let enabled=1;
            if($("#status").attr('checked')=='checked'){
                enabled=1;
            }else{
                enabled=0;
            }
            $.ajax({
                type : "POST",
                url : '/backend/system/updateuser',
                data : {
                    "id" : $("#id").val(),
                    'head':$('#head').val(),
                    'username':$('#username').val(),
                    'realname':$("#realname").val(),
                    'email': $('#email').val(),
                    'enabled':enabled
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
                                            $(obj+"  td:eq(3)").text( $('#email').val());
                                            $('#switch_'+$("#id").val()).bootstrapSwitch('setState', status);
                                        }
                                    }
                                });
                            });
                        }else{
                            location.href="/backend/system/users";
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
        });

    });
    function warnmsg(varstring){
        $('#msg').html(varstring);
    }

    $('.switch').on('switch-change', function (e, data) {
        let  $el = $(data.el), value = data.value;
        let enable=value=='true'?1:0;
        let reg = new RegExp(/\d+/, 'g');
        let newstrid=reg.exec($el[0].id);
        if(newstrid[0]==1 ){
            $('#switch_1').bootstrapSwitch('setActive', false);
            return;
        }
        $.ajax(
            {
                data: {'enable':enable,'id':newstrid[0]},
                url: '/backend/system/userenable',
                type: 'post',
                dataType: 'json',
                success :function (res) {
                  newalert(res.message)  ;
                },
                error: function () {
                    newalert('发生错误')  ;
                }
            }
        );
    });

    function  showmodal(obj) {
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
                            let email=  $(obj+"  td:eq(3)").text();
                            $('#email').val(email);

                            if($(obj+"  td:eq(4)").find('input').attr('checked')=='checked'){
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

    function newalert(str) {
        swal({
            title: str,
            timer: 2000
        });
    }
</script>

