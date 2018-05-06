
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
<?= $this->tag->javascriptInclude('/js/bootstrap-pager.js') ?>
<?= $this->tag->javascriptInclude('/js/fakeloader.js') ?>
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
