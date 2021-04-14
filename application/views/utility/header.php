<!doctype html>
<html lang="en">
  <head>
    <title>Clinic for Urological Reconstruction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link href="<?php echo ASSET_MAIN_URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>css/jquery.timepicker.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>fonts/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_MAIN_URL; ?>fonts/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?php echo ASSET_MAIN_URL; ?>css/style.css">

    <style type="text/css">
        .dropdown-menu{ width:200px !important;top:65%; }

        .learnmore{display:none;margin-left: 5%;margin-bottom: 5%;}
        .major-caousel img{ height: 300px !important; width: 100%; }
        .message{    
        background-color: greenyellow;
        text-align: center;
        padding: 8px 0px 8px 0px;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 2px 2px 2px 2px grey;
        }
        .owl-carousel .owl-stage, .owl-carousel.owl-drag .owl-item{
            -ms-touch-action: auto;
            touch-action: auto;
        }
        html, body {
           overflow-x: hidden !important;
        }
        body {
           width:100% !important;
        }
    </style>
  </head>
  <body>
    
    <header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-5">
              <ul class="social list-unstyled">
                <li title="facebook"><a href="http://<?= $contact_data[0]['contact_fb'] ?>"><span class="fa fa-facebook"></span></a></li>
                <li title="linkedin"><a href="http://<?= $contact_data[0]['contact_lnk'] ?>"><span class="fa fa-linkedin"></span></a></li>
                <li title="youtube"><a href="http://<?= $contact_data[0]['contact_youtb'] ?>"><span class="fa fa-youtube-play"></span></a></li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-7 text-right">
              <p class="mb-0">
                <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalAppointment">Make an Appointment</a></p>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <div>

<!-- <?php
print '<pre>';
  print_r($contact_data);
print '</pre>';
?> -->


          <a style="display:block;line-height:10px;" class="navbar-brand" href="<?= base_url(); ?>"><?= $contact_data[0]['contact_sitelogo'] ?></a>
          <!-- <span>+</span> -->
          <?= $contact_data[0]['contact_sitelogo'] ?>
            <!-- Clinic for Urological Reconstruction -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <?php echo html_entity_decode($menu);
            ?>
            <!-- <?php //include('sidebar.php'); ?> -->

        </div>
      </nav>
    </header>
    <!-- END header -->