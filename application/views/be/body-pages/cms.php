<?php if (isset($module) && $module != "") { ?>
    <?php if ($module == "list") { ?>
        <div class="card">
            <h5 class="card-header"><?php echo $page_heading; ?></h5>
            <div class="card-body">
                <table class="table dt cmslist">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    <?php } elseif ($module == "update") { ?>
        <div class="card">
            <h5 class="card-header"><?php echo $page_heading; ?></h5>
            <div class="card-body">
                <?php echo form_open_multipart($action = "", $attributes = array(), $hidden = array()); ?>
                <div class="form-group">
                    <label class="form-label">Choose Banner</label>
                    <div><input type="file" class="validation-file" name="cms_banner" id="cms_banner" /></div>
                </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="cms_title" id="cms_title" value="<?php echo (isset($cms) && isset($cms->title)) ? $cms->title : ""; ?>" placeholder="Enter Title">
                </div>
                <input type="hidden" value="<?php echo (isset($cms) && isset($cms->id)) ? $cms->id : ""; ?>" name="cms_id">
                <div class="form-group">
                    <label class="form-label">Content</label>
                    <textarea class="form-control ckeditor yes" name="cms_content" id="editor1"><?php echo (isset($cms) && isset($cms->content)) ? $cms->content : ""; ?></textarea>
                </div>
                <!-- <div id="ckeditor"></div> -->
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <?php $status = (isset($cms) && isset($cms->status)) ? $cms->status : ""; ?>
                    <?php echo form_dropdown('cms_status', $options = dropdownCommon($type = 'status'), $selected = $status, $extra = 'class="form-control" id="status"'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    <?php } else {
    } ?>
<?php } ?>