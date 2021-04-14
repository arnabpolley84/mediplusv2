    <?php
    if($slider_data){
    foreach ($slider_data as $key => $value) { ?>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('<?= base_url() ?>/uploads/<?= $value["slider_file"] ?>');background-size: 1250px 600px;">
        
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1><?= $value['slider_text1'] ?></h1>
              <p><?= $value['slider_text2'] ?>.</p>
            </div>
          </div>
        </div>

      </div>

    </section>
    <?php } } ?>
    <!-- END slider -->
    <?php

    if(!empty($this->session->userdata['content']['message'])){
      /*print '<pre>';
          print_r($this->session->userdata['content']['message']);
          print '<pre>';
          exit();*/
                ?>
                <div style="top: 5%; position: fixed; right: 50%; padding: 5px;" class="navbar-header message"> 
                  <?php echo $this->session->userdata['content']['message']; ?>
                  <input type="hidden" name="msg" class="msg" value="<?= $this->session->userdata['content']['message'] ?>">
                </div>
                <?php 
                $msg=$this->session->userdata['content']['message'];
                $this->session->unset_userdata['content']['message'];
                unset($msg);
                $this->session->userdata['content']['message']='';
                $_SESSION['content']['message']='';
                //echo "now". $_SESSION['logged_in']['message'];
    }else{ ?>
      <input type="hidden" name="msg" class="msg" value="">
    <?php } ?>
    
    <section class="section" id="scroll">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 element-animate">
            <?php echo form_open('appointmentadd'); ?>
            <input type="hidden" name="appointment_type" class="appointment_type" value="C">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="fname">First Name</label>
                  <input required="required" type="text" name="fname" class="form-control form-control-lg" id="fname">
                </div>
                <div class="col-md-6 form-group">
                  <label for="lname">Last Name</label>
                  <input required="required" type="text" name="lname" class="form-control form-control-lg" id="lname">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input required="required" type="email" name="email" id="email" class="form-control form-control-lg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea required="required" name="msg" id="message" class="form-control form-control-lg" cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" name="sendmessage" value="Send Message" class="btn btn-primary btn-lg btn-block">
                </div>

              </div>
           <?php echo form_close(); ?>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 element-animate">
            
            <h5 class="text-uppercase mb-3">Address</h5>
            <p class="mb-5">
              <?= $contact_data[0]['contact_addr'] ?>
            </p>
            
            <h5 class="text-uppercase mb-3">Email Us At</h5>
            <p class="mb-5"><a href="mailto:<?= $contact_data[0]['contact_email1'] ?>"><?= $contact_data[0]['contact_email1'] ?></a> <br> <a href="mailto:<?= $contact_data[0]['contact_email2'] ?>"><?= $contact_data[0]['contact_email2'] ?></a></p>
            
            <h5 class="text-uppercase mb-3">Call Us</h5>
            <p class="mb-5">
              <?= $contact_data[0]['contact_mobile'] ?>
            </p>
  

          </div>
        </div>
      </div>
    </section>

    


