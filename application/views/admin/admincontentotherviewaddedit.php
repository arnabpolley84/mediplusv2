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
                <h2>SET OTHER PAGES</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Manage other pages here</small>
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
                            

                           <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/
                                ?>
                                <h2>Other pages </h2>
                                <?php echo form_open('admin/content/othercontentpageadd'); ?>
                                                <label for="text1">Enter page name</label>
                                                <br>
                                                <input type="text" required="required" name="content_details_page" class="form-control" placeholder="Enter page name" />
                                                <br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmmt' type='submit' name='submit'>Set page</button>
                                <?php echo form_close(); ?>
                           </div>

                           <div class="divsec">
                            <div class="row clearfix">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div style="padding:3%;" class="card">
                                <div class="header">
                                    <h2>
                                        PAGE RECORD
                                    </h2>
                                </div>
                                <div class="body">
                                 <?php
                                    /*print '<pre>';
                                    print_r($slider_data);
                                    print '</pre>';*/
                                 ?>
                                 <div class="table-responsive">
                                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                     <tr>
                                        
                                       <th class="centr">Content page</th>
                                       <th class="centr">Status</th>
                                       <th class="centr">Action</th>
                                        
                                     </tr>
                                    </thead>
                                    
                                    <tbody>

                                     <?php if(!empty($other_section_content_data)){ ?>
                                     <?php
                                     foreach ($other_section_content_data as $item => $value):?>
                                      <?php
                                       if($value['content_deleted']==0){
                                      ?>
                                        <tr>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['content_page'] ?>
                                         </td>
                                         <td class="centr">
                                            <?php
                                            if($value['content_status']==1){
                                                $activeclass="btn btn-primary waves-effect leverpage";
                                                $activestr='Activated';
                                            }else{
                                                $activeclass="btn btn-lg bg-pink waves-effect leverpage";
                                                $activestr='Deactivated';
                                            }
                                            ?>
                                            <button data-id="<?php echo $value['content_id'] ?>" data-stat="<?php echo $value['content_status'] ?>" class="<?php echo $activeclass; ?>"><?= $activestr ?></button>
                                         </td>
                                         <td class="centr"><button class="btn btn-lg bg-pink waves-effect editcontent" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['content_id'] ?>">Edit</button>&nbsp;&nbsp;&nbsp;
                                         <button class="btn btn-lg bg-pink waves-effect delpage" data-id="<?php echo $value['content_id'] ?>" >Delete</button></td>
                                        </tr>
                                            <!-- <li><?php echo $item;?>: <?php echo $value;?></li> -->
                                     <?php } endforeach; } ?>
                                    </tbody>
                                  </table>
                                 </div>
                                </div>
                              </div>
                             </div>
                            </div>
                           </div>

                           <div class="divsec">
                                <!-- search -->
                                <?php echo form_open('admin/content/othercontentadd'); ?>
                                    
                                    <br><br>
                                        <label for="text1">Select page for view/edit</label>
                                    <br>

                                    <select required="required" class="formcontrol pge" name="content_details_cid">
                                        <option value="">Select page</option>
                                        <?php
                                        $contentdetailscid = !empty($contentdetails_cid) ? $contentdetails_cid : '0';
                                        if (!empty($other_section_content_data) && count($other_section_content_data) > 0) { ?>
                                            <?php
                                            foreach ($other_section_content_data as $key => $value) {
                                                if($value['content_id'] == $contentdetailscid){ ?>
                                                    <option selected="selected" value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option> <?php
                                                }else{ ?>
                                                    <option value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                                <?php } ?>
                                        
                                        <?php } } ?>
                                    </select>
                                    
                                    <br><br>
                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' value="search" name='submit'>Search</button>

                                <?php echo form_close(); ?>

                           </div>

                           <div class="divsec">

                                <?php
                                if (!empty($other_section_content_data) && count($other_section_content_data) > 0) { ?>

                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                    <br><br>
                                    <div class="containerclone">
                                        <?php
                                        if (!empty($other_section_data) && count($other_section_data) > 0) {
                                            $cntt=0;
                                            foreach ($other_section_data as $key => $value) {
                                                $cntt += 1;
                                                ?>
                                                <div class="lists">
                                                    <?php
                                                    if ($cntt > 1) { ?>
                                                        <p class='dele'><input style='margin-top:10px; margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect delt' type='button' name='' value='Delete this' /></p>
                                                    <?php } ?>
                                                    <?php echo form_open('admin/content/othercontentadd'); ?>
                                                    
                                                    <input type="hidden" name="content_details_id" class="contentdetails_id" value="<?= $value['content_details_id'] ?>">
                                                    <input type="hidden" name="content_details_cid" class="content_details_cid" value="<?= $value['content_details_cid'] ?>">

                                                    <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['content_details_deleted'] ?>">
                                                    <label for="desc">Content description</label>
                                                    <br>
                                                    <textarea rows="3" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['content_details_desc'] ?></textarea>
                                                    </br></br>
                                                    <label for="title">Content description(Learn more)</label>
                                                    <br>
                                                    <textarea rows="10" required="required" name="content_details_more_desc" class="ta-formcontrol"><?= $value['content_details_more_desc'] ?></textarea>
                                                    </br></br>
                                                    
                                                    <?php
                                                        if ($value['content_details_status'] == 1) {
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
                                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' value="submit"  type='submit' name='submit'>Submit</button>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            <?php } ?>
                                        <?php }else{ ?>
                                                <div class="lists">
                                                    <?php echo form_open('admin/content/othercontentadd'); ?>
                                                    <?php
                                                    $cid=(!empty($contentdetails_cid)) ? $contentdetails_cid : ''; ?>
                                                    <input type="hidden" name="content_details_id" class="contentdetails_id" value="">
                                                    <input type="hidden" name="content_details_cid" class="content_details_cid" value="<?= $cid ?>">

                                                    <input type="hidden" name="content_details_deleted" class="isdeleted" value="0">
                                                    <label for="title">Content title</label>
                                                    <br>
                                                    <textarea rows="3" required="required" name="content_details_desc" class="ta-formcontrol"></textarea>
                                                    </br></br>
                                                    <label for="title">Content description(Learn more)</label>
                                                    <br>
                                                    <textarea rows="10" required="required" name="content_details_more_desc" class="ta-formcontrol"></textarea>
                                                    </br></br>
                                                    
                                                    <select name="content_details_status" class="formcontrol">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <br><br>
                                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmt' value="submit" type='submit' name='submit'>Submit</button>
                                                    <?php echo form_close(); ?>
                                                </div>

                                        <?php } ?>
                                    </div>

                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmore' type='button' name='' value='Add more' />
                                    <br><br>

                                <?php } ?>
                           </div>

                           <div class="divsec">
                                
                                <?php
                                     /*print '<pre>';
                                     print_r($home_fourth_section_data);
                                     print '</pre>';*/

                                ?>
                                <h2>Amneties section </h2>
                                <!-- search -->
                                <?php echo form_open('admin/content/othercontentadd'); ?>
                                    
                                    <br><br>
                                        <label for="text1">Select page for view/edit</label>
                                    <br>

                                    <select required="required" class="formcontrol pge content_details_select_cid" name="content_details_select_cid">
                                        <option value="">Select page</option>
                                        <?php
                                        $contentdetails_second_cid = !empty($contentdetails_second_cid) ? $contentdetails_second_cid : '0';
                                        if (!empty($other_section_content_data) && count($other_section_content_data) > 0) { ?>
                                            <?php
                                            foreach ($other_section_content_data as $key => $value) {
                                                if($value['content_id'] == $contentdetails_second_cid){ ?>
                                                    <option selected="selected" value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option> <?php
                                                }else{ ?>
                                                    <option value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                                <?php } ?>
                                        
                                        <?php } } ?>
                                    </select>
                                    
                                    <br><br>
                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' value="searchsecond" name='submit'>Search</button>

                                <?php echo form_close(); ?>

                           
                                
                                <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoreoth' type='button' name='' value='Add more' />
                                <br><br>
                                <div class="containerothclone">
                                <?php
                                
                                    
                                    if (!empty($other_second_section_data)) {
                                        $cnt=count($other_second_section_data);
                                        $cntt=0;
                                        foreach ($other_second_section_data as $key => $value) {
                                            $cntt += 1;
                                            ?>
                                            <div class="listsoth">
                                                <?php
                                                if ($cntt > 1) { ?>
                                                    <p class='deleoth'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltoth' type='button' name='' value='Delete this' /></p>
                                                <?php } ?>
                                                <?php echo form_open_multipart('admin/content/othercontentadd'); ?>
                                                
                                                <input type="hidden" id="page" name="page" value="other">
                                                <input type="hidden" class="contentlistsid" name="content_details_lists_cid" value="<?= $contentdetails_second_cid ?>">
                                                <input type="hidden" name="listid" class="listid" value="<?= $value['other_content_lists_listid'] ?>">
                                                <input type="hidden" name="content_details_deleted" class="isdeleted" value="<?= $value['other_content_lists_deleted'] ?>">
                                                <label for="title">Content title</label>
                                                <br>
                                                <?php
                                                 if(!empty($value['other_content_lists_filename'])){
                                                    $imgname=$value['other_content_lists_filename'];
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
                                                <textarea rows="3" required="required" name="content_details_title" class="ta-formcontrol"><?= $value['other_content_lists_title'] ?></textarea>
                                                </br></br>
                                                <label for="title">Content description</label>
                                                <br>
                                                <textarea rows="10" required="required" name="content_details_desc" class="ta-formcontrol"><?= $value['other_content_lists_desc'] ?></textarea>
                                                </br></br>
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="<?= $value['other_content_lists_readmore'] ?>">
                                                <?php
                                                    if ($value['other_content_lists_status'] == 1) {
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
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmmt' value="submitsecond" type='submit' name='submit'>Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                            <div class="listsoth">
                                                <?php echo form_open('admin/content/othercontentadd'); ?>
                                                <input type="hidden" id="page" name="page" value="other"/>
                                                <input type="hidden" class="contentlistsid" name="content_details_lists_cid" value="<?= $contentdetails_second_cid ?>">
                                                <!-- <input type="hidden" class="contentlistsid" name="content_details_lists_cid" value=""> -->
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
                                                <label for="text1">Learn more</label>
                                                <input required="required" type="text" id="content_details_readmore" class="form-control" name="content_details_readmore" placeholder="Enter Read more link" value="" />
                                                <br>
                                                <label for="text1">Status</label>
                                                <br>
                                                <select name="content_details_status" class="formcontrol">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <br><br>
                                                <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect sbmmt' type='submit' name='submit' value="submitsecond">Submit</button>
                                                <?php echo form_close(); ?>
                                            </div>

                                    <?php } ?>
                                
                                </div>
                                    <input style='margin-top:15px;float: right;' class='btn btn-lg bg-pink waves-effect addmoreoth' type='button' name='' value='Add more' />
                                    <br><br>
                           </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function(){
            //alert('jjjjj');
            $(".content_details_select_cid").change(function(){
                //alert($(this).val());
                $(".contentlistsid").val($(this).val());
                return false;
            })
        })
    </script>