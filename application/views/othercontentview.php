    <style type="text/css">
      .section { padding: 0px; }
    </style>

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
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-9 element-animate">
            <div style="text-align:left !important;" class="media d-block media-feature text-center mb-5">
              <span class=></span>
              <div class="media-body">
                <!-- <h3 class="mt-0 text-black">What Is Paediatric Urology?</h3>
                </h3>Pediatric urology is a surgical subspecialty of medicine dealing with the disorders of children's genitourinary systems. Pediatric urologists provide care for both boys and girls ranging from birth to early adult age. The most common problems are those involving disorders of urination, reproductive organs and testes.</h3>
                <h3 class="mt-0 text-black">Conditions treated in Paedatric Urology</h3> -->
                <!-- </div> -->

                <?php
                if(!empty($other_section_data)){
                foreach ($other_section_data as $key => $value) { ?>

                <p><?= $value['content_details_desc'] ?></p>

                <p><a href="#" class="btn btn-secondary btn-sm learnmoreclick" id="learnmore<?= $key ?>">Learn More</a></p>
                  <div class="learnmore" id="learnmore<?= $key ?>contn"> 
                    <?= $value['content_details_more_desc'] ?>
                  </div>
                <?php } } ?>
                

              </div>
            </div>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-light custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php
              $j=0;
              /*print '<pre>';
              print_r($other_second_section_data);
              print '</pre>';*/
              if(!empty($other_second_section_data)){
              foreach ($other_second_section_data as $key => $value) { 
                $j++ ;
                if($j==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                } ?>
              <a style="font-size:20px;" class="nav-link<?= $clsadd ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-<?= $value['other_content_lists_id'] ?>" role="tab" aria-controls="v-pills-<?= $value['other_content_lists_id'] ?>" aria-selected="true"><span><?= $j ?></span><?= $value['other_content_lists_title'] ?></a>

              
              <?php } } ?>

            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate">
            
            <div class="tab-content" id="v-pills-tabContent">

              <?php
              $i=0;
              if(!empty($other_second_section_data)){
              foreach ($other_second_section_data as $key => $value) { $i++ ;
                if($i==1){
                  $clsadd=' show active';
                }else{
                  $clsadd='';
                }
                ?>

              <div class="tab-pane fade<?= $clsadd ?>" id="v-pills-<?= $value['other_content_lists_id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $value['other_content_lists_id'] ?>-tab">
                <img style="height=30px; width=30px;" src="<?= base_url() ?>/uploads/<?= $value["other_content_lists_filename"] ?>" alt="Image Placeholder" class="img-fluid">

                <!-- <span class="icon flaticon-hospital"></span> -->
                <h3 class="text-primary"><?= $value['other_content_lists_desc'] ?></h3>
                <p style="font-size: 1.15rem;" class="lead"></p>
                <p><a href="<?= $value['other_content_lists_readmore'] ?>" class="btn btn-primary">Learn More</a></p>
              </div>

              
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <!-- <a href="#" class="cta-link element-animate" data-toggle="modal" data-target="#modalAppointment">
      <span class="sub-heading">Ready to Visit?</span>
      <span class="heading">Make an Appointment</span>
    </a> -->
    <!-- END cta-link -->