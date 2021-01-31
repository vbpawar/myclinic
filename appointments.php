<?php
session_start();
if (isset($_SESSION['userId'])) {
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Praxello solutions</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link href="dist/css/font.css" rel="stylesheet">
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
        <link rel="stylesheet" href="dist/css/jquery-ui.css">
        <link rel="stylesheet" href="plugins/bootstrap-tagsinput/dist/tagsinput.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" /> -->
        <link rel="stylesheet" href="dist/css/loader.css">
        <link rel="stylesheet" href="picker.css">
    </head>
    <style>
        .card .card-header .card-search .form-control {
            padding-right: 0px;
        }
        
        .datepicker.dropdown-menu {
            min-width: 200px;
        }
        
        #datepicker > span:hover {
            cursor: pointer;
        }
    </style>

    <body>
        <div class="wrapper">
            <div class="page-wrap">
                <?php include 'header.php'; ?>
                    <?php include 'sidebar.php'; ?>
                        <div id="editProfile"></div>
                        <div class="main-content" id="tData">
                            <div class="container-fluid">
                            <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-package" style="background-color: #333e52;"></i>
                                        <div class="d-inline">
                                            <h4>APPOINMENTS</h4>
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
                                                <a href="#">Appointments</a>
                                            </li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
        

                                <div class="card">
                                    <div class="card-header row">
                                        <div class="col col-sm-3">
                                            <label for="">Appointment Date</label>
                                            <div class="input-group input-group-primary">
                                            <input id="dropper-max-year" class="form-control" type="text" placeholder="select date" onchange="fetch(this.value);"  autocomplete="off"/>
                                                    <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                                </div>
                                           
                                        </div>
                                        <div class="col col-sm-4">

                                            <div class="template-demo" id="">
                                                <div class="btn-group" role="group" aria-label="Basic example" style="margin-left: 16px;">
                                                    <button type="button" class="btn btn-warning">Total Patients: &nbsp; &nbsp;&nbsp;&nbsp;<span id="totalPatient"></span></button>
                                                    <button type="button" class="btn btn-primary">New Patients: &nbsp; &nbsp;&nbsp;&nbsp;<span id="newPatients"></span></button>
                                                    <button type="button" class="btn btn-success">Consulted: &nbsp; &nbsp;&nbsp;<span id="consulted"></span></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col col-sm-3">
                                                                                                                                        
                                        </div>

                                        <div class="card-body table-responsive">
                                            <div class="dt-responsive">
                                                <table id="aTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="nosort">Profile</th>
                                                            <th>Patient Name</th>
                                                            <th>appointment time</th>
                                                            <th>Status</th>
                                                            <th>Reffered by</th>
                                                            <th>Fees status</th>
                                                            <th>Patient Type</th>
                                                            <th class="nosort">action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="aptData">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-sm-3">

                            </div>
                        </div>

            </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div id="loader"></div>
        <footer class="footer">
            <div class="w-100 clearfix">
                <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 Praxello Solutions All Rights Reserved.</span>
                <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="https://praxello.com/" class="text-dark" target="_blank">Praxello</a></span>
            </div>
        </footer>

        </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        
        <script src="js/jquery.mask.min.js"></script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/additional-methods.js"></script>
        <!-- <script src="plugins/datedropper/datedropper.min.js"></script> -->
        <!-- <script src="js/form-picker.js"></script> -->
        <script src="plugins/moment/moment.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/d3/dist/d3.min.js"></script>
        <script src="plugins/c3/c3.min.js"></script>
        <script src="js/tables.js"></script>
        <script src="js/charts.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="picker.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>
        <script src="plugins/bootstrap-tagsinput/dist/tagsinput.js"></script>
        <script>
             var data = {
userId:<?php echo $_SESSION['userId'];?>,
branchId:<?php echo $_SESSION['branchId'];?>,
username:'<?php echo $_SESSION['username'];?>',
franchiseid:'<?php echo $_SESSION['franchiseid']; ?>',
role:'<?php echo $_SESSION['role'];?>'
};
        </script>
        <script src="jscode/loader.js"></script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/getDateFormat.js"></script>
        <script src="jscode/appointments.js"></script>
        <script src="jscode/getMedicines.js"></script>
        <script src="jscode/getInstructions.js"></script>
        <script src="jscode/getMedicineTypes.js"></script>
        <script src="jscode/getMedicineDosage.js"></script>
        <script src="jscode/getComplaints.js"></script>
        <script src="jscode/getAdvice.js"></script>
        <script src="jscode/getAllDiagnosis.js"></script>
        <script src="jscode/getBranches.js"></script>
        <script src="jscode/getExercise.js"></script>
        <script>
            $.datetimepicker.setLocale('en');
            jQuery('#dropper-max-year').datetimepicker({
                timepicker:false,
                format:'Y-m-d'
            })
        </script>
    </body>

    </html>
    <?php
} else {
    header('Location:index.php');
}
?>