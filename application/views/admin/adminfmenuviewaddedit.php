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
    input{width: 250px !important ;}
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SET FOOTER MENU</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Manage footer menu here</small>
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
                                <h2>Menus </h2>
                                <?php echo form_open('admin/content/fmenu'); ?>

                                    <select required="required" class="formcontrol mnu" name="menu_pid">
                                        
                                        <option value="0">no parent</option>
                                        <?php
                                        $contentdetailscid = !empty($contentdetails_cid) ? $contentdetails_cid : '0';
                                        if (!empty($menu_data) && count($menu_data) > 0) { ?>
                                            <?php
                                            foreach ($menu_data as $key => $value) {
                                                if($value['fmenu_id'] == $contentdetailscid){ ?>
                                                    <option selected="selected" value="<?= $value['fmenu_id'] ?>"><?= $value['fmenu_title'] ?></option> <?php
                                                }else{ ?>
                                                    <option value="<?= $value['fmenu_id'] ?>"><?= $value['fmenu_title'] ?></option>
                                                <?php } ?>
                                        
                                        <?php } } ?>
                                    </select>
                                    <br><br>
                                    <label for="text1">Enter menu name</label>
                                    <br>
                                    <input type="text" required="required" name="menu_title" class="form-control" placeholder="Enter menu name" />
                                    <br>
                                    <label for="text1">Enter page name</label>
                                    <br>
                                    <select required="required" class="formcontrol pageset" name="menu_cid">
                                        <option value="0">No page</option>
                                        <?php
                                        
                                        if (!empty($content_data) && count($content_data) > 0) { ?>
                                            <?php
                                            foreach ($content_data as $key => $value) { ?>
                                                    <option data-value="<?= $value['content_page'] ?>" value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                                <?php } ?>
                                        
                                        <?php }  ?>
                                    </select>
                                    <br><br>
                                    <label for="text1">Enter menu link</label>
                                    <br>
                                    <input type="text" required="required" name="menu_link" class="form-control menu_link" placeholder="Enter menu link" />
                                    <input type="hidden" name="menu_link_hid" class="menu_link_hid" value="<?php echo $menu_data[0]['fmenu_link'] ?>" />
                                    <br>

                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit'>Set footer menu</button>
                                <?php echo form_close(); ?>
                           </div>

                           <div class="divsec">
                            <div class="row clearfix">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div style="padding:3%;" class="card">
                                <div class="header">
                                    <h2>
                                        MENU RECORD
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
                                        
                                       <th class="centr">Menu name</th>
                                       <th class="centr">Status</th>
                                       <th class="centr">Action</th>
                                        
                                     </tr>
                                    </thead>
                                    
                                    <tbody>

                                     <?php if(!empty($menu_data)){ ?>
                                     <?php
                                     foreach ($menu_data as $item => $value):?>
                                      <?php
                                       if($value['fmenu_deleted']==0){
                                      ?>
                                        <tr>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['fmenu_title'] ?>
                                         </td>
                                         <td class="centr">
                                            <?php
                                            if($value['fmenu_status']==1){
                                                $activeclass="btn btn-primary waves-effect leverfmenu";
                                                $activestr='Activated';
                                            }else{
                                                $activeclass="btn btn-lg bg-pink waves-effect leverfmenu";
                                                $activestr='Deactivated';
                                            }
                                            ?>
                                            <button data-id="<?php echo $value['fmenu_id'] ?>" data-stat="<?php echo $value['fmenu_status'] ?>" class="<?php echo $activeclass; ?>"><?= $activestr ?></button>
                                         </td>
                                         <td class="centr"><button class="btn btn-lg bg-pink waves-effect editfmenu" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['fmenu_id'] ?>">Edit</button>&nbsp;&nbsp;&nbsp;
                                         <button class="btn btn-lg bg-pink waves-effect delfmenu" data-id="<?php echo $value['fmenu_id'] ?>" >Delete</button></td>
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

                           

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>