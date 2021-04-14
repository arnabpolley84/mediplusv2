    <?php
    if($slider_data){
    foreach ($slider_data as $key => $value) { ?>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('<?= base_url() ?>/uploads/<?= $value["slider_file"] ?>');background-size: 1250px 600px;">
        
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1><?= $value['slider_title'] ?></h1>
              <p><?= $value['slider_text1'] ?>......</p>
            </div>
          </div>
        </div>

      </div>

    </section>
  <?php } } ?>
    <!-- END slider -->


    <section class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
        <?php
          foreach ($about_fourth_section_data as $key => $value) { ?>

                  <div class="col-md-4 element-animate" style="display: inline-block;">
                    <div class="media d-block media-custom text-left">
                      <img src="<?= base_url() ?>/uploads/<?= $value["news_content_imglists_filename"] ?>" alt="Image Placeholder" class="img-fluid">
                      <div class="media-body">
                        <?php
                              $phpdate = strtotime( $value['news_content_imglists_createdon'] );
                        ?>
                        <span class="meta-post"><?= date( 'M d, Y', $phpdate );  ?></span>

                        <!-- <span class="meta-post">December 2, 2009</span> -->

                        <h3 class="mt-0 text-black"><a href="#" class="text-black"><?= $value['news_content_imglists_title'] ?></a></h3>
                        <p><?= $value['news_content_imglists_desc'] ?></p>
                        <p class="clearfix">
                          <!-- <a href="<?= $value['news_content_imglists_readmore'] ?>" class="float-left">Read more</a> -->
                          <!-- <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 8</a> -->
                        </p>
                      </div>
                    </div>
                  </div>
          
        <?php } ?>
          </div>
        </div>
          
          <!-- <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="img/gkk.jpg" alt="Image Placeholder" class="img-fluid">
              <div class="media-body">
                <span class="meta-post">February 12, 2011</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">Fortis Hospitals launches a Guide to Cancers of Kidney</a></h3>
                <p>Presenting a talk on Kidney Cancers, Dr R K Gopalakrishna, Consultant Urologist, Fortis Hospitals Kolkata said, “It is a fact that awareness on cancer in the kidney in our country is extremely low. Our intention of launching this booklet is to increase this awareness and make people more conscious about better Kidney Care.”.</p>
                <p class="clearfix">
                  <a href="#" class="float-left">Read more</a>
                  <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 8</a>
                </p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="img/scann.jpg" alt="Image Placeholder" class="img-fluid">
              <div class="media-body">
                <span class="meta-post">August 26, 2016</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">Jansatta Publication:Neo Bladder giving new life to patients</a></h3>
                
                <p class="clearfix">
                  <a href="#" class="float-left">Read more</a>
                  <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 8</a>
                </p>
              </div>
            </div>
          </div> -->
        

        <div class="row element-animate">
          
          <div class="col-md-5">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>

        </div>


      </div>
    </section>

    <!-- <a href="#" class="cta-link element-animate" data-toggle="modal" data-target="#modalAppointment">
      <span class="sub-heading">Ready to Visit?</span>
      <span class="heading">Make an Appointment</span>
    </a> -->
    <!-- END cta-link -->

    