
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
<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
