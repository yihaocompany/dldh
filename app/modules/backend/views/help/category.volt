<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/backend" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">帮助管理</a> </div>
        <h1>帮助分类</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>帮助分类</h5> <span class="pull-right">     <h5><button class="btn btn-primary btn-mini" id="0"  data-toggle="modal" data-target="#myModal" onclick="showmodal(this)">新增帮助分类</button></h5></span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="tablelist">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>类别</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% if list %}
                            {% for item in list %}
                                <tr class="odd gradeX">
                                    <td> {{ item['id'] }}</td>
                                    <td>{{ item['name'] }}  </td>
                                    <td class="center">
                                        <button class="btn btn-primary btn-mini"   data-toggle="modal" id="{{ item['id'] }}" data-target="#myModal" onclick="showmodal(this)">修改</button>
                                    </td>
                                </tr>
                            {% endfor  %}
                                {% else %}
                                    <tr class="odd gradeX">
                                        <td colspan="3"></td>

                                    </tr>
                            {% endif %}
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">帮助设置</h4>
            </div>
            <div class="modal-body">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">分类名*</label>
                                    <div class="controls">
                                        <input type="hidden" name="id" id="id"  />
                                        <input type="text" name="name" id="name" class="span3" placeholder="分类名" />
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
    function to_submit() {
        if($('#name').val()==''){
            warnmsg("请输入分类名");
            return;
        }
        $.ajax({
            type : "POST",
            url : '/backend/help/updatecategory',
            data : {
                "id" : $("#id").val(),
                'name':$('#name').val()
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
                                        $(obj+"  td:eq(1)").text( $('#name').val());
                                    }
                                }
                            });
                        });
                    }else{
                        location.href="/backend/help/category";
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
                            let name=  $(obj+"  td:eq(1)").text();
                            $('#name').val(name);
                        }
                    }
                });
            });
        }else{
            $('#id').val("0");
            $('#name').val("");

        }
    }

</script>