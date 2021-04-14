<?php
/*print '<pre>';
print_r($other_section_content_data[0]);
print '</pre>';*/
?>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">

                        <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/
                                ?>
                                <h2>Menus </h2>
                                <?php echo form_open('admin/content/contentmenuedit'); ?>
                                    <input type="hidden" name="id" value="<?php echo $menu_data[0]['menu_id'] ?>">
                                    <br><br>
                                    <label for="text1">Enter parent menu name</label>
                                    <br><br>
                                    <select required="required" class="formcontrol mnu" name="menu_pid">
                                        <option value="">Select parent menu</option>
                                        <option value="0">no parent</option>
                                        <?php
                                        $contentdetailscid = !empty($contentdetails_cid) ? $contentdetails_cid : '0';
                                        if (!empty($menu_data_all) && count($menu_data_all) > 0) { ?>
                                            <?php
                                            foreach ($menu_data_all as $key => $value) {
                                                if($value['menu_id'] == $menu_data[0]['menu_pid']){ ?>
                                                    <option selected="selected" value="<?= $value['menu_id'] ?>"><?= $value['menu_title'] ?></option> <?php
                                                }else{ ?>
                                                    <option value="<?= $value['menu_id'] ?>"><?= $value['menu_title'] ?></option>
                                                <?php } ?>
                                        
                                        <?php } } ?>
                                    </select>
                                    <br><br>
                                    <label for="text1">Enter menu name</label>
                                    <br>
                                    <input type="text" required="required" name="menu_title" class="form-control" placeholder="Enter menu name" value="<?php echo $menu_data[0]['menu_title'] ?>" />
                                    <br><br>
                                    <label for="text1">Enter page name</label>
                                    <br><br>
                                    <select required="required" class="formcontrol editpageset" name="menu_cid">
                                        <option value="0">No page</option>
                                        
                                        <?php
                                        
                                        if (!empty($content_data) && count($content_data) > 0) { ?>
                                            <?php
                                            foreach ($content_data as $key => $value) {
                                                if($value['content_id'] == $menu_data[0]['menu_cid']){ ?>
                                                    <option selected="selected" value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option> <?php
                                                }else{ ?>
                                                    <option value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                                <?php } ?>
                                        
                                        <?php } } ?>
                                    </select>
                                    <br><br>
                                    <label for="text1">Enter menu link</label>
                                    <br>
                                    <input type="text" required="required" name="menu_link" class="form-control edit_menu_link" placeholder="Enter menu link" value="<?php echo $menu_data[0]['menu_link'] ?>" />
                                    <input type="hidden" name="menu_link_hid" class="edit_menu_link_hid" value="<?php echo $menu_data[0]['menu_link'] ?>" />
                                    <br>
                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit'>Set menu</button>
                                <?php echo form_close(); ?>
                        </div>

                    </div>
                </div>
            </div>