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
                <h2>SET CONTACT</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Manage contact details here</small>
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
                                <h2>Contact </h2>
                                <?php echo form_open('admin/content/contactaddedit'); ?>
                                    <input type="hidden" name="id" value="<?php echo $contact_data[0]['contact_id']; ?>">
                                    
                                    <label for="desc">Contact address</label>
                                    <br>
                                    <textarea rows="3" required="required" name="contact_addr" class="ta-formcontrol">
                                      <?= !empty($contact_data[0]['contact_addr']) ? trim($contact_data[0]['contact_addr']) : '' ?>
                                    </textarea>

                                    </br></br>

                                    <label for="text1">Enter contact email primary</label>
                                    <br>
                                    <input type="text" required="required" name="contact_email1" class="form-control" placeholder="Enter primary email" value="<?= !empty($contact_data[0]['contact_email1']) ? $contact_data[0]['contact_email1'] : '' ?>" />
                                    
                                    <br><br>
                                    
                                    <label for="text1">Enter contact email secondary</label>
                                    <br>
                                    <input type="text" required="required" name="contact_email2" class="form-control" placeholder="Enter contact secondary email" value="<?= !empty($contact_data[0]['contact_email2']) ? $contact_data[0]['contact_email2'] : '' ?>" />
                                    
                                    <br><br>

                                    <label for="text1">Enter contact phone</label>
                                    <br>
                                    <input type="text" required="required" name="contact_phone" class="form-control" placeholder="Enter contact phone" value="<?= !empty($contact_data[0]['contact_phone']) ? $contact_data[0]['contact_phone'] : '' ?>" />

                                    <br><br>

                                    <label for="text1">Enter contact mobile</label>
                                    <br>
                                    <input type="text" required="required" name="contact_mobile" class="form-control" placeholder="Enter contact phone" value="<?= !empty($contact_data[0]['contact_mobile']) ? $contact_data[0]['contact_mobile'] : '' ?>" />

                                    <br><br>

                                    <label for="text1">Enter contact fax</label>
                                    <br>
                                    <input type="text" required="required" name="contact_fax" class="form-control" placeholder="Enter contact fax" value="<?= !empty($contact_data[0]['contact_fax']) ? $contact_data[0]['contact_fax'] : '' ?>" />

                                    <br><br>

                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit'>Set contact</button>
                                <?php echo form_close(); ?>
                           </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>