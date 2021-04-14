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
  

    <section class="content" <?php if($appointment_data[0]['appointment_type'] == 'C'){ ?> style="display: none;" <?php } ?>>
        <div class="container-fluid">
            <div class="block-header">
                <h2>VIEW APPOINTMENT DETAIL</h2>
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
                                
                                      
                                         
                                            <input type="hidden" name="appointment_type" class="appointment_type" value="<?= $appointment_data[0]['appointment_type'] ?>">

                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="appointment_fname" class="text-black">First Name</label>
                                                    <input type="text" required="required"  class="form-control" name="fname" id=fname" value="<?= $appointment_data[0]['appointment_fname'] ?>">
                                                  </div>    
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="appointment_lname" class="text-black">Last Name</label>
                                                    <input type="text" required="required"  name="lname" class="form-control" id="lname"  value="<?= $appointment_data[0]['appointment_lname'] ?>">
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- <div class="form-group">
                                                <label for="appointment_name" class="text-black">Full Name</label>
                                                <input required="required" type="text" class="form-control" name="fname" id="appointment_name">
                                              </div> -->
                                              <div class="form-group">
                                                <label for="appointment_email" class="text-black">Email</label>
                                                <input type="email" required="required"  class="form-control" name="email" id="appointment_email" value="<?= $appointment_data[0]['appointment_email'] ?>">
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="appointment_date" class="text-black">Date</label>
                                                    <input type="text" required="required"  class="form-control" name="date" id="appointment_date" value="<?= $appointment_data[0]['appointment_date'] ?>">
                                                  </div>    
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="appointment_time" class="text-black">Time</label>
                                                    <input type="text" required="required"  name="time" class="form-control" id="appointment_time" value="<?= $appointment_data[0]['appointment_time'] ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              

                                              <div class="form-group">
                                                <label for="appointment_message" class="text-black">Message</label>
                                                <textarea required="required"  name="msg" id="appointment_message" class="form-control" cols="30" rows="10"><?= $appointment_data[0]['appointment_msg'] ?></textarea>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-md-6 form-group">
                                                   <button class="btn btn-lg bg-pink waves-effect replyapp" data-toggle="modal" data-target="#modalAppointment" data-id="<?= $appointment_data[0]['appointment_id'] ?>">Send Email</button>
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


    <section class="content" <?php if($appointment_data[0]['appointment_type'] == 'A'){ ?> style="display: none;" <?php } ?>>
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
                                   

                                   
                                      <input type="hidden" name="appointment_type" class="appointment_type" value="<?= $appointment_data[0]['appointment_type'] ?>">
                                      <div class="row">
                                        <div class="col-md-6 form-group">
                                          <label for="fname">First Name</label>
                                          <input required="required" type="text" name="fname" class="form-control form-control-lg" id="fname" value="<?= $appointment_data[0]['appointment_fname'] ?>">
                                        </div>
                                        <div class="col-md-6 form-group">
                                          <label for="lname">Last Name</label>
                                          <input required="required" type="text" name="lname" class="form-control form-control-lg" id="lname" value="<?= $appointment_data[0]['appointment_lname'] ?>">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 form-group">
                                          <label for="email">Email</label>
                                          <input required="required" type="email" name="email" id="email" class="form-control form-control-lg" value="<?= $appointment_data[0]['appointment_email'] ?>">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 form-group">
                                          <label for="message">Message</label>
                                          <textarea required="required" name="msg" id="message" class="form-control form-control-lg" cols="30" rows="8"><?= $appointment_data[0]['appointment_msg'] ?></textarea>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 form-group">
                                           <button class="btn btn-lg bg-pink waves-effect replyapp" data-toggle="modal" data-target="#modalAppointment" data-id="<?= $appointment_data[0]['appointment_id'] ?>">Send Email</button>
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