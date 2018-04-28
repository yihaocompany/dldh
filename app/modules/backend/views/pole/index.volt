
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">塔杆</a> </div>
        <h1>塔杆</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>塔杆</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <div id="contains_pager"></div>
                        <div id="nav_pager"></div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>图片</th>
                                <th>二维码</th>
                                <th>塔杆</th>
                                <th>经纬度</th>
                                <th>管理员</th>
                                <th>地点</th>
                                <th>地址</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
{% for item in list %}
  <tr class="odd gradeX">
      <td>{{ item.id  }}</td>
      <td id="name_{{ item.id }}">{{ item.name  }}</td>
      <td id="name_{{ item.id }}">{{ item.name  }}</td>
      <td id="name_{{ item.id }}">{{ item.name  }}</td>
      <td>&nbsp;{{ item.lat }}&nbsp;{{ item.lng }}</td>
      <td>{{  item.Worker.realname }}</td>
      <td class="center">{{ item.Area.area_name }}</td>
     <td class="center">{{ item.address|trim }}</td>
    <td class="center"> <input type="button" class="btn btn-info" id="<?php echo $item->id ?>"  data-toggle="modal" data-target="#myModal" value="修改" onclick="passval(this)">
        <input type="button" class="btn btn-info" id="<?php echo $item->id ?>"  data-toggle="modal" data-target="#myModal" value="导航帮助" onclick="passval(this)">
        <input type="button" class="btn btn-info" id="<?php echo $item->id ?>"  data-toggle="modal" data-target="#myModal" value="管理员工" onclick="passval(this)">
    </td>
  </tr>
{% endfor  %}
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
                <h4 class="modal-title" id="myModalLabel">模态框（Modal）标题</h4>
            </div>
            <div class="modal-body"><form>
                    <input type="text" value="" id="id">
                    <input type="text" value="" id="modi_name" placeholder="名字">
                </form></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="mysubmit" onclick="mysubmit()">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script>
    function passval(obj) {
        $("#id").val(obj.id);
        $("#modi_name").val($("#name_"+obj.id).text());
    }
    function mysubmit() {
        alert('jquery submit the data');
    }
</script>