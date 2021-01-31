<?php
session_start();
if(isset($_SESSION['branchId'])){
    ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Package Master | <?php echo $_SESSION['company'];?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo $_SESSION['favicon'];?>" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="dist/css/loader.css">
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
          <?php include 'header.php';?>

            <div class="page-wrap">
               <?php include 'sidebar.php';?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-package" style="background-color: #333e52;"></i>
                                        <div class="d-inline">
                                            <h4>PACKAGE MASTER</h4>
                                            <span>create an package</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Package</a>
                                            </li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row" id="package">
                            <div class="col-md-12">
                            <button type="button" class="btn  btn-danger" style="float: right;" onclick="addPackage()">Add New</button>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Packages</h3>
                                    </div>
                                    <div class="card-block table-responsive">
                                    <div class="dt-responsive tbl" >
                                <table id="pTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package</th>
                                            <th>Cost</th>
                                            <th>Package Details</th>
                                            <th>Status</th>
                                            <th class="nosort"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="packageData">
                                       
                                    </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="loadPackage"></div>
                    </div>
                </div>
                <div id="loader"></div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2021 Soulsoft. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" class="text-dark" target="_blank"><?PHP echo $_SESSION['company'];?></a></span>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
         <script>
      var data = {
userId:<?php echo $_SESSION['userId'];?>,
branchId:<?php echo $_SESSION['branchId'];?>,
username:'<?php echo $_SESSION['username'];?>',
franchiseid:'<?php echo $_SESSION['franchiseid']; ?>',
role:'<?php echo $_SESSION['role'];?>'
};
      </script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/loader.js"></script>
        <script src="jscode/getBranches.js"></script>
        <script src="jscode/getAllTests.js"></script>
        <script src="jscode/package-master.js"></script>
        <?php include 'addPackage.php';?>
    </body>

</html>
<?php
}else{
header('Location:index.php');
}
?>