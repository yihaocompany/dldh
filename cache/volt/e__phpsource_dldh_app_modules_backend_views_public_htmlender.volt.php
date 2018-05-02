
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; <a href="<?= $_config['tecurl'] ?>" target="_blank" title="<?= $_config['tec'] ?>"><?= $_config['tec'] ?></a> </div>
</div>
<!--end-Footer-part-->
<?= $this->tag->javascriptInclude('/js/jquery.ui.custom.js') ?>
<?= $this->tag->javascriptInclude('/js/bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.flot.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.flot.resize.min.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.peity.min.js') ?>
<?= $this->tag->javascriptInclude('/js/fullcalendar.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.dashboard.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.gritter.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.interface.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.chat.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.validate.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.form_validation.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.wizard.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.uniform.js') ?>
<?= $this->tag->javascriptInclude('/js/select2.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.popover.js') ?>
<?= $this->tag->javascriptInclude('/js/jquery.dataTables.min.js') ?>
<?= $this->tag->javascriptInclude('/js/matrix.tables.js') ?>
<?= $this->tag->javascriptInclude('/js/bootstrap-pager.js') ?>
<?= $this->tag->javascriptInclude('/sweetalert/sweetalert/sweetalert.min.js') ?>
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
