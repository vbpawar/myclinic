<?php
session_start();
if(!isset($_SESSION['userId'])){
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="medical.jpeg" type="image/x-icon" />
        <link href="dist/css/googlefont.css" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet"> -->

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
<style>
    .auth-wrapper .lavalite-bg {

height: 100vh;
position: relative;
width: 100%;
-webkit-background-size: cover;
background-size: contain;
background-repeat: no-repeat;
    }
    </style>
    <body>
       
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('img/auth/login-bg1.jpg');background-size:cover">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="alert bg-danger alert-danger text-white message" role="alert" style="display: none;">
                               Enter Correct contact number or password
                            </div>
                            <div class="alert bg-warning alert-warning text-white message1" role="alert" style="display: none;">
                              for this role no pages found.add it first
                            </div>
                            <h3>Sign in</h3>
                             <form id="signin">
                          
                            <div class="form-group">
                                    <input type="number" class="form-control" id="username" placeholder="contact number" required="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="passwrd" placeholder="Password" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <!-- <div class="col text-right">
                                    <a href="franchise/index.php" style="color:blue"><b><u>Franchise Owner<u></b></a>
                                    </div> -->
                                   
                                </div>
                                <!-- <div class="row">
                                <div class="col text-right">
                                    <a href="licensor/index.php" style="color:blue"><b><u>Licensor<u></b></a>
                                    </div>
                                </div> -->
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme">Sign In</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>
        <script src="dist/js/theme.js"></script>
        <script src="js/loginapis.js"></script>
        <script src="jscode/authentication.js"></script>
    </body>
</html>
<?php
}else{
    header('Location:appointments.php');
}
?>