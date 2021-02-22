<div class="row">
    <div class="col-md-6">
        <div class="card">
            <?php echo form_open_multipart('', 'role="form" id="settingsform"', ''); ?>
            <div class="card-body">
                <h4 class="card-title text-center">Site Settings</h4>
                <div class="form-group">
                    <label for="">Site Name</label>
                    <input type="text" class="form-control" name="sitename" id="sitename" placeholder="Enter site name" value="<?php echo (isset($settings->name)) ? $settings->name : ""; ?>">
                </div>

                <div class="form-group">
                    <label for="author">Meta Author</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="Enter author" value="<?php echo (isset($settings->meta_author)) ? $settings->meta_author : ""; ?>">
                </div>

                <div class="form-group">
                    <label for="meta_keyword">Meta Keywords</label>
                    <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="5"><?php echo (isset($settings->meta_keywords)) ? $settings->meta_keywords : ""; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="3"><?php echo (isset($settings->meta_description)) ? $settings->meta_description : ""; ?></textarea>
                </div>

                <div class="row">
                    <div class="col -d-9">
                        <div class="form-group">
                            <label for="logo">Site Logo</label>
                            <input type="file" class="form-control-file" name="logo" id="logo" placeholder="Enter logo" aria-describedby="fileHelpId" onchange="">
                            <small id="fileHelpId" class="form-text text-muted">Formats like jpg, jpeg, and png are only allowed</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <img src="<?php echo (isset($settings->logo)) ? base_url(SITE_LOGO_PATH . $settings->logo) : scriptimages(SITE_LOGO_PATH . 'logo.svg'); ?>" height="50px">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="favicon">Site Fav Icon</label>
                            <input type="file" class="form-control-file showimg" name="favicon" id="favicon" placeholder="" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">Only .ico formats is allowed</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo (isset($settings->favicon)) ? base_url(SITE_LOGO_PATH . $settings->favicon) : base_url(SITE_LOGO_PATH . 'favicon.ico') ?>">
                    </div>
                </div>

                <?php echo form_hidden('old-logo', isset($settings->logo) ? $settings->logo : "") ?>
                <?php echo form_hidden('old-favicon', isset($settings->favicon) ? $settings->favicon : "") ?>

                <div class="pb-5">
                    <input type="submit" name="save_settings" value="Save" class="btn btn-primary float-right">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Your Profile</h4>
            </div>
        </div>
    </div>
</div>