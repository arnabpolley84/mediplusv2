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


    <section class="section bg-light custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate" data-animate-effect="fadeInLeft">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <?php
              $j=0;
              foreach ($about_first_section_data as $key => $value) { 
                $j++ ;
                if($j==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                } ?>
                <a style="font-size:20px;" class="nav-link<?= $clsadd ?>" id=v-pills-<?= $value['about_content_lists_id'] ?> data-toggle="pill" href="#v-pills-<?= $value['about_content_lists_id'] ?>" role="tab" aria-controls="v-pills-<?= $value['about_content_lists_id'] ?>" aria-selected="true"><span>01</span><?= $value['about_content_lists_title'] ?></a>
                

               <?php } ?>



              <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>02</span> Medical Services</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
              <span>03</span> Patient Services</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
              <span>04</span> Expert Doctors</a> -->
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate" data-animate-effect="fadeInLeft">
            
            <div class="tab-content" id="v-pills-tabContent">
              
              <?php
              $i=0;
              foreach ($about_first_section_data as $key => $value) { $i++ ;
                if($i==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                }
                ?>

              <div class="tab-pane fade<?= $clsadd ?>" id="v-pills-<?= $value['about_content_lists_id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $value['about_content_lists_id'] ?>-tab">
                <!-- <span class="icon flaticon-hospital"></span> -->
                <h3 class="text-primary"><?= $value['about_content_lists_desc'] ?></h3>
                <p style="font-size: 1.15rem;" class="lead"></p>
                <p><a href="<?= $value['about_content_lists_readmore'] ?>" class="btn btn-primary">Learn More</a></p>
              </div>

              <?php } ?>


              <!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <span class="icon flaticon-hospital"></span>
                <h2 class="text-primary">Amenities</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div> -->
              
              <!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <span class="icon flaticon-first-aid-kit"></span>
                <h2 class="text-primary">Medical Services</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <span class="icon flaticon-hospital-bed"></span>
                <h2 class="text-primary">Patient Services</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <span class="icon flaticon-doctor"></span>
                <h2 class="text-primary">Expert Doctors</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 element-animate">
            <img src="<img src="<?= base_url() ?>/uploads/<?= $about_second_section_data[0]['about_content_images_filename'] ?>" class="img-fluid mb-4" alt="Image placeholder">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 element-animate">
            <h2 class="text-uppercase mb-4"><?= $about_second_section_data[0]['about_content_images_title'] ?></h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p> -->
            <p class="mb-5"><?= $about_second_section_data[0]['about_content_images_description'] ?></p>
            <p><a href="#" class="btn btn-primary">Get In Touch</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4"><?= $about_third_section_data[0]['about_content_details_title'] ?></h2>
            <p class="mb-0 lead"><?= $about_third_section_data[0]['about_content_details_desc'] ?></p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
            


            <?php $i=1;
            foreach ($about_fourth_section_data as $key => $value) { ?>
            <div>
              <div class="media d-block media-custom text-center">
                <img style="height=30px; width=30px;" src="<?= base_url() ?>/uploads/<?= $value["about_content_imglists_filename"] ?>" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black"><?= $value['about_content_imglists_title'] ?></h3>
                  <!-- <p><?= $value['about_content_imglists_desc'] ?></p> -->
                  <p><?= substr($value['about_content_imglists_desc'],0,2) ?></p>
                  <input type="hidden" name="titlesixth" class="titlesixth<?= $i ?>" value="<?= $value['about_content_imglists_desc'] ?>">
                  <input type="hidden" name="descsixth" class="descsixth<?= $i ?>" value="<?= $value['about_content_imglists_desc'] ?>">
                  
                    <p class="clearfix">
                      <?php
                      if(!empty($value['about_content_imglists_readmore'])){ ?>
                        <a href="<?= $value['about_content_imglists_readmore'] ?>" class="float-left">Read more</a>
                      <?php }else{ ?>
                        <a class="readmoresixth" href="javascript:void(0)" onclick="readmore('readmoresixth','titlesixth<?= $i ?>','descsixth<?= $i ?>')"  data-toggle="modal" data-target="#myModal" class="float-left">Read more</a>
                      <?php } ?>

                    </p>

                  <p>
                    <a href="<?= $value['about_content_imglists_fblink'] ?>" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="<?= $value['about_content_imglists_twtlink'] ?>" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="<?= $value['about_content_imglists_lklink'] ?>" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>

          <?php $i++; } ?>
            






            <!-- <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Carl Smith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            

            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Janice Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jean Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jessica Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Carl Smith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Janice Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jean Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="img/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jessica Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div> -->

          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->

    <!-- <a href="#" class="cta-link element-animate" data-animate-effect="fadeIn" data-toggle="modal" data-target="#modalAppointment">
      <span class="sub-heading">Ready to Visit?</span>
      <span class="heading">Make an Appointment</span>
    </a> -->
    <!-- END cta-link -->