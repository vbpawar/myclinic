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
        <link rel="stylesheet" href="dist/css/loader.css">
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css"/>
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
    </style>

    <body>
        <div class="wrapper">
            <div class="page-wrap">
                <?php include 'header.php';?>
                    <?php include 'sidebar.php';?>
                        <div class="main-content template-demo">
                            <div class="container-fluid" style="margin-top: 10px;">
                                <div class="card">
                                    <form id="callRegister">
                                        <div class="card-header row">

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="">From</label>
                                                    <div class="input-group input-group-primary">
                                                        <input type="text" class="form-control" name="fromDate" id="fromDate" value="<?php echo date ('Y-m-d');?>">
                                                        <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="">Upto</label>
                                                    <div class="input-group input-group-primary">
                                                        <input type="text" class="form-control" name="uptoDate" id="uptoDate" value="<?php echo date ('Y-m-d');?>">
                                                        <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-4"  id="bshow">
                                                <div class="form-group">
                                                    <label for="">Branch</label>
                                                    <select name="branch" id="branch" style="width: 100%;" class="form-control"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2" style="margin-top: 16px;">
                                                <div class="form-group" style="margin-top: 20px;">
                                                    <button class="btn  btn-primary" type="button" id="searchCollection">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">

                                            </div>

                                        </div>
                                    </form>
                            <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card ticket-card">
                                    <div class="card-body">
                                        <p class="mb-30 bg-red lbl-card"><i class="fas fa-folder-open"></i> Total Amount</p>
                                        <div class="text-center">
                                            <h2 class="mb-0 d-inline-block text-red"><strong id="Famount">0.00</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card ticket-card">
                                    <div class="card-body">
                                        <p class="mb-30 bg-blue lbl-card"><i class="fas fa-file-archive"></i> Amount Recieved</p>
                                        <div class="text-center">
                                            <h2 class="mb-0 d-inline-block text-blue"><strong id="Ramount">0.00</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card ticket-card">
                                    <div class="card-body">
                                        <p class="mb-30 bg-green lbl-card"><i class="fas fa-users"></i>Package Amount</p>
                                        <div class="text-center">
                                            <h2 class="mb-0 d-inline-block text-green"><strong id="PAamt">0.00</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card ticket-card">
                                    <div class="card-body">
                                        <p class="mb-30 bg-warning lbl-card"><i class="fas fa-database"></i> Pending Amount</p>
                                        <div class="text-center">
                                            <h2 class="mb-0 d-inline-block text-warning"><strong id="Pamount">0.00</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                                    <div class="card-body table-responsive">
                                        <div class="dt-responsive">
                                            <table id="collectionT" class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Reciept Id</th>
                                                        <th>Bill date</th>
                                                        <th>Patient Name</th>
                                                        <th>Doctor Name</th>
                                                        <th>Discount Type</th>
                                                        <th>Payment Type</th>
                                                        <th>Total Bill Amount</th>
                                                        <th>Amount</th>
                                                        <th>Pending Amount</th>
                                                        <th>Payment Mode</th>
                                                        <th>Recieved by</th>
                                                        <th>Payment Date</th>
                                                        <th class="nosort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="collectionD">

                                                </tbody>
                                                <tfoot>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total</th>
                                                    <th id="amtO"></th>
                                                    <th id="pAmt"></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th class="nosort"></th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <figure class="highcharts-figure">
                                                    <div id="high"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <figure class="highcharts-figure">
                                                    <div id="package"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="card">
                                   <div class="card-body">
                                        <div class="dt-responsive tbl">
                                            <table id="allT" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Reciept Id</th>
                                                        <th>Payment Date</th>
                                                        <th>Patient Name</th>
                                                        <th>Doctor Name</th>
                                                        <th>Discount Type</th>
                                                        <th>Payment Type</th>
                                                        <th>Bill Details</th>
                                                        <th>Amount</th>
                                                        <th>Payment Mode</th>
                                                        <th>Recieved by</th>
                                                        <th>Created at</th>
                                                        <th class="nosort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="allD">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div id="loader"></div>
                        <footer class="footer">
                            <div class="w-100 clearfix">
                                <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 <?php echo $_SESSION['company'];?> All Rights Reserved.</span>
                                <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" class="text-dark" target="_blank"><?php echo $_SESSION['company'];?></a></span>
                            </div>
                        </footer>

            </div>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="picker.js"></script>
        <script>
            var data = {
                userId: <?php echo $_SESSION['userId'];?>,
                branchId: <?php echo $_SESSION['branchId'];?>,
                username: '<?php echo $_SESSION['username'];?>',
                today: '<?php echo date('Y-m-d ');?>',
                role: '<?php echo $_SESSION['role'];?>',
                franchiseid:'<?php echo $_SESSION['franchiseid']; ?>'
            };
            // if (data.role == 9) {
            //     $('#bshow').show();
            // }

            $.datetimepicker.setLocale('en');
            jQuery('#fromDate').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
            jQuery('#uptoDate').datetimepicker({
                timepicker: false,
                format: 'Y-m-d'
            });
        </script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
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
        <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
 
        <script src="jscode/apis.js"></script>
        <script src="jscode/getBranches.js"></script>
        <script src="jscode/collection.js"></script>
    </body>
    </html>
    <?php
}else{
header('Location:index.php');
}
?>