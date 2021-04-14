<a href="<?= $home_tenth_section_data[0]['home_content_details_readmore'] ?>" class="cta-link element-animate" data-animate-effect="fadeIn" data-toggle="modal" data-target="#modalAppointment">
      <span class="sub-heading"><?= $home_tenth_section_data[0]['home_content_details_title'] ?></span>
      <span class="heading"><?= $home_tenth_section_data[0]['home_content_details_desc'] ?></span>
    </a>

<footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row mb-5 element-animate">
          

          <?php echo html_entity_decode($fmenu); ?>



          <div class="col-md-3 mb-5">
            <h3>Location &amp; Contact</h3>
            <p class="mb-5"><?= $contact_data[0]['contact_addr'] ?></p>

            <h4 class="text-uppercase mb-3 h6 text-white">Email</h5>
            <p class="mb-5"><a href="mailto:<?= $contact_data[0]['contact_email1'] ?>"><?= $contact_data[0]['contact_email1'] ?></a></p>
            
            <h4 class="text-uppercase mb-3 h6 text-white">Phone</h5>
            <p><?= $contact_data[0]['contact_phone'] ?></p>

          </div>
        </div>

        <div class="row pt-md-3 element-animate">
          <div class="col-md-12">
            <hr class="border-t">
          </div>
          <div class="col-md-6 col-sm-12 copyright">
            <p>&copy; <?= $contact_data[0]['contact_sitelogo'] ?><a href="<?= base_url() ?>"></a></p>
          </div>
          <div class="col-md-6 col-sm-12 text-md-right text-sm-left">
            <a href="<?= $contact_data[0]['contact_fb'] ?>" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="<?= $contact_data[0]['contact_twt'] ?>" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="<?= $contact_data[0]['contact_ins'] ?>" class="p-2"><span class="fa fa-instagram"></span></a>
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->


    <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('appointmentadd'); ?>
            <input type="hidden" name="appointment_type" class="appointment_type" value="A">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_fname" class="text-black">First Name</label>
                    <input type="text" required="required"  class="form-control" name="fname" id=fname">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_lname" class="text-black">Last Name</label>
                    <input type="text" required="required"  name="lname" class="form-control" id="lname">
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input required="required" type="text" class="form-control" name="fname" id="appointment_name">
              </div> -->
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="email" required="required"  class="form-control" name="email" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" required="required"  class="form-control" name="date" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" required="required"  name="time" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea required="required"  name="msg" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="sendmessage" value="Send Message" class="btn btn-primary">
              </div>
            <?php echo form_close(); ?>
          </div>
          
        </div>
      </div>
    </div>

    <!--unniversal modal-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title">Please wait..</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Please wait..</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

    <script src="<?php echo ASSET_MAIN_URL; ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/popper.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/bootstrap-datepicker.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/jquery.timepicker.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo ASSET_MAIN_URL; ?>js/main.js"></script>

    <script>
    $(document).ready(function(){
      //alert('yutuytu');
      /*$("html, body").animate({ 
          scrollTop: $('.msg').offset().top 
      }, 0);*/

      /*$('html, body').animate({
          scrollTop: $('#scroll').offset().top
      }, 'slow');*/


      $(document).on('click','.learnmoreclick',function(){
        //alert('uiyiuy');
        var comp=$(this).attr('id');
          $('#'+comp+'contn').slideToggle('slow');
          return false;
      })

      /*$(container).on('click','.readmore',function(){
        alert('lkjhkhkjh');
        $('.modal-title').html(<?= $value['home_content_imglists_second_title'] ?>);
        $('.modal-body').html($('#descninth').val());
      })*/

    //showing the msaage on contact page main UI
    var msg=$('.msg').val();
    if(msg!=''){
      //alert('first');
      $('html, body').animate({
          scrollTop: $('#scroll').offset().top
      }, 'slow');
      $(".message").delay(9000).fadeOut(800);
    }else{
      //alert('not first');
    }


      
      
    });
    function readmore(initiate=false,title=false,desc=false){
      $(document).on('click','.'+initiate,function(){
        //alert('lkjhkhkjh');
        $('.modal-title').html($('.'+title).val());
        $('.modal-body').html($('.'+desc).val());
      })
    }
    </script>
  </body>
</html>