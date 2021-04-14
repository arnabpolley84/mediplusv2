<style type="text/css">
    .preview{word-wrap: break-word;}
    /*p{word-wrap: break-word;}*/

    .lists{
        box-shadow: 0px 0px 5px 0px;
        margin-bottom: 5%;
        padding: 2%;
        text-align: left;
        padding-left: 40px;
    }
</style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home Content</h2>
            </div>

            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Preview
                                <!-- <small>Preview home content</small> -->
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
                            
                              <div class="container section stretch-section">
                                
                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_frst_section_data[0]['home_content_details_title'])){
                                            $titlefirst= html_entity_decode($home_frst_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titlefirst= '';
                                         }
                                         if(!empty( $home_frst_section_data[0]['home_content_details_desc'])){
                                            $descfirst= html_entity_decode($home_frst_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $descfirst= '';
                                         }
                                         if(!empty( $home_frst_section_data[0]['home_content_details_readmore'])){
                                            $readmorefirst= $home_frst_section_data[0]['home_content_details_readmore'];
                                         }else{
                                            $readmorefirst= '';
                                         }
                                    ?>


                                    <p><?= $titlefirst ?></p>
                                    <p> <?= $descfirst ?></p>
                                    <p> Read More Link: <?= $readmorefirst ?></p>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_second_section_data[0]['home_content_details_title'])){
                                            $titlesecond= html_entity_decode($home_second_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titlesecond= '';
                                         }
                                         if(!empty( $home_second_section_data[0]['home_content_details_desc'])){
                                            $descsecond= html_entity_decode($home_second_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $descsecond= '';
                                         }
                                    ?>


                                    <p><?= $titlesecond ?></p>
                                    <p> <?= $descsecond ?></p>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">
                                    <?php
                                         if(!empty($home_third_section_data[0]['home_content_images_filename'])){
                                            $imgname=$home_third_section_data[0]['home_content_images_filename'];
                                         }else{
                                            $imgname='noimg.png';
                                         }
                                    ?>
                                    <div class="image">
                                        <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="300" height="300" alt="User" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                
                                    $cnt=count($home_fourth_section_data);
                                    if (!empty($home_fourth_section_data) && $cnt > 0) {
                                        foreach ($home_fourth_section_data as $key => $value) {
                                            ?>
                                                <div class="lists">
                                                    <br>
                                                    <p><h3><?= $value['home_content_lists_title'] ?></h3></p>
                                                    <p><?= $value['home_content_lists_desc'] ?></p>
                                                    <p> Learn More Link: <?= $value['home_content_lists_readmore'] ?></p>
                                                </div>
                                            
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <?php } ?>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_fifth_section_data[0]['home_content_details_title'])){
                                            $titlefifth= html_entity_decode($home_fifth_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titlefifth= '';
                                         }
                                         if(!empty( $home_fifth_section_data[0]['home_content_details_desc'])){
                                            $descfifth= html_entity_decode($home_fifth_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $descfifth= '';
                                         }
                                    ?>


                                    <p><?= $titlefifth ?></p>
                                    <p> <?= $descfifth ?></p>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                
                                    $cnt=count($home_sixth_section_data);
                                    if (!empty($home_sixth_section_data) && $cnt > 0) {
                                        foreach ($home_sixth_section_data as $key => $value) {
                                            ?>
                                                <div class="lists">
                                                    <br>
                                                    <?php
                                                     if(!empty($value['home_content_imglists_filename'])){
                                                        $imgname=$value['home_content_imglists_filename'];
                                                     }else{
                                                        $imgname='noimg.png';
                                                     }
                                                    ?>
                                                    <p>
                                                        <div class="image">
                                                            <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                        </div>
                                                    </p>
                                                    <p><h3><?= $value['home_content_imglists_title'] ?></h3></p>
                                                    <p><?= $value['home_content_imglists_desc'] ?></p>
                                                    <p> Fblink Link: <?= $value['home_content_imglists_fblink'] ?></p>
                                                    <p> Tweeter Link: <?= $value['home_content_imglists_twtlink'] ?></p>
                                                    <p> Linkedin Link: <?= $value['home_content_imglists_lklink'] ?></p>
                                                </div>
                                            
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <?php } ?>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_seventh_section_data[0]['home_content_details_title'])){
                                            $titleseventh= html_entity_decode($home_seventh_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titleseventh= '';
                                         }
                                         if(!empty( $home_seventh_section_data[0]['home_content_details_desc'])){
                                            $descseventh= html_entity_decode($home_seventh_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $descseventh= '';
                                         }
                                         if(!empty( $home_seventh_section_data[0]['home_content_details_readmore'])){
                                            $readmoreseventh= $home_seventh_section_data[0]['home_content_details_readmore'];
                                         }else{
                                            $readmoreseventh= '';
                                         }
                                    ?>


                                    <p><?= $titleseventh ?></p>
                                    <p> <?= $descseventh ?></p>
                                    <p> Read More Link: <?= $readmoreseventh ?></p>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_eighth_section_data[0]['home_content_details_title'])){
                                            $titleeighth= html_entity_decode($home_eighth_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titleeighth= '';
                                         }
                                         if(!empty( $home_eighth_section_data[0]['home_content_details_desc'])){
                                            $desceighth= html_entity_decode($home_eighth_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $desceighth= '';
                                         }
                                    ?>


                                    <p><?= $titleeighth ?></p>
                                    <p> <?= $desceighth ?></p>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                
                                    $cnt=count($home_ninth_section_data);
                                    if (!empty($home_ninth_section_data) && $cnt > 0) {
                                        foreach ($home_ninth_section_data as $key => $value) {
                                            ?>
                                                <div class="lists">
                                                    <br>
                                                    <?php
                                                     if(!empty($value['home_content_imglists_second_filename'])){
                                                        $imgname=$value['home_content_imglists_second_filename'];
                                                     }else{
                                                        $imgname='noimg.png';
                                                     }
                                                    ?>
                                                    <p>
                                                        <div class="image">
                                                            <img src="<?php echo base_url(); ?>uploads/<?= $imgname ?>" width="100" height="100" alt="User" />
                                                        </div>
                                                    </p>
                                                    <p><h3><?= $value['home_content_imglists_second_title'] ?></h3></p>
                                                    <p><?= $value['home_content_imglists_second_desc'] ?></p>
                                                    <p> Read more link: <?= $value['home_content_imglists_second_readmore'] ?></p>
                                                </div>
                                            
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <?php } ?>
                                  </div>
                                </div>

                                <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
                                  <div class="col-md-8 text-center mb-5 preview">

                                    <?php
                                        if(!empty( $home_tenth_section_data[0]['home_content_details_title'])){
                                            $titletenth= html_entity_decode($home_tenth_section_data[0]['home_content_details_title']);
                                         }else{
                                            $titletenth= '';
                                         }
                                         if(!empty( $home_tenth_section_data[0]['home_content_details_desc'])){
                                            $desctenth= html_entity_decode($home_tenth_section_data[0]['home_content_details_desc']);
                                         }else{
                                            $desctenth= '';
                                         }
                                    ?>


                                    <p><?= $titletenth ?></p>
                                    <p> <?= $desctenth ?></p>
                                  </div>
                                </div>


                                <div class="row align-items-center">
                                  <div class="col-md-6 stretch-left-1 element-animate fadeInLeft element-animated" data-animate-effect="fadeInLeft">
                                    <a href="#" class="video"><img src="img/Uro.jpg" alt="" class="img-fluid"></a>
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