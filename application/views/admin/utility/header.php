<!DOCTYPE html>
<html>
<?php
//session_destroy();

if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	//$email = ($this->session->userdata['logged_in']['email']);
} else {
	
	redirect('/admin/login', 'refresh');
}

/*print '<pre>';
print_r($_SESSION);
print '</pre>';*/

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | RKUro Admin </title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo ASSET_URL; ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo ASSET_URL; ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo ASSET_URL; ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo ASSET_URL; ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo ASSET_URL; ?>plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo ASSET_URL; ?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo ASSET_URL; ?>css/themes/all-themes.css" rel="stylesheet" />


    <style type="text/css">
    	.slimScrollBar{width:10px !important;}
    	.message{    
    		background-color: greenyellow;
		    text-align: center;
		    padding: 8px 0px 8px 0px;
		    border-radius: 5px 5px 5px 5px;
		    box-shadow: 2px 2px 2px 2px grey;
		}
		.divsec{margin-top: 5%;}
		.centr{text-align: center;width: 200px;}
    	::-webkit-scrollbar {
		    width: 0.6em;
		    height: 0.6em
		}
		::-webkit-scrollbar-button {
		    background: #ccc
		}
		::-webkit-scrollbar-track-piece {
		    background: #888
		}
		::-webkit-scrollbar-thumb {
		    background: orange
		}​

        
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <?php
    /*print '<pre>';
    
    print_r('http://'.$_SERVER['HTTP_HOST'].'/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/');
    print_r($_SERVER);
    print '</pre>';*/
    ?>
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin">Welcome To | RKUro Admin </a>
            </div>
            <?php 
            	if(!empty($this->session->userdata['logged_in']['message'])){
	            	?>
	            	<div style="top: 5%; position: fixed; right: 50%; padding: 5px;" class="navbar-header message"> 
	            		<?php echo $this->session->userdata['logged_in']['message']; ?>
	            	</div>
	            	<?php 
	            	$msg=$this->session->userdata['logged_in']['message'];
	            	$this->session->unset_userdata['logged_in']['message'];
	            	unset($msg);
	            	$this->session->userdata['logged_in']['message']='';
	            	$_SESSION['logged_in']['message']='';
	            	//echo "now". $_SESSION['logged_in']['message'];
            	}
            	if(!empty($this->session->userdata['slider']['message'])){
	            	?>
	            	<div style="top: 5%; position: fixed; right: 50%; padding: 5px;" class="navbar-header message"> 
	            		<?php echo $this->session->userdata['slider']['message']; ?>
	            	</div>
	            	<?php 
	            	$msg=$this->session->userdata['slider']['message'];
	            	$this->session->unset_userdata['slider']['message'];
	            	unset($msg);
	            	$this->session->userdata['slider']['message']='';
	            	$_SESSION['slider']['message']='';
	            	//echo "now". $_SESSION['logged_in']['message'];
            	}
            	if(!empty($this->session->userdata['content']['message'])){
	            	?>
	            	<div style="top: 5%; position: fixed; right: 50%; padding: 5px;" class="navbar-header message"> 
	            		<?php echo $this->session->userdata['content']['message']; ?>
	            	</div>
	            	<?php 
	            	$msg=$this->session->userdata['content']['message'];
	            	$this->session->unset_userdata['content']['message'];
	            	unset($msg);
	            	$this->session->userdata['content']['message']='';
	            	$_SESSION['content']['message']='';
	            	//echo "now". $_SESSION['logged_in']['message'];
            	}
            ?>
            <?php
               /* print '---------<pre>';
                print_r($notify_data);
                print '</pre>';*/
            ?>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">
                             <?php if(empty($notify_data_appointment)){
                                    echo '0';
                                }else{
                                    echo sizeof($notify_data_appointment);
                                }
                            ?>        
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">APPOINTMENTS</li>
                            <li class="body">
                                <ul class="menu">
                                 <?php
                                 if(!empty($notify_data_appointment)){
                                 foreach ($notify_data_appointment as $key => $value) { ?>
                                     
                                    <li>
                                        <a href="<?php echo base_url(); ?>admin/content/notificationread/<?= $value['appointment_id'] ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?= $value['appointment_fname'] ?>&nbsp;<?= $value['appointment_lname'] ?>&nbsp;made appointment</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i><?= timeAgo($value['notification_createdon']) ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                 <?php } } ?>
                                   
                                </ul>
                            </li>
                            <!-- <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- #END# Notifications -->

                    <?php
                   /* print '-----<pre>';
                    print_r($notify_data_contact);*/
                    //exit();
                    ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            
                            <span class="label-count">
                                <?php if(empty($notify_data_contact)){
                                    echo '0';
                                }else{
                                    echo sizeof($notify_data_contact);
                                }
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">CONTACTED</li>
                            <li class="body">
                                <ul class="menu">
                                 <?php
                                 if(!empty($notify_data_contact)){
                                 foreach ($notify_data_contact as $key => $value) { ?>
                                     
                                    <li>
                                        <a href="<?php echo base_url(); ?>admin/content/notificationread/<?= $value['appointment_id'] ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?= $value['appointment_fname'] ?>&nbsp;<?= $value['appointment_lname'] ?>&nbsp;made contact</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i>
                                                    <?= timeAgo($value['notification_createdon']) ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                 <?php } } ?>
                                   
                                </ul>
                            </li>
                            <!-- <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li> -->
                        </ul>
                    </li>

                    

                    <!-- Tasks -->
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <?php
        function timeAgo($timestamp){
            //echo $timestamp; exit();
            $datetime1=new DateTime("now");
            $datetime2=date_create($timestamp);
            $diff=date_diff($datetime1, $datetime2);
            $timemsg='';
            if($diff->y > 0){
                $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');

            }
            else if($diff->m > 0){
             $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
            }
            else if($diff->d > 0){
             $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
            }
            else if($diff->h > 0){
             $timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
            }
            else if($diff->i > 0){
             $timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
            }
            else if($diff->s > 0){
             $timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
            }

            $timemsg = $timemsg.' ago';
            return $timemsg;
        }



    ?>