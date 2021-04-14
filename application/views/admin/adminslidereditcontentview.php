<?php
/*print '<pre>';
print_r($slider_data[0]);
print '</pre>';*/
?>

<div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">
                        <?php if(!empty($upload_data['file_name'])){ ?>
                        <span class="message">You have uploaded file successfully!</span>
                        <?php } ?>
                        <div style="margin-top:13px;">
                            <?php if(!empty($error)){ echo $error; } ?> <!-- Error Message will show up here -->
                            <?php echo form_open_multipart('admin/content/slideredit');?>
                            <input type="hidden" name="id" value="<?php echo $slider_id; ?>">
                            <?php
                            $slidercid = !empty($slider_data[0]['slider_cid']) ? $slider_data[0]['slider_cid'] : '0';
                            ?>
                            <label for="text1">Select content</label>
                            <br>
                            <select required="required" class="formcontrol cnt" name="slider_cid">
                                <option value="">Select content</option>
                                <?php
                                if (!empty($content_data) && count($content_data) > 0) { ?>
                                    <?php
                                    foreach ($content_data as $key => $value) { ?>
                                        <?php
                                        if($value['content_id'] == $slidercid){ ?>
                                            <option selected="selected" value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option> <?php
                                        }else{ ?>
                                            <option value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                        <?php } ?>

                                            
                                        <?php } ?>
                                <?php } ?>
                            </select>
                            <br><br>
                            <label for="text1">Upload slider image</label>
                            <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>

                                <div class="body">
                                    	
                                        <label for="text1">Text1</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required="required" type="text" id="text1" class="form-control" name="text1" placeholder="Enter Text1 text" value="<?php echo $slider_data[0]['slider_text1'] ?>">
                                            </div>
                                        </div>
                                        <label for="text2">Text2</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required="required" type="text" id="text2" class="form-control" name="text2" placeholder="Enter Text2 text" value="<?php echo $slider_data[0]['slider_text2'] ?>">
                                            </div>
                                        </div>
                                </div>

                            <?php echo "<input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' /> ";?>
                            <?php echo "</form>"?>
                        </div>
                    </div>
                </div>
            </div>