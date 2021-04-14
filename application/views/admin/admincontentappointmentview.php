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
    /*input{width: 250px !important ;}*/
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>VIEW APPOINTMENT</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>View appointment here</small>
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
                            <div class="row clearfix">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div style="padding:3%;" class="card">
                                <div class="header">
                                    <h2>
                                        APPOINTMENT RECORD
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
                                        
                                       <th class="centr">Name</th>
                                       <th class="centr">Email</th>
                                       <th class="centr">Appointment Date</th>
                                       <th class="centr">Appointment Time</th>
                                       <th class="centr">Appointment Msg</th>
                                       <th class="centr">Appointment Created on</th>
                                       <th class="centr">Action</th>
                                        
                                     </tr>
                                    </thead>
                                    
                                    <tbody>

                                     <?php if(!empty($appointment_data)){ ?>
                                     <?php
                                     
                                     foreach ($appointment_data as $item => $value):?>
                                      <?php
                                      
                                       if($value['appointment_deleted']==0){
                                      ?>
                                        <tr>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_fname'].' '.$value['appointment_lname'] ?>
                                         </td>
                                         
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_email'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_date'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_time'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_msg'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_createdon'] ?>
                                         </td>

                                         <input type="hidden" name="amsg" class="amsg<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_msg'] ?>">
                                         <input type="hidden" name="app_id" class="app_id<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_id'] ?>">
                                         <input type="hidden" name="app_fullname" class="app_fullname<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_fname'].' '.$value['appointment_lname'] ?>">
                                         <input type="hidden" name="app_email" class="app_email<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_email'] ?>">
                                         <input type="hidden" name="app_type" class="app_type<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_type'] ?>">
                                         <input type="hidden" name="app_createdon" class="app_createdon<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_createdon'] ?>">

                                         
                                         <td class="centr"><button class="btn btn-lg bg-pink waves-effect vapp" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['appointment_id'] ?>">View Message</button>&nbsp;&nbsp;&nbsp;
                                          <button class="btn btn-lg bg-pink waves-effect replyapp" data-toggle="modal" data-target="#modalAppointment" data-id="<?php echo $value['appointment_id'] ?>">Send Email</button>
                                          <a href="<?php echo base_url(); ?>admin/content/appointment/<?= $value['appointment_id'] ?>">
                                          <button class="btn btn-lg bg-pink waves-effect"  data-id="<?php echo $value['appointment_id'] ?>">View Detail</button></a>
                                         </td>
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


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>VIEW CONTACTED</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>View contacted record here</small>
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
                            <div class="row clearfix">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div style="padding:3%;" class="card">
                                <div class="header">
                                    <h2>
                                        CONTACTED RECORD
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
                                        
                                       <th class="centr">Name</th>
                                       <th class="centr">Email</th>
                                       <th class="centr">Contact Msg</th>
                                       <th class="centr">Contact Created on</th>
                                       <th class="centr">Action</th>
                                        
                                     </tr>
                                    </thead>
                                    
                                    <tbody>

                                     <?php if(!empty($contacted_data)){ ?>
                                     <?php
                                     
                                     foreach ($contacted_data as $item => $value):?>
                                      <?php
                                      
                                       if($value['appointment_deleted']==0){
                                      ?>
                                        <tr>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_fname'].' '.$value['appointment_lname'] ?>
                                         </td>
                                         
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_email'] ?>
                                         </td>
                                         
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_msg'] ?>
                                         </td>
                                         <td class="centr" style="text-align:center;">
                                            <?php echo $value['appointment_createdon'] ?>
                                         </td>

                                         <input type="hidden" name="amsg" class="amsg<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_msg'] ?>">
                                         <input type="hidden" name="app_id" class="app_id<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_id'] ?>">
                                         <input type="hidden" name="app_fullname" class="app_fullname<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_fname'].' '.$value['appointment_lname'] ?>">
                                         <input type="hidden" name="app_email" class="app_email<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_email'] ?>">
                                         <input type="hidden" name="app_type" class="app_type<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_type'] ?>">
                                         <input type="hidden" name="app_createdon" class="app_createdon<?php echo $value['appointment_id'] ?>" value="<?php echo $value['appointment_createdon'] ?>">
                                         

                                         <td class="centr"><button class="btn btn-lg bg-pink waves-effect vapp" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['appointment_id'] ?>">View Message</button>&nbsp;&nbsp;&nbsp;
                                          <button class="btn btn-lg bg-pink waves-effect replyapp" data-toggle="modal" data-target="#modalAppointment" data-id="<?php echo $value['appointment_id'] ?>">Send Email</button>
                                          <a href="<?php echo base_url(); ?>admin/content/appointment/<?= $value['appointment_id'] ?>">
                                          <button class="btn btn-lg bg-pink waves-effect"  data-id="<?php echo $value['appointment_id'] ?>">View Detail</button></a>
                                         </td>
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