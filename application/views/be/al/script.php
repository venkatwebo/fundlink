<script src="<?php echo scriptjs(); ?>vendor-all.min.js"></script>
<script src="<?php echo scriptplugins(); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo scriptjs(); ?>pcoded.min.js"></script>
<script src="<?php echo scriptjs(); ?>menu-setting.min.js"></script>
<script src="<?php echo base_url('assets/vendor/common-script.js'); ?>"></script>
<!-- common script -->
<!-- <script src="<?php /* echo scriptjs($path = "pages/common-script.js?time=" . time()); */ ?>"></script> -->
<?php if (isset($js) && $js != "") { ?>
    <script src="<?php echo scriptjs($path = "pages/" . $js . ".js?time=" . time()); ?>"></script>
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