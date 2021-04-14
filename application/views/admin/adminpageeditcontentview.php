<?php
/*print '<pre>';
print_r($other_section_content_data[0]);
print '</pre>';*/
?>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">

                        <?php echo form_open('admin/content/contentpageedit'); ?>
                            <input type="hidden" name="id" value="<?php echo $content_id; ?>">

                            <label for="text1">Enter page name</label>
                            <br>
                            <input type="text" required="required" name="content_details_page" class="form-control" placeholder="Enter page name" value="<?php echo $other_section_content_data[0]['content_page'] ?>" />
                            <br>
                            <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Set page</button>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>