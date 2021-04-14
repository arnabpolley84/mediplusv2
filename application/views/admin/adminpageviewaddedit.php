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
                <h2>SET PAGE</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Manage page here</small>
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
                                <h2>Page </h2>
                                <?php echo form_open('admin/content/page'); ?>
                                    
                                    <br>
                                    <label for="text1">Enter page name</label>
                                    <br>
                                    <input type="text" required="required" name="content_page" class="form-control" placeholder="Enter page name" />
                                    
                                    <br>
                                    
                                    
                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit'>Set page</button>
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
                                       <th class="centr">Page id</th> 
                                       <th class="centr">Page name</th>
                                       <!-- <th class="centr">Status</th> -->
                                       <!-- <th class="centr">Action</th> -->
                                        
                                     </tr>
                                    </thead>
                                    
                                    <tbody>

                                     <?php if(!empty($page_data)){ ?>
                                     <?php
                                     foreach ($page_data as $item => $value):?>
                                      <?php
                                       if($value['content_deleted']==0){
                                      ?>
                                        <tr>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['content_id'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['content_page'] ?>
                                         </td>
                                         <!-- <td class="centr">
                                            <?php
                                            if($value['content_status']==1){
                                                $activeclass="btn btn-primary waves-effect levermenu";
                                                $activestr='Activated';
                                            }else{
                                                $activeclass="btn btn-lg bg-pink waves-effect levermenu";
                                                $activestr='Deactivated';
                                            }
                                            ?>
                                            <button data-id="<?php echo $value['content_id'] ?>" data-stat="<?php echo $value['content_status'] ?>" class="<?php echo $activeclass; ?>"><?= $activestr ?></button>
                                         </td> -->
                                         <!-- <td class="centr"><button class="btn btn-lg bg-pink waves-effect editmenu" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['menu_id'] ?>">Edit</button>&nbsp;&nbsp;&nbsp;
                                         <button class="btn btn-lg bg-pink waves-effect delmenu" data-id="<?php echo $value['menu_id'] ?>" >Delete</button></td> -->
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