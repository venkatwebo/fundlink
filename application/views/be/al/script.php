<script>
    var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo scriptjs(); ?>vendor-all.min.js"></script>
<script src="<?php echo scriptplugins(); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo scriptjs(); ?>pcoded.min.js"></script>
<script src="<?php echo scriptjs(); ?>menu-setting.min.js"></script>
<!-- datatable Js -->
<script src="<?php echo scriptplugins('data-tables/js/datatables.min.js') ?>"></script>
<!-- Notification Js -->
<script src="<?php echo scriptplugins('notification/js/bootstrap-growl.min.js'); ?>"></script>
<!-- jquery-validation Js -->
<script src="<?php echo scriptplugins($path = "jquery-validation/js/jquery.validate.min.js"); ?>"></script>
<script src="<?php echo scriptplugins($path = "jquery-validation/dist/additional-methods.js"); ?>"></script>
<!-- Ckeditor js -->
<script src="<?php echo scriptplugins($path = "ckeditor/ckeditor.js"); ?>"></script>
<script type="text/javascript">
    if ($('.ckeditor').hasClass('yes')) {
        CKEDITOR.replace('editor1');
    }
</script>
<!-- common script -->
<script src="<?php echo base_url('assets/' . backendViewFolder() . 'vendor/common-script.js'); ?>"></script>
<!-- common script -->
<!-- <script src="<?php /* echo scriptjs($path = "pages/common-script.js?time=" . time()); */ ?>"></script> -->
<?php if (isset($js) && $js != "") { ?>
    <script src="<?php echo base_url($path = "assets/" . backendViewFolder() . 'vendor/' . $js . ".js?time=" . time()); ?>"></script>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
    <script>
        alertPopup("success", "<?php echo $this->session->flashdata('success'); ?>");
    </script>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
    <script>
        alertPopup("error", "<?php echo $this->session->flashdata('error'); ?>");
    </script>
<?php } ?>
<?php if ($this->session->flashdata('warning')) { ?>
    <script>
        alertPopup("warning", "<?php echo $this->session->flashdata('warning'); ?>");
    </script>
<?php } ?>
<?php if ($this->session->flashdata('info')) { ?>
    <script>
        alertPopup("info", "<?php echo $this->session->flashdata('info'); ?>");
    </script>
<?php } ?>
<?php if ($this->session->flashdata('question')) { ?>
    <script>
        alertPopup("question", "<?php echo $this->session->flashdata('error'); ?>");
    </script>
<?php } ?>

<div class="md-modal md-effect-3" id="form_modal">
    <div class="md-content">
        <h3 class="theme-bg2" id="modal-heading">Loading...</h3>
        <?php echo form_open_multipart(); ?>
        <div class="modal-body">
            <div id="modal-body-content"></div>
            <div class="d-flex justify-content-between mt-3">
                <input type="submit" class="btn btn-secondary btn-rounded cancelButton" value="Cancel">
                <input type="submit" id="form_modal_button" class="btn btn-success btn-rounded" value="Save">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="md-modal md-effect-3" id="view_modal">
    <div class="md-content">
        <h3 class="theme-bg2" id="modal-heading">Loading...</h3>
        <form>
            <div class="modal-body">
                <div id="modal-body-content"></div>
                <input type="submit" class="btn btn-secondary btn-rounded cancelButton float-right mt-3" value="Cancel">
            </div>
        </form>
    </div>
</div>