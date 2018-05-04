
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
                    <div id="loading"></div>
                    <div class="widget-content nopadding" id="ipage"></div>
                    <div id="mypagers"></div>
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
    pagetables(1);
   function pagetables(page) {
       $("#loading").html("<img src='/images/loading.gif' />");

       $.ajax({
           url:'/backend/pole/getpager',
           data:{'page':page,'search':$('#tosearch').val()},
           type:'get',
           dataType:'json',
           success: function(res){
               if(res.code!=1){
                   warn(res.message);
                   $("#loading").empty();
               }else{
                   let data=res.data.list;
                   if(!data){
                       warn('查询无记录');
                       $("#loading").empty();
                       $("#ipage").html("");
                       $("#mypagers").html("");
                       return;
                   }

                   let tableheader='<table class="table table-bordered table-striped">' +
                       '    <thead>' +
                       '    <tr>' +
                       '        <th>id</th>' +
                       '        <th>图片</th>' +
                       '        <th>二维码</th>' +
                       '        <th>塔杆</th>' +
                       '        <th>经纬度</th>' +
                       '        <th>管理员</th>' +
                       '        <th>地点</th>' +
                       '        <th>地址</th>' +
                       '        <th>操作</th>' +
                       '    </tr>' +
                       '    </thead>' +
                       '    <tbody>';
                   let tableender='    </tbody>' +
                       '</table>';

                   let tablebody='';

                   for (let i=0;i<data.length;i++){
                       let trs='  <tr class="odd gradeX" id=tr_'+data[i].id+'>' +
                           '            <td>'+data[i].id+'</td>' +
                           '            <td >'+data[i].name+'</td>' +
                           '            <td >'+data[i].name+'</td>' +
                           '            <td >'+data[i].name+'</td>' +
                           '            <td>&nbsp;'+data[i].lat+'&nbsp;'+data[i].lng+'</td>' +
                           '            <td>'+data[i].worker_realname+'</td>' +
                           '            <td class="center">'+ data[i].area_name+'</td>' +
                           '            <td class="center">'+ data[i].address+'</td>' +
                           '            <td class="center"> <input type="button" class="btn btn-info"  id=m_'+data[i].id+'  data-toggle="modal" data-target="#myModal" value="修改">' +
                           '                <input type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal" value="导航"   id=d_'+data[i].id+'>' +
                           '                <input type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal" value="管理"  id=g_'+data[i].id+'>' +
                           '                <input type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal" value="区域"  id=a_'+data[i].id+'>' +
                           '                <input type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal" value="报警" id=w_'+data[i].id+'>' +
                           '            </td>' +
                           '        </tr>';
                       tablebody=tablebody+trs;
                   }


                   let firstpage      = res.data.pagedetail.first==0?'':" onclick='pagetables("+res.data.pagedetail.first+")'";
                   let firststyle     = res.data.pagedetail.first==0?'ui-state-disabled':'';
                   let lastpage       = res.data.pagedetail.last==0?'':" onclick='pagetables("+res.data.pagedetail.last+")'";
                   let lastpagestyle  = res.data.pagedetail.last==0?'ui-state-disabled':'';
                   let pre            = res.data.pagedetail.pre==0?'':" onclick='pagetables("+res.data.pagedetail.pre+")'";
                   let prestyle       = res.data.pagedetail.pre==0?'ui-state-disabled':'';
                   let next           = res.data.pagedetail.next==0?'':" onclick='pagetables("+res.data.pagedetail.next+")'";
                   let nextstyle      = res.data.pagedetail.next==0?'ui-state-disabled':'';
                   let pagers         = res.data.pagedetail.pager;
                   let pagestring     = "";
                   let counti=0;
                   for(let index in pagers) {
                       let linstring;
                       if(counti==0){
                           linstring="<a href='javascript:void(0)' tabindex=0 class='fg-button ui-button ui-state-default ui-state-disabled'>"+pagers[index]+"</a>"
                       }else{
                           linstring="<a href='javascript:void(0)' tabindex=0  onclick='pagetables("+ pagers[index] +")'  class='fg-button ui-button ui-state-default'>"+pagers[index]+"</a>"
                       }
                       counti++;
                       pagestring= pagestring + linstring;
                   }
                   let mypager='<div class=\"fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix\">' +
                       '<div class=\"dataTables_filter\" id=\"DataTables_Table_0_filter\"></div>' +
                       '<div class=\"dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers\" id=DataTables_Table_0_paginate>' +
                       '<a tabindex="0"  href=\"javascript:void(0)\" class=\"first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default '+firststyle+'\" id=\"DataTables_Table_0_first\" '+ firstpage +'>第1页</a>' +
                       '<a tabindex="0"  href=\"javascript:void(0)\" class=\"previous fg-button ui-button ui-state-default '+prestyle+'\" id=\"DataTables_Table_0_previous\"  ' + pre + '>上页</a>' +
                       '<span>' +
                       pagestring +
                       '</span>' +
                       '<a tabindex="0"  href=\'javascript:void(0)\' class=\"next fg-button ui-button ui-state-default '+nextstyle+'\" id="DataTables_Table_0_next" ' + next + ' >下页</a>' +
                       '<a tabindex="0"   href=\'javascript:void(0)\' class=\"last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default '+lastpagestyle+'\" id=\"DataTables_Table_0_last\" '+ lastpage + '>最后</a>' +
                       '</div></div>';

                   $("#ipage").html( tableheader + tablebody + tableender);
                   $("#mypagers").html(mypager);


                   $("#loading").empty();
               }
           },
           error : function() {
               warn(" 发生错误");
               $("#loading").empty();

           }
       });
   }
    function warn(str) {
        swal({   title: str,    timer: 2500,   showConfirmButton: false });
    }

    $(document).ready(function(){


     $('#globsearch').click(function () {
         pagetables(1);
     });
    });
</script>
