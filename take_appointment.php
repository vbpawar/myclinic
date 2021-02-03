<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Level One Modal |Radiology Web</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../../dist/css/theme.min.css">
        <script src="../../src/js/vendor/modernizr-2.8.3.min.js"></script>

        <link rel="stylesheet" href=" ../../plugins/datedropper/datedropper.min.css">

    </head>

    <body>      
        <div class="wrapper">         
            <div class="page-wrap">       
                <div class="main-content">
                    <div class="container">                   
                       <div class="row">
                            <div class="col-md-12">
                                <div class="card">                                   
                                    <div class="card-body template-demo">                                    
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#demoModal">Take Appointment</button>                                      
                                    </div>
                                </div>                               
                          </div>
                        </div>
                        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Take Appointment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">                                       
                                                    <form class="forms-sample" id="productform" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="productTitle">Patient Name</label>
                                                                    <select  class="form-control select2" id="productCategory" name="category" placeholder="Category">
                                                                        <option value="0">Name 1</option>
                                                                        <option value="1">Name 2</option>
                                                                        <option value="1">Name 3</option>
                                                                    </select>                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="productCategory">Appointment For</label>
                                                                    <select  class="form-control select2" id="productCategory" name="category" placeholder="Category">
                                                                        <option value="0">Fever</option>
                                                                        <option value="1">Cold</option>
                                                                        <option value="2">Cough</option>
                                                                    </select>
                                                                </div>
                                                            </div>                                                                                                        
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="date">Consulting Date</label>
                                                                    
                                                                        <input type="text" placeholder=""
                                                                            class="form-control" name="date"
                                                                            id="dropper-min-year">                                                                                                                                 
                                                                </div>
                                                            </div>                                                                             
                                                        </div>                                                                                                  
   
                                        <div class="modal-footer">                                            
                                            <input type="submit" class="btn btn-primary mr-2" value="Submit">
                                            <button class="btn btn-light" onclick="goback()">Cancel</button>                                                                                             
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        
        
        <script>window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        
        <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="../../dist/js/theme.min.js"></script>
        <script src="../../plugins/datedropper/datedropper.min.js"></script>
        <script src="../../js/form-picker.js"></script>
        
            <script src="js/jquery.validate.js"></script>
            <script src="jscode/loadFile.js"></script>
            <script src="jscode/vendorList.js"></script>
            <script src="jscode/product_validation.js"></script>
            <script src="jscode/addproduct.js"> </script>
            <script src="jscode/dropzoneProduct.js"></script>
    </body>
</html>
