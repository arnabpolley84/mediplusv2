<style type="text/css">
    .lists,.listssix,.listsnin{
        box-shadow: 0px 0px 5px 0px;
        margin-bottom: 5%;
        padding: 2%;
    }
    .dropdown-toggle,.dropdown-menu{display: none;}
    .formcontrol{
        width: 250px;
        height: 33px;
        border: 1px solid lightgrey;
        border-radius: 5px 5px 5px 5px;
    }
    .ta-formcontrol{
        width: 100%;
        border: 1px solid lightgrey;
        border-radius: 5px 5px 5px 5px;
    }
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SET ABOUT</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                
                                <small>Manage about page here</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            
                            <!--About first section-->
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>First section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclone">
                                <?php
                                
                                    $cnt=count($about_first_section_data);
                                    if (!empty($about_first_section_data) && $cnt > 0) {
                                        $cntt=0;
                                        foreach ($about_first_section_data as $key => $value) {
                                            $cntt += 1;
                                            ?>
                                            <div class="lists">
                                                <?php
                                                if ($cntt > 1) { ?>
                                                    <p class='dele'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect delt' type='button' name='' value='Delete this' /></p>
                                                <?php } ?>
                                                <?php echo form_open('admin/content/aboutcontentadd/1'); ?>
                                                <input type="hidden" id="page" name="page" value="about">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['about_content_lists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['about_content_lists_deleted'] ?>">
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['about_content_lists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['about_content_lists_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $value['about_content_lists_readmore'] ?>">
                                                <?php
                                                    if ($value['about_content_lists_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="lists">
                                                <?php echo form_open('admin/content/aboutcontentadd/1'); ?>
                                                <input type="hidden" id="page" name="page" value="about"/>
                                                <input type="hidden" class="listid" name="listid" value="1"/>
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="" />
                                                
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                    <br><br>
                            </div>

                            <!--About second section-->
                            <!-- <div class="divsec">
                                <?php echo form_open_multipart('admin/content/aboutcontentadd/2'); ?>
                                
                                <h2>Second section </h2>
                                <?php
                                     if(!empty($about_second_section_data[0]['about_content_images_filename'])){
                                        $imgname=$about_second_section_data[0]['about_content_images_filename'];
                                     }else{
                                        $imgname='noimg.png';
                                     }
                                ?>
                                <div class="image">
                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                </div>
                                <label for="text1">Upload image</label>
                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                <?php echo "<input required='required' class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div> -->




                            <!--About second section-->
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Second section </h2>
                                
                                
                                <br><br>
                                <div class="containerclonesix">
                                <?php
                                
                                    
                                    if (!empty($about_second_section_data) && $cnt > 0) {
                                        $cnttsix=0;
                                        foreach ($about_second_section_data as $key => $value) {
                                            $cnttsix += 1;
                                            ?>
                                            <div class="listssix">
                                                <?php
                                                if ($cnttsix > 1) { ?>
                                                    <p class='delesix'><button style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltsix' name=''>Delete this</button></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/aboutcontentadd/2'); ?>
                                                <input type="hidden" id="page" name="page" value="about">
                                                
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['about_content_images_deleted'] ?>">
                                                <?php
                                                 if(!empty($value['about_content_images_filename'])){
                                                    $imgname=$value['about_content_images_filename'];
                                                 }else{
                                                    $imgname='noimg.png';
                                                 }
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>

                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['about_content_images_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['about_content_images_description'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Get in touch link</label>
                                                <input required="required" type="text" id="content_details_link" class="form-control" name="content_details_link" placeholder="Enter get in touch link" value="<?= $value['about_content_images_link'] ?>">
                                                </br></br>
                                                
                                                <?php
                                                    if ($value['about_content_images_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="listssix">
                                                <?php echo form_open_multipart('admin/content/aboutcontentadd/2'); ?>
                                                <input type="hidden" id="page" name="page" value="about"/>
                                                
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <?php
                                                     
                                                     $imgname='noimg.png';
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                
                                                </br></br>
                                                <label for="text1">Get in touch link</label>
                                                <input required="required" type="text" id="content_details_link" class="form-control" name="content_details_link" placeholder="Enter Get in touch link" value="">
                                                </br></br>
                                                
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    
                            </div>








                            <!--About third section-->
                            <div class="divsec">
                                <?php echo form_open('admin/content/aboutcontentadd/3'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $about_third_section_data[0]['about_content_details_title'])){
                                        $titlesecond= $about_third_section_data[0]['about_content_details_title'];
                                     }else{
                                        $titlesecond= '';
                                     }
                                     if(!empty( $about_third_section_data[0]['about_content_details_desc'])){
                                        $descsecond= $about_third_section_data[0]['about_content_details_desc'];
                                     }else{
                                        $descsecond= '';
                                     }
                                
                                ?>
                                <h2>Third section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titlesecond ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $descsecond ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>

                            <!--About fourth section-->
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Fourth section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoresix' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclonesix">
                                <?php
                                
                                    
                                    if (!empty($about_fourth_section_data) && $cnt > 0) {
                                        $cnttsix=0;
                                        foreach ($about_fourth_section_data as $key => $value) {
                                            $cnttsix += 1;
                                            ?>
                                            <div class="listssix">
                                                <?php
                                                if ($cnttsix > 1) { ?>
                                                    <p class='delesix'><button style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltsix' name=''>Delete this</button></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/aboutcontentadd/4'); ?>
                                                <input type="hidden" id="page" name="page" value="about">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['about_content_imglists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['about_content_imglists_deleted'] ?>">
                                                <?php
                                                 if(!empty($value['about_content_imglists_filename'])){
                                                    $imgname=$value['about_content_imglists_filename'];
                                                 }else{
                                                    $imgname='noimg.png';
                                                 }
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>

                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['about_content_imglists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['about_content_imglists_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Facebook link</label>
                                                <input required="required" type="text" id="content_details_fblink" class="form-control" name="content_details_fblink" placeholder="Enter Read more link" value="<?= $value['about_content_imglists_fblink'] ?>">
                                                </br></br>
                                                <label for="text1">Twitter link</label>
                                                <input required="required" type="text" id="content_details_twtlink" class="form-control" name="content_details_twtlink" placeholder="Enter Read more link" value="<?= $value['about_content_imglists_twtlink'] ?>">
                                                </br></br>
                                                <label for="text1">Linkedin link</label>
                                                <input required="required" type="text" id="content_details_lklink" class="form-control" name="content_details_lklink" placeholder="Enter Read more link" value="<?= $value['about_content_imglists_lklink'] ?>">
                                                <?php
                                                    if ($value['about_content_imglists_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="listssix">
                                                <?php echo form_open_multipart('admin/content/aboutcontentadd/4'); ?>
                                                <input type="hidden" id="page" name="page" value="about"/>
                                                <input type="hidden" class="listid" name="listid" value="1"/>
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <?php
                                                     
                                                     $imgname='noimg.png';
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                
                                                </br></br>
                                                <label for="text1">Facebook link</label>
                                                <input required="required" type="text" id="content_details_fblink" class="form-control" name="content_details_fblink" placeholder="Enter Read more link" value="">
                                                </br></br>
                                                <label for="text1">Twitter link</label>
                                                <input required="required" type="text" id="content_details_twtlink" class="form-control" name="content_details_twtlink" placeholder="Enter Read more link" value="">
                                                </br></br>
                                                <label for="text1">Linkedin link</label>
                                                <input required="required" type="text" id="content_details_lklink" class="form-control" name="content_details_lklink" placeholder="Enter Read more link" value="">
                                                <br><br>
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoresix' type='button' name='' value='Add more' />
                                    <br><br>
                            </div>

                            <!--About fifth section-->
                            <div class="divsec">
                                <?php echo form_open('admin/content/aboutcontentadd/5'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $about_fifth_section_data[0]['about_content_details_title'])){
                                        $titletenth= $about_fifth_section_data[0]['about_content_details_title'];
                                     }else{
                                        $titletenth= '';
                                     }
                                     if(!empty( $about_fifth_section_data[0]['about_content_details_desc'])){
                                        $desctenth= $about_fifth_section_data[0]['about_content_details_desc'];
                                     }else{
                                        $desctenth= '';
                                     }
                                
                                ?>
                                <h2>Fifth section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titletenth ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $desctenth ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>







                            <!-- <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/1'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                    if(!empty( $home_frst_section_data[0]['home_content_details_title'])){
                                        $titlefirst= $home_frst_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titlefirst= '';
                                     }
                                     if(!empty( $home_frst_section_data[0]['home_content_details_desc'])){
                                        $descfirst= $home_frst_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $descfirst= '';
                                     }
                                     if(!empty( $home_frst_section_data[0]['home_content_details_readmore'])){
                                        $readmorefirst= $home_frst_section_data[0]['home_content_details_readmore'];
                                     }else{
                                        $readmorefirst= '';
                                     }

                                ?>
                                <h2>First section </h2>
                                <input type="hidden" id="page" name="page" value="home">
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titlefirst ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $descfirst ?></textarea>
                                </br></br>
                                <label for="text1">Read more</label>
                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $readmorefirst ?>">
                                        
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/2'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $home_second_section_data[0]['home_content_details_title'])){
                                        $titlesecond= $home_second_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titlesecond= '';
                                     }
                                     if(!empty( $home_second_section_data[0]['home_content_details_desc'])){
                                        $descsecond= $home_second_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $descsecond= '';
                                     }
                                
                                ?>
                                <h2>Second section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titlesecond ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $descsecond ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                <?php echo form_open_multipart('admin/content/homecontentadd/3'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_third_section_data);
                                    print '</pre>';*/
                                ?>
                                <h2>Third section </h2>
                                <?php
                                     if(!empty($home_third_section_data[0]['home_content_images_filename'])){
                                        $imgname=$home_third_section_data[0]['home_content_images_filename'];
                                     }else{
                                        $imgname='noimg.png';
                                     }
                                ?>
                                <div class="image">
                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                </div>
                                <label for="text1">Upload image</label>
                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                <?php echo "<input required='required' class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Fourth section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclone">
                                <?php
                                
                                    $cnt=count($home_fourth_section_data);
                                    if (!empty($home_fourth_section_data) && $cnt > 0) {
                                        $cntt=0;
                                        foreach ($home_fourth_section_data as $key => $value) {
                                            $cntt += 1;
                                            ?>
                                            <div class="lists">
                                                <?php
                                                if ($cntt > 1) { ?>
                                                    <p class='dele'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect delt' type='button' name='' value='Delete this' /></p>
                                                <?php } ?>
                                                <?php echo form_open('admin/content/homecontentadd/4'); ?>
                                                <input type="hidden" id="page" name="page" value="home">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['home_content_lists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['home_content_lists_deleted'] ?>">
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['home_content_lists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['home_content_lists_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $value['home_content_lists_readmore'] ?>">
                                                <?php
                                                    if ($value['home_content_lists_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="lists">
                                                <?php echo form_open('admin/content/homecontentadd/4'); ?>
                                                <input type="hidden" id="page" name="page" value="home"/>
                                                <input type="hidden" class="listid" name="listid" value="1"/>
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="" />
                                                
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                    <br><br>
                            </div>
                            <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/5'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $home_fifth_section_data[0]['home_content_details_title'])){
                                        $titlefifth= $home_fifth_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titlefifth= '';
                                     }
                                     if(!empty( $home_fifth_section_data[0]['home_content_details_desc'])){
                                        $descfifth= $home_fifth_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $descfifth= '';
                                     }
                                
                                ?>
                                <h2>Fifth section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titlefifth ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $descfifth ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Sixth section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoresix' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclonesix">
                                <?php
                                
                                    
                                    if (!empty($home_sixth_section_data) && $cnt > 0) {
                                        $cnttsix=0;
                                        foreach ($home_sixth_section_data as $key => $value) {
                                            $cnttsix += 1;
                                            ?>
                                            <div class="listssix">
                                                <?php
                                                if ($cnttsix > 1) { ?>
                                                    <p class='delesix'><button style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltsix' name=''>Delete this</button></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/homecontentadd/6'); ?>
                                                <input type="hidden" id="page" name="page" value="home">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['home_content_imglists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['home_content_imglists_deleted'] ?>">
                                                <?php
                                                 if(!empty($value['home_content_imglists_filename'])){
                                                    $imgname=$value['home_content_imglists_filename'];
                                                 }else{
                                                    $imgname='noimg.png';
                                                 }
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>

                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['home_content_imglists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['home_content_imglists_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Facebook link</label>
                                                <input required="required" type="text" id="content_details_fblink" class="form-control" name="content_details_fblink" placeholder="Enter Read more link" value="<?= $value['home_content_imglists_fblink'] ?>">
                                                </br></br>
                                                <label for="text1">Twitter link</label>
                                                <input required="required" type="text" id="content_details_twtlink" class="form-control" name="content_details_twtlink" placeholder="Enter Read more link" value="<?= $value['home_content_imglists_twtlink'] ?>">
                                                </br></br>
                                                <label for="text1">Linkedin link</label>
                                                <input required="required" type="text" id="content_details_lklink" class="form-control" name="content_details_lklink" placeholder="Enter Read more link" value="<?= $value['home_content_imglists_lklink'] ?>">
                                                <?php
                                                    if ($value['home_content_imglists_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="listssix">
                                                <?php echo form_open_multipart('admin/content/homecontentadd/6'); ?>
                                                <input type="hidden" id="page" name="page" value="home"/>
                                                <input type="hidden" class="listid" name="listid" value="1"/>
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <?php
                                                     
                                                     $imgname='noimg.png';
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                
                                                </br></br>
                                                <label for="text1">Facebook link</label>
                                                <input required="required" type="text" id="content_details_fblink" class="form-control" name="content_details_fblink" placeholder="Enter Read more link" value="">
                                                </br></br>
                                                <label for="text1">Twitter link</label>
                                                <input required="required" type="text" id="content_details_twtlink" class="form-control" name="content_details_twtlink" placeholder="Enter Read more link" value="">
                                                </br></br>
                                                <label for="text1">Linkedin link</label>
                                                <input required="required" type="text" id="content_details_lklink" class="form-control" name="content_details_lklink" placeholder="Enter Read more link" value="">
                                                <br><br>
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoresix' type='button' name='' value='Add more' />
                                    <br><br>
                            </div>
                            <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/7'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                    if(!empty( $home_seventh_section_data[0]['home_content_details_title'])){
                                        $titleseventh= $home_seventh_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titleseventh= '';
                                     }
                                     if(!empty( $home_seventh_section_data[0]['home_content_details_desc'])){
                                        $descseventh= $home_seventh_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $descseventh= '';
                                     }
                                     if(!empty( $home_seventh_section_data[0]['home_content_details_readmore'])){
                                        $readmoreseventh= $home_seventh_section_data[0]['home_content_details_readmore'];
                                     }else{
                                        $readmoreseventh= '';
                                     }

                                ?>
                                <h2>Seventh section </h2>
                                <input type="hidden" id="page" name="page" value="home">
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titleseventh ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $descseventh ?></textarea>
                                </br></br>
                                <label for="text1">Read more</label>
                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $readmoreseventh ?>">
                                        
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/8'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $home_eighth_section_data[0]['home_content_details_title'])){
                                        $titleeighth= $home_eighth_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titleeighth= '';
                                     }
                                     if(!empty( $home_eighth_section_data[0]['home_content_details_desc'])){
                                        $desceighth= $home_eighth_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $desceighth= '';
                                     }
                                
                                ?>
                                <h2>Eighth section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titleeighth ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $desceighth ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div>
                            <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Nineth section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmorenin' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclonenin">
                                <?php
                                
                                    
                                    if (!empty($home_ninth_section_data) && $cnt > 0) {
                                        $cnttnin=0;
                                        foreach ($home_ninth_section_data as $key => $value) {
                                            $cnttnin += 1;
                                            ?>
                                            <div class="listsnin">
                                                <?php
                                                if ($cnttnin > 1) { ?>
                                                    <p class='delenin'><button style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltnin' name=''>Delete this</button></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/homecontentadd/9'); ?>
                                                <input type="hidden" id="page" name="page" value="home">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['home_content_imglists_second_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['home_content_imglists_second_deleted'] ?>">
                                                <?php
                                                 if(!empty($value['home_content_imglists_second_filename'])){
                                                    $imgname=$value['home_content_imglists_second_filename'];
                                                 }else{
                                                    $imgname='noimg.png';
                                                 }
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>

                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['home_content_imglists_second_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['home_content_imglists_second_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Read more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $value['home_content_imglists_second_readmore'] ?>">
                                                <br><br>
                                                <?php
                                                    if ($value['home_content_imglists_second_status'] == 1) {
                                                        $activeselect='selected';
                                                        $deactiveselect='';
                                                    }else{
                                                        $activeselect='';
                                                        $deactiveselect='selected';
                                                    }
                                                ?>
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select class="formcontrol" name="content_details_status">
                                                    <option <?= $activeselect ?> value="1">Active</option>
                                                    <option <?= $deactiveselect ?> value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="listssix">
                                                <?php echo form_open_multipart('admin/content/homecontentadd/9'); ?>
                                                <input type="hidden" id="page" name="page" value="home"/>
                                                <input type="hidden" class="listid" name="listid" value="1"/>
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                <?php
                                                     
                                                     $imgname='noimg.png';
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                </div>
                                                <label for="text1">Upload image</label>
                                                <input type="hidden" name="uploadfile" value="uploadfile" />
                                                <?php echo "<input class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>
                                                <br>
                                                <label for="title">Content title</label>
                                                <br>
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                
                                                </br></br>
                                                <label for="text1">Read more</label>
                                                <input required="required" type="text" id="content_details_reamore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="">
                                                </br></br>
                                                
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmorenin' type='button' name='' value='Add more' />
                                    <br><br>
                            </div>
                            <div class="divsec">
                                <?php echo form_open('admin/content/homecontentadd/10'); ?>
                                <?php
                                    /*print '<pre>';
                                    print_r($home_first_section_data);
                                    print '</pre>';*/

                                     if(!empty( $home_tenth_section_data[0]['home_content_details_title'])){
                                        $titletenth= $home_tenth_section_data[0]['home_content_details_title'];
                                     }else{
                                        $titletenth= '';
                                     }
                                     if(!empty( $home_tenth_section_data[0]['home_content_details_desc'])){
                                        $desctenth= $home_tenth_section_data[0]['home_content_details_desc'];
                                     }else{
                                        $desctenth= '';
                                     }
                                
                                ?>
                                <h2>Tenth section </h2>
                                <label for="title">Content title</label>
                                <textarea name="content_details_title" class="ckeditor"><?= $titletenth ?></textarea>
                                </br></br>
                                <label for="title">Content description</label>
                                <textarea name="content_details_desc" class="ckeditor"><?= $desctenth ?></textarea>
                                <input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' />
                                <?php echo form_close(); ?>
                            </div> -->


                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>

    

