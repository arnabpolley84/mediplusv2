<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    //header("location: http://localhost/login/index.php/user_authentication/user_login_process");

    redirect('/admin/');
}
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

    <!-- Custom Css -->
    <link href="<?php echo ASSET_URL; ?>css/style.css" rel="stylesheet">
    <style type="text/css">
        .message{    
            background-color: greenyellow;
            margin: 0 auto;
            text-align: center;
            padding: 5px 0px 5px 0px;
            border-radius: 5px 5px 5px 5px;
            box-shadow: 2px 2px 2px 2px grey;
        }
    </style>
</head>

<body class="login-page">
    <?php
    if (isset($logout_message)) {
        echo "<div class='message'>";
        echo $logout_message;
        echo "</div>";
    }
    ?>
    <?php
    if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
    }
    ?>
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin RK<b>Urology</b></a>
            <small>Manage your site here</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open('admin/loginprocess'); ?>
                <!-- <form id="sign_in" method="POST"> -->
                    <div class="msg">Sign in to start your session</div>
                    <?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                    echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-4">
                            <button name="submit" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <!-- <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                    </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo ASSET_URL; ?>js/admin.js"></script>
    <script src="<?php echo ASSET_URL; ?>js/pages/examples/sign-in.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".message").delay(5000).fadeOut(800);
        });
    </script>
</body>

</html>