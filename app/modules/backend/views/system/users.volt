
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
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr> <th>id</th>
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
                                    <td>{{ item.username }}</td>
                                    <td>{{ item.email }}</td>
                                    <td><div  class="switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                            <input type="checkbox" id="enable_{{ item.id }}" {% if item.enabled==1 %} checked {% endif %} />
                                        </div></td>
                                    <td>
                                    <button class="btn  btn-info">修改</button>
                                    </td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $('.switch').on('switch-change', function (e, data) {
        let  $el = $(data.el), value = data.value;
        let enable=value=='true'?1:0;
        let reg = new RegExp(/\d+/, 'g');
        let newstrid=reg.exec($el[0].id);
        $.ajax(
            {
                data: {'enable':enable,'id':newstrid},
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
    function newalert(str) {
        swal({
            title: str,
            timer: 2000
        });
    }
</script>

