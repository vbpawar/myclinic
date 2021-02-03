<?php
session_start();
if(isset($_SESSION['branchId'])){
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
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="plugins/c3/c3.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- <link rel="stylesheet" href="plugins/datedropper/datedropper.min.css"> -->
        <link rel="stylesheet" href="dist/css/loader.css">
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-darkness/jquery-ui.css' rel='stylesheet'>
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="picker.css">
    </head>
    <style>
        .error {
            color: red;
        }
        
        @media only screen and (max-width: 600px) {
            .tbl {
                overflow-x: auto;
            }
        }
        
        .ui-datepicker-trigger {
            position: relative;
            width: 33px
        }
        /* {} is the value according to your need */
    </style>

    <body>
        <div class="wrapper">
            <div class="page-wrap">
                <?php include 'header.php';?>
                    <?php include 'sidebar.php';?>
                        <div id="editProfile"></div>
                        <div class="main-content template-demo" id="tData">
                            <button type="button" class="btn btn-primary float-right" onclick="newCall()">New Call</button>
                            <div class="container-fluid" style="margin-top: 10px;">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Appointment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">My work</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Folllow up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-absent" role="tab" aria-controls="pills-setting" aria-selected="false">Absent Patients</a>
                                    </li>
                                </ul>
                                <div class="card">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                            <form id="callRegister">
                                                <div class="card-header row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">From</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="fromDate" id="fromDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Upto</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="uptoDate" id="uptoDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Branch</label>
                                                            <select name="branch" id="branch" style="width: 100%;" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2" style="margin-top: 16px;">
                                                        <div class="form-group" style="margin-top: 20px;">
                                                            <button class="btn  btn-primary" type="button" onclick="callRegister()">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                    </div>

                                                </div>
                                            </form>
                                            <div class="card-body" id="appT">
                                                <div class="dt-responsive tbl">
                                                    <table id="appointmentT" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 15%;">Name</th>
                                                                <th style="width: 15%;">Doctor</th>
                                                                <th>Branch</th>
                                                                <th>Age</th>
                                                                <th>Contact Number</th>
                                                                <th>Appointment Date</th>
                                                                <th>Follow up Need</th>
                                                                <th>Status</th>
                                                                <th>Follow up date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="appointmentD">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <form id="myWork">
                                                <div class="card-header row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">From</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mfoDate" id="mfoDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Upto</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mupDate" id="mupDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Branch</label>
                                                            <select name="mbranch" id="mbranch" style="width: 100%;" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2" style="margin-top: 16px;">
                                                        <div class="form-group" style="margin-top: 20px;">
                                                            <button class="btn  btn-warning" type="button" onclick="myWork()">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                    </div>

                                                </div>
                                            </form>
                                            <div class="card-body">
                                                <div class="dt-responsive tbl">
                                                    <table id="workT" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 15%;">Name</th>
                                                                <th style="width: 15%;">Doctor</th>
                                                                <th>Branch</th>
                                                                <th>Age</th>
                                                                <th>Contact Number</th>
                                                                <th>Appointment Date</th>
                                                                <th>Follow up Need</th>
                                                                <th>Status</th>
                                                                <th>Follow up date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="workD">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                            <form id="followuplist">
                                                <div class="card-header row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">

                                                            <label for="">From</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="folDate" id="folDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Upto</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="foluDate" id="foluDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Branch</label>
                                                            <select name="branchF" id="branchF" style="width: 100%;" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2" style="margin-top: 16px;">
                                                        <div class="form-group" style="margin-top: 20px;">

                                                            <button class="btn  btn-success" type="button" onclick="followupList()">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                    </div>

                                                </div>
                                            </form>
                                            <div class="card-body">
                                                <div class="dt-responsive tbl">
                                                    <table id="folloT" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 15%;">Name</th>
                                                                <th style="width: 15%;">Doctor</th>
                                                                <th>Branch</th>
                                                                <th>Age</th>
                                                                <th>Contact Number</th>
                                                                <th>Appointment Date</th>
                                                                <th>Follow up Need</th>
                                                                <th>Status</th>
                                                                <th>Follow up date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="folloD">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="previous-absent" role="tabpanel" aria-labelledby="pills-setting-tab">
                                            <form id="absentList">
                                                <div class="card-header row">

                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">From</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="foDate" id="foDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Upto</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="upDate" id="upDate" value="<?php echo date ('Y-m-d');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="">Branch</label>
                                                            <select name="branchA" id="branchA" style="width: 100%;" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2" style="margin-top: 16px;">
                                                        <div class="form-group" style="margin-top: 20px;">

                                                            <button class="btn  btn-default" type="button" onclick="absentList()">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                    </div>

                                                </div>
                                            </form>
                                            <div class="card-body">
                                                <div class="dt-responsive tbl">
                                                    <table id="absentT" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 15%;">Name</th>
                                                                <th style="width: 15%;">Doctor</th>
                                                                <th>Branch</th>
                                                                <th>Age</th>
                                                                <th>Contact Number</th>
                                                                <th>Appointment Date</th>
                                                                <th>Follow up Need</th>
                                                                <th>Status</th>
                                                                <th>Follow up date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="absentD">

                                                        </tbody>
                                                    </table>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
            var data = {
                userId: <?php echo $_SESSION['userId'];?>,
                branchId: <?php echo $_SESSION['branchId'];?>,
                username: '<?php echo $_SESSION['username'];?>',
                today: '<?php echo date('Y-m-d');?>'
            };
        </script>
        <script src="picker.js"></script>
        <script>
            $.datetimepicker.setLocale('en');
            jQuery('#fromDate').datetimepicker();
            jQuery('#uptoDate').datetimepicker();
            jQuery('#mfoDate').datetimepicker();
            jQuery('#mupDate').datetimepicker();
            jQuery('#folDate').datetimepicker();
            jQuery('#foluDate').datetimepicker();
            jQuery('#foDate').datetimepicker();
            jQuery('#upDate').datetimepicker();
        </script>
        <?php include 'add-call.php';?>
            <?php include 'search-modal.php'?>
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
                <script src="js/tables.js"></script>
                <script src="jscode/loader.js"></script>
                <script src="js/charts.js"></script>
                <script src="dist/js/theme.min.js"></script>
                <script src="js/jquery.validate.js"></script>
                <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
                <script src="jscode/apis.js"></script>
                <script src="jscode/getBranches.js"></script>
                <script src="jscode/getUsers.js"></script>
                <script src="jscode/login.js"></script>
                <script src="jscode/loadUsers.js"></script>
                <!-- <script src="jscode/getNewUser.js"></script> -->
                <script src="jscode/getDateFormat.js"></script>
                <script src="jscode/getAge.js"></script>
                <script src="jscode/cities.js"></script>
                <script src="jscode/getcallFollowup.js"></script>
                <script src="jscode/call-center.js"></script>
                <script>
                    $('.collapse').on('show.bs.collapse', function() {
                        $('.collapse.show').each(function() {
                            $(this).collapse('hide');
                        });
                    });
                </script>
                <?php include 'take-feedback.php';?>
    </body>
    </html>
    <?php
}else{
header('Location:index.php');
}
?>