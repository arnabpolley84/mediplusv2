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
                <h2>SET SOCIAL AND SITE</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Manage social and site details here</small>
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
                                <h2>Social and Site Manage</h2>
                                <?php echo form_open('admin/content/socialaddedit'); ?>
                                    <input type="hidden" name="id" value="<?php echo $contact_data[0]['contact_id']; ?>">

                                    <label for="text1">Enter facebook link</label>
                                    <br>
                                    <input type="text" name="contact_fb" class="form-control" placeholder="Enter facebook link" value="<?= !empty($contact_data[0]['contact_fb']) ? $contact_data[0]['contact_fb'] : '' ?>" />
                                    
                                    <br><br>
                                    
                                    <label for="text1">Enter twitter link</label>
                                    <br>
                                    <input type="text" name="contact_twt" class="form-control" placeholder="Enter twitter link" value="<?= !empty($contact_data[0]['contact_twt']) ? $contact_data[0]['contact_twt'] : '' ?>" />
                                    
                                    <br><br>

                                    <label for="text1">Enter instagram link</label>
                                    <br>
                                    <input type="text" name="contact_ins" class="form-control" placeholder="Enter instagram link" value="<?= !empty($contact_data[0]['contact_ins']) ? $contact_data[0]['contact_ins'] : '' ?>" />

                                    <br><br>

                                    <label for="text1">Enter linkedIn link</label>
                                    <br>
                                    <input type="text" name="contact_lnk" class="form-control" placeholder="Enter linkedIn link" value="<?= !empty($contact_data[0]['contact_lnk']) ? $contact_data[0]['contact_lnk'] : '' ?>" />

                                    <br><br>

                                    <label for="text1">Enter youtube link</label>
                                    <br>
                                    <input type="text" name="contact_youtb" class="form-control" placeholder="Enter youtube link" value="<?= !empty($contact_data[0]['contact_youtb']) ? $contact_data[0]['contact_youtb'] : '' ?>" />

                                    <br><br>

                                    <label for="desc">Site Logo</label>
                                    <br>
                                    <textarea rows="3" name="contact_sitelogo" class="ta-formcontrol">
                                      <?= !empty($contact_data[0]['contact_sitelogo']) ? trim($contact_data[0]['contact_sitelogo']) : '' ?>
                                    </textarea>

                                    </br></br>

                                    <button style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit'>Set social</button>
                                <?php echo form_close(); ?>
                           </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            
        </div>
    </section>