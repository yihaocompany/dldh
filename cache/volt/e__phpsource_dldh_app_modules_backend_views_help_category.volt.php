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
                            <?php if ($list) { ?>
                            <?php foreach ($list as $item) { ?>
                                <tr class="odd gradeX">
                                    <td> <?= $item['id'] ?></td>
                                    <td><?= $item['name'] ?>  </td>
                                    <td align="center">
                                        <button class="btn btn-primary btn-mini"   data-toggle="modal" id="<?= $item['id'] ?>" data-target="#myModal" onclick="showmodal(this)">修改</button>
                                    </td>
                                </tr>
                            <?php } ?>
                                <?php } else { ?>
                                    <tr class="odd gradeX">
                                        <td colspan="3"></td>

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