<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/backend" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">帮助设置</a> </div>
        <h1>帮助管理</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>员工管理</h5> <span class="pull-right">
                            <h5><button class="btn btn-primary btn-mini" id="0"  data-toggle="modal" data-target="#myModal" onclick="showmodal(this)">新增帮助</button></h5></span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped" id="tablelist">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>图片</th>
                                <th>标题</th>
                                <th>分类</th>
                                <th>管理员</th>
                                <th>URL</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr class="odd gradeX">
                                    <td> <?= $item->id ?></td>
                                    <td><img src="<?= $item->pic ?>" width="50" > </td>
                                    <td><?= $item->title ?>  </td>
                                    <td><?= $item->Helpcategory->name ?>  </td>
                                    <td><?= $item->User->username ?>  </td>
                                    <td><?= $item->url ?>  </td>
                                    <td class="center">
                                        <input type="hidden" id="category_<?= $item->id ?>" value="<?= $item->helpcategory_id ?>">
                                        <input type="hidden" id="brief_<?= $item->id ?>" value="<?= $item->brief ?>">
                                        <button class="btn btn-primary btn-mini" data-toggle="modal" id="<?= $item->id ?>" data-target="#myModal" onclick="showmodal(this)">修改</button>
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
                        <a href="javascript:void(0)" tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled"><?= $p[0] ?></a>
                        <?php } else { ?>
                        <a href="<?= $url ?><?= $p[1] ?>" tabindex="0" class="fg-button ui-button ui-state-default"><?= $p[0] ?></a>
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
                <h4 class="modal-title" id="myModalLabel">帮助设置</h4>
            </div>
            <div class="modal-body">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">图片（600*600）</label>
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
                                    <label class="control-label">图片（600*600）*</label>
                                    <div class="controls">
                                        <input type="text" name="pic" id="pic" class="span3" placeholder="图片" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">标题名*</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="title" class="span3" placeholder="标题名" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">摘自url</label>
                                    <div class="controls">
                                        <input type="text" name="url" id="url" class="span3" value="http://" placeholder="搞自url http://" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">分类*</label>
                                    <div class="controls">
                                        <?= $this->tag->select(['helpcategory_id', $Helpcategory, 'using' => ['id', 'name'], 'id' => 'helpcategory_id']) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">管理员*</label>
                                    <div class="controls">
                                        <?= $admin['username'] ?>
                                        <input type="hidden" name="user_id" id="user_id" class="span3" value="<?= $admin['id'] ?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容</label>
                                </div>
                                <div class="control-group pu">
                                    <textarea class="span6" id="brief"></textarea>
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
        if($('#pic').val()==''){
            warnmsg("请上传头象");
            return;
        }
        if($('#title').val()==''){
            warnmsg("请输入标题");
            return;
        }
        if($('#helpcategory_id').val()==''){
            warnmsg("请选择帮助分类");
            return;
        }
        if($('#brief').val()==''){
            warnmsg("请输入内容");
            return;
        }
        $.ajax({
            type : "POST",
            url : '/backend/help/updatehelp',
            data : {
                "id" : $("#id").val(),
                'pic':$('#pic').val(),
                'title':$('#title').val(),
                'brief':$("#brief").val(),
                'helpcategory_id':$('#helpcategory_id').val(),
                'user_id': <?= $admin['id'] ?>,
                'url': $('#url').val()
            },
            dataType : 'json',
            success : function(result) {
                if ( result.code==1 ) {
                    warnmsg(result.message);
                    let v_id=$("#id").val();
                    if(v_id>0){
                        $('#category_'+v_id).val($('#helpcategory_id').val());
                        $('#brief_'+v_id).val($('#brief').val());
                        $("#tablelist").find("tr").each(function(i){
                            $(this).children('td').each(function(j){
                                if(j==0){
                                    if( JSON.parse(v_id)== JSON.parse($(this).text())){
                                        let tablelinenumber=i-1;
                                        let obj="#tablelist tbody tr:eq("+tablelinenumber+") ";
                                        $(obj+"  td:eq(1) img:eq(0)").attr('src',$('#pic').val());
                                        $(obj+"  td:eq(2)").text( $('#title').val());
                                        $(obj+"  td:eq(3)").text($("#helpcategory_id").find("option:selected").text());
                                        $(obj+"  td:eq(5)").text( $('#url').val());
                                    }
                                }
                            });
                        });
                        $('#myModal').modal('hide');
                    }else{
                        location.href="/backend/help/index";
                    }

                } else {
                    warnmsg(result.message);
                }
            }
        });
    }
    function showmodal(obj) {
        if(obj.id>0){
            $("#id").val(obj.id);
            let helpcategory_id=  $("#category_"+obj.id).val();
            $('#helpcategory_id').val(helpcategory_id);
            let brief=  $("#brief_"+obj.id).val();
            $('#brief').val(brief);
            $("#tablelist").find("tr").each(function(i){
                $(this).children('td').each(function(j){
                    if(j==0){
                        if( JSON.parse(obj.id)== JSON.parse($(this).text())){
                            let tablelinenumber=i-1;
                            let obj="#tablelist tbody tr:eq("+tablelinenumber+") ";
                            let img=   $(obj+"   td:eq(1) img:eq(0)").attr('src');
                            $('#pic').val(img);
                            $("#image_thumb").attr('src',img);
                            let title=  $(obj+"  td:eq(2)").text();
                            $('#title').val(title);

                            let url=  $(obj+"  td:eq(5)").text();
                            $('#url').val(url);

                        }
                    }
                });
            });
        }else{
            $('#id').val("");
            $('#pic').val("");
            $('#title').val("");
            $('#helpcategory_id').val("");
            $('#phone').val("");
            $('#brief').val("");
            $('#url').val("");
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
                        data :      {message:pic, filename:fname[0], filetype:fname[1], filesize:fi.size, 'head':'/help/','addid': $("#id").val()},
                        dataType : 'json',
                        success : function(res) {
                            if ( res.code ==1) {
                                $('#pic').val(res.data.picurl);
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