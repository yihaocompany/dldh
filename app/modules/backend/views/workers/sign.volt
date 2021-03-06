
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">考勤</a> </div>
        <h1>考勤</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>签到<span id="date">{{ date }}</span></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr> <th>id</th>
                                <th>员工名</th>
                                <th>上班({{ _config['work_begin']|trim }})</th>
                                <th>地点</th>
                                <th>下班({{ _config['work_end'] }})</th>
                                <th>地点</th>

                            </tr>
                            </thead>
                            <tbody>
                            {% set i=1 %}
                            {% for item in list %}
                            <tr class="odd gradeX">
                                <td>{{ i }}</td>
                                <td>{{ item.realname }}</td>
                                <td>{%  if item.begin_create==0 %}末打卡{% endif %}   </td>
                                <td></td>
                                <td>{%  if item.end_create==0 %}末打卡{% endif %} </td>
                                <td></td>

                            </tr>
                                {% set i += 1 %}
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Footer-part-->

