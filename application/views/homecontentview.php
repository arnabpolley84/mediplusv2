


<style>
    .owl-carousel .owl-stage, .owl-carousel.owl-drag .owl-item{
    -ms-touch-action: auto;
        touch-action: auto;
}
/*.owl-item{ height:377px !important; }*/
/*.slider-item{
  background-repeat: no-repeat !important;
  background-size: 100% 100% !important;
  
}*/
/*.owl-stage-outer { height:299px !important; }*/
.home-slider,.slider-text,.slider-item,.owl-item,.owl-stage,.owl-stage-outer {height: 499px !important; }
.slider-text{ margin-top:-412px; margin-left:1px;background-color:#5AC8D8;}
.slider-text p{ font-size:15px !important; font-weight:900 !important;}
/*@media only screen and (max-width: 600px) {
  .slider-item{
    height: no-repeat !important;
    background-size: 100% 100% !important;
    }
}*/
</style>

<section class="home-slider owl-carousel" style="background-color:#5AC8D8;">
      <?php
      foreach ($slider_data as $key => $value) { ?>
        
      <div class="slider-item">
        <div class="container">
            <img src='<?= base_url() ?>/uploads/<?= $value["slider_file"] ?>' style="height:299px;margin-top:9px;"/>
           
            <?php if(isset($value['slider_text1']) || isset($value['slider_text2'])){ ?>
          <div class="row slider-text align-items-center">
            <?php if(isset($value['slider_text1']) || isset($value['slider_text2'])){ ?>
            <div class="col-md-7 col-sm-12 element-animate" style="background-color:black;opacity:0.5 !important;box-shadow:0px 0px 26px 20px blanchedalmond !important;">
              <?php if(isset($value['slider_title']) && !empty($value['slider_title'])){ ?>
              <h1 style="color: white;"><?= $value['slider_title'] ?></h1>
              <?php } ?>
              <?php if(isset($value['slider_text1'])){ ?>
              <p style="color: white;"><?= $value['slider_text1'] ?></p>
              <?php } ?>
              
              <?php if($value['slider_text2'] != ""){ ?>
              <p style="color: white;"><?= $value['slider_text2'] ?></p>
              <?php } ?>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>

    <?php } ?>

      

    </section>
    <!-- END slider -->

   <style>
   .rowsub{padding: 10px 30px 10px 30px;}
   .elm{background-color:#fff !important;height:300px; width:20%;border-bottom:0px !important;}
   .elm a{margin:0px 32px 14px 35px;}
   .elminner{background-color:#007bff !important; height: 90%;width: 85%;margin: 0px 15px 0px 35px;border-bottom:10px solid #5AC8D8;}
   </style>
    
    <section class="container home-feature mb-5">
      <!-- <?php
         //print '<pre>';
         //print_r($home_frst_section_data);
         //print '</pre>';
      ?> -->
      <div class="row">
          <div class="col-md-12 p-0 one-col element-animate">
            <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
              <span class=""></span>
              <h2><?= $home_frst_section_data[0]['home_content_details_title'] ?></h2>
              <p><?= $home_frst_section_data[0]['home_content_details_desc'] ?></p>
            </div>
            <a href="<?= $home_frst_section_data[0]['home_content_details_readmore'] ?>" class="btn-more">Read More</a>
          </div>
          <div class="row align-items-center">
            <div class="col-md-6 stretch-left-1 element-animate" data-animate-effect="fadeInLeft">
              <a href="#" class="video"><img src="img/Uro.jpg" alt="" class="img-fluid"></a>
            </div>
          </div>
      </div>
        
      
    </section>
    <!-- END section -->

    <section style="padding: 0em 0;" class="section stretch-section">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4"><?= $home_second_section_data[0]['home_content_details_title'] ?></h2>
            <p class="mb-0 lead"><?= $home_second_section_data[0]['home_content_details_desc'] ?></p>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-6 stretch-left-1 element-animate" data-animate-effect="fadeInLeft">
            <a href="#" class="video"><img src="<?= base_url() ?>/uploads/<?= $home_third_section_data[0]['home_content_images_filename'] ?>" alt="" class="img-fluid"></a>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php
              $j=0;
              foreach ($home_fourth_section_data as $key => $value) { 
                $j++ ;
                if($j==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                } ?>
                <a style="font-size:20px;" class="nav-link<?= $clsadd ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-<?= $value['home_content_lists_id'] ?>" role="tab" aria-controls="v-pills-<?= $value['home_content_lists_id'] ?>" aria-selected="true"><span>01</span><?= $value['home_content_lists_title'] ?></a>
                

            <?php } ?>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate">
            
            <div class="tab-content" id="v-pills-tabContent">
              <?php
              $i=0;
              foreach ($home_fourth_section_data as $key => $value) { $i++ ;
                if($i==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                }
                ?>

              <div class="tab-pane fade<?= $clsadd ?>" id="v-pills-<?= $value['home_content_lists_id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $value['home_content_lists_id'] ?>-tab">
                <!-- <span class="icon flaticon-hospital"></span> -->
                <h3 class="text-primary"><?= $value['home_content_lists_desc'] ?></h3>
                <p style="font-size: 1.15rem;" class="lead"></p>
                <p><a href="<?= $value['home_content_lists_readmore'] ?>" class="btn btn-primary">Learn More</a></p>
              </div>

            <?php } ?>

              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4"><?= $home_fifth_section_data[0]['home_content_details_title'] ?></h2>
            <p class="mb-0 lead">
              
              <?= $home_fifth_section_data[0]['home_content_details_desc'] ?>
            </p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
            <?php $i=1;
            foreach ($home_sixth_section_data as $key => $value) { ?>
            <div>
              <div class="media d-block media-custom text-center">
                <img style="height=30px; width=30px;" src="<?= base_url() ?>/uploads/<?= $value["home_content_imglists_filename"] ?>" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black"><?= $value['home_content_imglists_title'] ?></h3>
                  <!-- <p><?= $value['home_content_imglists_desc'] ?></p> -->
                  <p><?= substr($value['home_content_imglists_desc'],0,2) ?></p>
                  <input type="hidden" name="titlesixth" class="titlesixth<?= $i ?>" value="<?= $value['home_content_imglists_desc'] ?>">
                  <input type="hidden" name="descsixth" class="descsixth<?= $i ?>" value="<?= $value['home_content_imglists_desc'] ?>">
                  
                    <p class="clearfix">
                      <?php
                      if(!empty($value['home_content_imglists_readmore'])){ ?>
                        <a href="<?= $value['home_content_imglists_readmore'] ?>" class="float-left">Read more</a>
                      <?php }else{ ?>
                        <a class="readmoresixth" href="javascript:void(0)" onclick="readmore('readmoresixth','titlesixth<?= $i ?>','descsixth<?= $i ?>')"  data-toggle="modal" data-target="#myModal" class="float-left">Read more</a>
                      <?php } ?>

                    </p>

                  <p>
                    <a href="<?= $value['home_content_imglists_fblink'] ?>" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="<?= $value['home_content_imglists_twtlink'] ?>" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="<?= $value['home_content_imglists_lklink'] ?>" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>

          <?php $i++; } ?>
            

          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="cover_1" style="background-image: url('<?php echo ASSET_MAIN_URL; ?>/img/bg_1.jpg');">
      <div class="container">
        <div class="row text-center justify-content-center">
          <div class="col-md-10">
            <h2 class="heading element-animate"><?= $home_seventh_section_data[0]['home_content_details_title'] ?></h2>
            <p class="sub-heading element-animate mb-5"><?= $home_seventh_section_data[0]['home_content_details_desc'] ?></p>
            <p class="element-animate"><a href="<?= $home_seventh_section_data[0]['home_content_details_readmore'] ?>" class="btn btn-primary btn-lg">Get In Touch</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4"><?= $home_eighth_section_data[0]['home_content_details_desc'] ?></h2>
            <p class="mb-0 lead"><?= $home_eighth_section_data[0]['home_content_details_desc'] ?></p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-2 owl-carousel">
            <?php
            $i=1;
            /*echo $i;*/
            foreach ($home_ninth_section_data as $key => $value) { ?>
            <?php 
            ?>
              <div>
                <div class="media d-block media-custom text-left">
                  <img src="<?= base_url() ?>/uploads/<?= $value["home_content_imglists_second_filename"] ?>" alt="Image Placeholder" class="img-fluid">
                  <div class="media-body">
                    <?php
                      $phpdate = strtotime( $value['home_content_imglists_second_createdon'] );

                    ?>
                    <span class="meta-post"><?= date( 'M d, Y', $phpdate );  ?></span>
                    <h3 class="mt-0 text-black"><?= $value['home_content_imglists_second_title'] ?></h3>
                    <input type="hidden" name="titleninth" class="titleninth<?= $i ?>" 
                    value="<?= $value['home_content_imglists_second_title'] ?>">
                    <input type="hidden" name="descninth" class="descninth<?= $i ?>" 
                    value="<?= $value['home_content_imglists_second_desc'] ?>">
                    <?php
                    $valdescninth=substr($value['home_content_imglists_second_desc'],0,10);
                    ?>
                    <p><?= $value['home_content_imglists_second_desc']; ?></p>
                    <p class="clearfix">
                      <?php
                      if(!empty($value['home_content_imglists_second_readmore'])){ ?>
                        <a href="<?= $value['home_content_imglists_second_readmore'] ?>" class="float-left">Read more</a>

                        <!-- <a class="readmoreninth" href="javascript:void(0)" onclick="readmore('readmoreninth','titleninth<?= $i ?>','descninth<?= $i ?>')"  data-toggle="modal" data-target="#myModal" class="float-left">Read more</a> -->
                      <?php }else{ ?>
                        <a class="readmoreninth" href="javascript:void(0)" onclick="readmore('readmoreninth','titleninth<?= $i ?>','descninth<?= $i ?>')"  data-toggle="modal" data-target="#myModal" class="float-left">Read more</a>
                      <?php } ?>
                      
                      <!-- <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 8</a> -->

                    </p>
                  </div>
                </div>
              </div>

            <?php  $i=$i+1; } ?>

            

          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->

    <!-- <a href="<?= $home_tenth_section_data[0]['home_content_details_readmore'] ?>" class="cta-link element-animate" data-animate-effect="fadeIn" data-toggle="modal" data-target="#modalAppointment">
      <span class="sub-heading"><?= $home_tenth_section_data[0]['home_content_details_title'] ?></span>
      <span class="heading"><?= $home_tenth_section_data[0]['home_content_details_desc'] ?></span>
    </a> -->
    <!-- END cta-link -->
    <script>
        
        
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 15,
            nav: true,
            mouseDrag: true,
            touchDrag: false,
            navContainer: 'controls-class',
            dots: false,
            navText: ['', ''],
            autoplay: true,
              items: 1,
              loop: true,
              navigation : true, 
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem:true
              autoHeight:true,
            responsive: {
              0: {
                items: 1,
                autoHeight: true,
                mouseDrag: false,
                touchDrag: true
              },
              600: {
                items: 1,
                autoHeight: true,
                mouseDrag: false,
                touchDrag: true
              },
              1050: {
                items: 3,
                autoWidth: true
              }
            }
        });
    </script>
