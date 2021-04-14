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
                <h2>SET NEWS</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                
                                <small>Manage news page here</small>
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
                                     print_r($news_first_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>First section </h2>
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoresix' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerclonesix">
                                <?php
                                
                                    $cnt=count($news_first_section_data);
                                    if (!empty($news_first_section_data) && $cnt > 0) {
                                        $cnttsix=0;
                                        foreach ($news_first_section_data as $key => $value) {
                                            $cnttsix += 1;
                                            ?>
                                            <div class="listssix">
                                                <?php
                                                if ($cnttsix > 1) { ?>
                                                    <p class='delesix'><button style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltsix' name=''>Delete this</button></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/newscontentadd/1'); ?>
                                                <input type="hidden" id="page" name="page" value="news">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['news_content_imglists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['news_content_imglists_deleted'] ?>">
                                                <?php
                                                 if(!empty($value['news_content_imglists_filename'])){
                                                    $imgname=$value['news_content_imglists_filename'];
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
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['news_content_imglists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['news_content_imglists_desc'] ?></textarea>
                                                
                                                <?php
                                                    if ($value['news_content_imglists_status'] == 1) {
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
                                                <?php echo form_open_multipart('admin/content/newscontentadd/1'); ?>
                                                <input type="hidden" id="page" name="page" value="news"/>
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


                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>

    

