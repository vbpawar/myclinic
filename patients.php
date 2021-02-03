<?php
session_start();
if(isset($_SESSION['branchId'])){
    ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $_SESSION['company'];?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo $_SESSION['favicon'];?>" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="plugins/c3/c3.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- <link rel="stylesheet" href="plugins/datedropper/datedropper.min.css"> -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="dist/css/loader.css">
<link rel="stylesheet" href="picker.css">
    </head>
<Style>
   
@media only screen and (max-width: 600px) {
  .tbl {
    overflow-x:auto;
  }
}
</Style>
    <body>
        <div class="wrapper">
            <div class="page-wrap">
                <?php include 'header.php';?>
                <?php include 'sidebar.php';?>
                <div id="editProfile"></div>
                <div class="main-content template-demo " id="tData">
                
                <button class="btn btn-danger" type="button" style="float: right;margin-bottom: 10px;" data-toggle="modal" data-target="#demoModal">Add New Patient</button>
                    <div class="container-fluid">
                    <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-package" style="background-color: #333e52;"></i>
                                        <div class="d-inline">
                                            <h4>RECEPTION</h4>
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
                                                <a href="#">Reception</a>
                                            </li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
        

                    <form id="contactSearch">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobileNo" name="mobile1" placeholder="Contact No" ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button class="btn btn-dark" id="searchContact" name="search" >Search</button>
                            </div>
                        </div>
                        <div class="col-sm-3 bshow">
                                                <div class="form-group">
                                                    <select name="pbranch" id="pbranch" style="width: 100%;" class="form-control"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 bshow">
                                                <div class="form-group">
                                                    <button class="btn  btn-dark" type="button" id="searchCollection">Search</button>
                                                </div>
                                            </div>
                        </div>
                        </form>
                        <div class="card">
                        
                            <div class="card-body table-responsive">
                            <!-- <div style="overflow-x:auto;"> -->
                            <div class="dt-responsive tbl">
                                <table id="pTable" class="table">
                                    <thead class="thead-dark" >
                                        <tr>
                                            <th class="nosort">Profile</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Last Visit</th>
                                            <th>Next Visit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="patientData">
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <!-- <div> -->
                        </div>
                    </div>
                </div>
                <div id="loader"></div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2021 Soulsoft All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" class="text-dark" target="_blank"><?php echo $_SESSION['company'];?></a></span>
                    </div>
                </footer>

            </div>
        </div>
      
        <script src="js/jquery-3.3.1.min.js"></script>
         <script>
        var data = {
                userId: <?php echo $_SESSION['userId'];?>,
                branchId: <?php echo $_SESSION['branchId'];?>,
                username: '<?php echo $_SESSION['username'];?>',
                today: '<?php echo date('Y-m-d ');?>',
                role: '<?php echo $_SESSION['role'];?>',
                franchiseid:'<?php echo $_SESSION['franchiseid']; ?>'
            };
            if(data.role == 9 || data.role == 5 || data.role == 6 || data.role == 8){
                $('.bshow').show();
            }
       </script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- <script src="plugins/datedropper/datedropper.min.js"></script>
        <script src="js/form-picker.js"></script> -->
        <script src="plugins/moment/moment.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/d3/dist/d3.min.js"></script>
        <script src="plugins/c3/c3.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/tables.js"></script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/getBranches.js"></script>
        <script src="jscode/getReffName.js"></script>
        <script src="picker.js"></script>
       <?php include 'add_patient.php';?>
       <?php include 'take-appointment.php';?>
       <?php include 'opd-payments.php';?>
       <?php include 'opd-generatePayments.php';?>
        <script src="js/charts.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="jscode/loader.js"></script>
       <script src="jscode/getDateFormat.js"></script>
       <script src="jscode/getAge.js"></script>
       <script src="jscode/patients.js"></script>
       <script src="jscode/getUsers.js"></script>
       <script src="jscode/appointmentUsers.js"></script>
       <script src="jscode/branchUsers.js"></script>
       <script src="jscode/getPayments.js"></script>
       <script src="jscode/getAllTests.js"></script>
       <script src="jscode/loadFile.js"></script>
       <script src="jscode/loadTest.js"></script>
       <script src="jscode/getPackages.js"></script>
       <script src="jscode/getCountryStateCity.js"></script>
       <script src="jscode/getPreviousPayments.js"></script>
       <script src="jscode/getDiscount.js"></script>
       <script src="jscode/prescribeTestTable.js"></script>
       <script src="jscode/packagePayment.js"></script>
       <script src="jscode/getPatientContactFilter.js"></script>
      
       <script>
     
</script>
    </body>
</html>
<?php
}else{
header('Location:index.php');
}
?>
 