<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/backend" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">系统设置</a> </div>
        <h1>系统设置</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>系统设置</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>键</th>
                                <th>值</th>
                                <th>说明</th>
                                <th>操作</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) { ?>

                            <tr class="odd gradeX">
                                <td> <?= $item['id'] ?></td>
                                <td id="name_<?= $item['id'] ?>"><?= $item['name'] ?>  </td>
                                <td id="value_<?= $item['id'] ?>"><?= $item['value'] ?></td>
                                <td id="txt_<?= $item['id'] ?>"><?= $item['txt'] ?>    </td>
                                <td class="center"> <button class="btn btn-primary btn-mini"   data-toggle="modal" id="<?= $item['id'] ?>" data-target="#myModal" onclick="showmodal(this)">修改</button></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">系统设置</h4>
            </div>
            <div class="modal-body">
                <div class="span5">
                <div class="widget-box">

                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">值</label>
                            <div class="controls">
                                <input type="text" id="value" class="span2" placeholder="值" />
                                <input type="hidden" name="id" id="id" class="span2" placeholder="值" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">说明</label>
                            <div class="controls">
                                <input type="text"  id="txt" class="span2" placeholder="说明" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="mysubmit" onclick="to_submit()">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script>

        function to_submit() {
            $.ajax({
                type : "POST",
                url : '/backend/system/update',
                data : {
                    "id" : $("#id").val(),'value':$('#value').val(),'txt':$('#txt').val()
                },
                dataType : 'json',
                success : function(result) {
                    if ( result.code ) {
                        newalert(result.message);
                        let v_id=$("#id").val();
                        $('#value_'+v_id).text($('#value').val());
                        $('#txt_'+v_id).text($('#txt').val());
                        $('#myModal').modal('hide');
                    } else {
                        newalert(result.message);
                    }
                }
            });
        }
    function showmodal(obj) {
         $("#id").val(obj.id);
         $("#value").val($("#value_"+obj.id).text());
         $("#txt").val($("#txt_"+obj.id).text());
    }
    function newalert(str) {
        swal({
            title: str,
            timer: 2000
        });

    }
</script>