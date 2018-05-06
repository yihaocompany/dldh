
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; <a href="{{ _config['tecurl'] }}" target="_blank" title="{{  _config['tec']  }}">{{  _config['tec']  }}</a> </div>
</div>
<!--end-Footer-part-->
{{ javascript_include("/js/jquery.ui.custom.js") }}
{{ javascript_include("/js/bootstrap.min.js") }}
{{ javascript_include("/js/jquery.flot.min.js") }}
{{ javascript_include("/js/jquery.flot.resize.min.js") }}
{{ javascript_include("/js/jquery.peity.min.js") }}
{{ javascript_include("/js/fullcalendar.min.js") }}
{{ javascript_include("/js/matrix.js") }}
{{ javascript_include("/js/matrix.dashboard.js") }}
{{ javascript_include("/js/jquery.gritter.min.js") }}
{{ javascript_include("/js/matrix.interface.js") }}
{{ javascript_include("/js/matrix.chat.js") }}
{{ javascript_include("/js/jquery.validate.js") }}
{{ javascript_include("/js/matrix.form_validation.js") }}
{{ javascript_include("/js/jquery.wizard.js") }}
{{ javascript_include("/js/jquery.uniform.js") }}
{{ javascript_include("/js/select2.min.js") }}
{{ javascript_include("/js/matrix.popover.js") }}
{{ javascript_include("/js/jquery.dataTables.min.js") }}
{{ javascript_include("/js/matrix.tables.js") }}
{{ javascript_include("/js/bootstrap-pager.js") }}
{{ javascript_include("/sweetalert/sweetalert/sweetalert.min.js") }}
{{ javascript_include("/js/bootstrap-pager.js") }}
{{ javascript_include("/js/fakeloader.js") }}
<script type="text/javascript">
    function goPage (newURL) {
        if (newURL != "") {
            if (newURL == "-" ) {
                resetMenu();
            }
            else {
                document.location.href = newURL;
            }
        }
    }
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
    $(element).mLoading({
        text:"更新中",
        icon:"/images/loading.gif",
        html:false,
        content:"",
        mask:true
    });
</script>

</body>
</html>
