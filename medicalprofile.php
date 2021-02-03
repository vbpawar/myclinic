<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href=" favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href=" plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href=" plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href=" plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href=" plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href=" dist/css/theme.min.css">
    <script src=" src/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href=" plugins/datedropper/datedropper.min.css">
    <style>
        .error{
            color: red;
        }
        </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        

        <div class="page-wrap">
            
            <div class="main-content">
                <div class="container-fluid">
                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Modals</h3>
                                </div>
                                <div class="card-body template-demo">
                                  
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#fullwindowModal">Add Medical Information</button>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                   
                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
                        aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>Medical Profile</strong>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                <form class="forms-sample" id="medicalprofile" method="POST">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-xl-3 mb-30">
                                                                <h5><strong>Diet Pattern</strong></h5>
                                                                <div class="checkbox-fade fade-in-success">
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Vegetarian</span>
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-fade fade-in-success">
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Non-vegetarian</span>
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-fade fade-in-success">
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Mixed</span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9 col-xl-9 mb-30">
                                                                <div class="row">
                                                                    <div class="col-sm-2 mb-10">

                                                                        <div class="checkbox-fade fade-in-success class"
                                                                            style="margin-right: -110px;">
                                                                            <h5><strong>Allergy To Any Drug</strong>
                                                                            </h5><br>
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Yes</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>No</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 mb-10">
                                                                        <label for="remark">Remarks</label>
                                                                        <textarea name="remark" id="remark" rows="3"
                                                                            class="form-control"></textarea>
                                                                    </div>

                                                                    <div class="col-sm-2 mb-10">

                                                                        <div class="checkbox-fade fade-in-success class"
                                                                            style="margin-right: -76px;">
                                                                            <h5><strong>Menstural History</strong></h5>
                                                                            <br>
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Regular</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Irregular</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 mb-10">
                                                                        <label for="remark">Remarks</label>
                                                                        <textarea name="remark" id="remark" rows="3"
                                                                            class="form-control"></textarea>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-12 col-xl-12">
                                                                <h4 class="sub-title"><strong>Addicted To</strong></h4>
                                                                <div class="form-group row">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-1 col-form-label">
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Smoke</span>
                                                                            </label>
                                                                        </div>
                                                                    </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="year1" id="year1"
                                                                            placeholder="1 year">
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="month1" id="month1"
                                                                            placeholder="5 month">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-12">
                                                                <div class="form-group row">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-1 col-form-label">
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Tobacco</span>
                                                                            </label>
                                                                        </div>
                                                                    </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="year2" id="year2"
                                                                            placeholder="1 year">
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="month2" id="month2"
                                                                            placeholder="5 month">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-12">
                                                                <div class="form-group row">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-1 col-form-label">
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Alcohol</span>
                                                                            </label>
                                                                        </div>
                                                                    </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="year3" id="year3"
                                                                            placeholder="1 year">
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" class="form-control"
                                                                            name="month3" id="month3"
                                                                            placeholder="5 month">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-12">

                                                                <div class="form-group row">
                                                                    <label for="exampleInputUsername2"
                                                                        class="col-sm-1 col-form-label">
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr">
                                                                                    <i
                                                                                        class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Others</span>
                                                                            </label>
                                                                        </div>
                                                                    </label>
                                                                    <div class="col-sm-2">
                                                                        <select class="form-control select2">
                                                                            <option value="cheese">Option 1</option>
                                                                            <option value="tomatoes">Option 2</option>
                                                                            <option value="mozarella">Option 3</option>
                                                                            <option value="mushrooms">Option 4</option>
                                                                            <option value="pepperoni">Option 5</option>
                                                                            <option value="onions">Option 6</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><strong>Obstetics History</strong></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-20" style="text-align: center;">
                                                            <div class="col-md-1">
                                                                <div class="form-group" style="text-align: center;">
                                                                    <label for="">(G)</label>
                                                                    <input type="text" placeholder=""
                                                                        class="form-control" name="g" id="g">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">(P)</label>
                                                                    <input type="text" placeholder=""
                                                                        class="form-control" name="p" id="p">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">(A)</label>
                                                                    <input type="text" placeholder=""
                                                                        class="form-control" name="a" id="a">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">(L)</label>
                                                                    <input type="text" placeholder=""
                                                                        class="form-control" name="l" id="l">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">No. Of Male</label>
                                                                    <select class="form-control select2">
                                                                        <option value="cheese"> 1</option>
                                                                        <option value="tomatoes"> 2</option>
                                                                        <option value="mozarella"> 3</option>
                                                                        <option value="mushrooms"> 4</option>
                                                                        <option value="pepperoni"> 5</option>
                                                                        <option value="onions"> 6</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">No. Of Female</label>
                                                                    <select class="form-control select2">
                                                                        <option value="cheese"> 1</option>
                                                                        <option value="tomatoes"> 2</option>
                                                                        <option value="mozarella"> 3</option>
                                                                        <option value="mushrooms"> 4</option>
                                                                        <option value="pepperoni"> 5</option>
                                                                        <option value="onions"> 6</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5"></div>
                                                        </div>
                                                        <div class="row mb-30">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">LMP Date</label>
                                                                    <input type="text" placeholder="min year 2020"
                                                                        class="form-control" name="p"
                                                                        id="dropper-min-year">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="remark">Menopause</label>
                                                                <textarea name="mark1" id="mark1" rows="3"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="remark">Details Of Previous
                                                                    Prescription</label>
                                                                <textarea name="mark2" id="mark2" rows="3"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-2 mb-10">

                                                                <div class="checkbox-fade fade-in-success class"
                                                                    style="margin-right: -89px;">
                                                                    <h5><strong>Any Infectious Disease</strong></h5><br>
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-fade fade-in-success">
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>No</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mb-10">
                                                                <label for="remark">Remarks</label>
                                                                <textarea name="imark" id="imark" rows="3"
                                                                    class="form-control"></textarea>
                                                            </div>

                                                            <div class="cal-sm-2" style="margin-left: 80px;"></div>

                                                            <div class="col-sm-2 mb-10">
                                                                <div class="checkbox-fade fade-in-success class"
                                                                    style="margin-right: -30px;">
                                                                    <h5><strong>Blood Transfusion</strong></h5><br>
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-fade fade-in-success">
                                                                    <label>
                                                                        <input type="checkbox" value="">
                                                                        <span class="cr">
                                                                            <i
                                                                                class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>No</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mb-10">
                                                                <label for="remark">Remarks</label>
                                                                <textarea name="bmark" id="bmark" rows="3"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container-fluid">
<<<<<<< HEAD
                                    <div class="row mt-20"> 
                                    <div class="col-md-12">
                                        <div class="card">                                         
                                            <div class="card-body">                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5><strong>Family History In Blood Relation</strong></h5>             
                                                        <form class="form-inline repeater">
                                                            <div data-repeater-list="group-a">
                                                                <div data-repeater-item class="d-flex mb-2">
                                                                    <label class="sr-only" for="inlineFormInputGroup1">Users</label>
                                                                    <div class="form-group mb-2 mr-sm-2 mb-sm-0">                                                            
                                                                        <input type="text" class="form-control" id="mdiseases" name="mdiseases" placeholder="Major Diseases">
                                                                    </div>
                                                                    <div class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <input type="email" class="form-control" id="wmater" name="wmater" placeholder="Whom Mater">
                                                                    </div>
                                                                    <div class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <input type="tel" class="form-control" id="odiseases" name="odiseases" placeholder="Other Diseases">
                                                                    </div>
                                                                     <div class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                        <input type="tel" class="form-control" id="whommater" name="whommater" placeholder="Whom Mater">
=======
                                        <div class="row mt-20">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5><strong>Family History In Blood Relation</strong>
                                                                </h5>
                                                                <form class="form-inline repeater">
                                                                    <div data-repeater-list="group-a">
                                                                        <div data-repeater-item class="d-flex mb-2">
                                                                            <label class="sr-only"
                                                                                for="inlineFormInputGroup1">Users</label>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="text" class="form-control"
                                                                                    id="mdiseases" name="mdiseases"
                                                                                    placeholder="Major Diseases">
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="email" class="form-control"
                                                                                    id="wmater" name="wmater"
                                                                                    placeholder="Whom Mater">
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="tel" class="form-control"
                                                                                    id="odiseases" name="odiseases"
                                                                                    placeholder="Other Diseases">
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="tel" class="form-control"
                                                                                    id="whommater" name="whommater"
                                                                                    placeholder="Whom Mater">
                                                                            </div>
                                                                            <button data-repeater-delete type="button"
                                                                                class="btn btn-danger btn-icon ml-2"><i
                                                                                    class="ik ik-trash-2"></i></button>
                                                                        </div>
>>>>>>> 906c5400113bca08e9ab6ab0cb5a4aaa6de6d8c3
                                                                    </div>
                                                                    <button data-repeater-create type="button"
                                                                        class="btn btn-success btn-icon ml-2 mb-2"><i
                                                                            class="ik ik-plus"></i></button>
                                                                </form>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <h5><strong>Surgery Detail</strong></h5>
                                                                <form class="form-inline repeater">
                                                                    <div data-repeater-list="group-a">
                                                                        <div data-repeater-item class="d-flex mb-2">
                                                                            <label class="sr-only"
                                                                                for="inlineFormInputGroup1">Users</label>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="text" class="form-control"
                                                                                    id="surgery" name="surgery"
                                                                                    placeholder="Surgery">
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="email" class="form-control"
                                                                                    id="time" name="time"
                                                                                    placeholder="Time">
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-2 mr-sm-2 mb-sm-0">
                                                                                <input type="tel" class="form-control"
                                                                                    id="remark" name="remark"
                                                                                    placeholder="Remark">
                                                                            </div>

                                                                            <button data-repeater-delete type="button"
                                                                                class="btn btn-danger btn-icon ml-2"><i
                                                                                    class="ik ik-trash-2"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <button data-repeater-create type="button"
                                                                        class="btn btn-success btn-icon ml-2 mb-2"><i
                                                                            class="ik ik-plus"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <h4 class="sub-title"><strong>Addicted To</strong></h4>
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>DIABETES</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y1"
                                                                id="y1" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m1"
                                                                id="m1" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>HTN</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y2"
                                                                id="y2" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m2"
                                                                id="m2" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>IHD</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y3"
                                                                id="y3" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m3"
                                                                id="m3" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>ASTHAMA</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y4"
                                                                id="y4" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m4"
                                                                id="m4" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>KD</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y5"
                                                                id="y5" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m5"
                                                                id="m5" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>CVA</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y6"
                                                                id="y6" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m6"
                                                                id="m6" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>APD</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y7"
                                                                id="y7" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m7"
                                                                id="m7" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>THYROID DYSFUNCTION</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="y8"
                                                                id="y8" placeholder="1 year">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input type="text" class="form-control" name="m8"
                                                                id="m8" placeholder="5 month">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="form-group row">
                                                        <label for="exampleInputUsername2"
                                                            class="col-sm-1 col-form-label">
                                                            <div class="checkbox-fade fade-in-success">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr">
                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                    </span>
                                                                    <span>OTHERS</span>
                                                                </label>
                                                            </div>
                                                        </label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control select2">
                                                                <option value="cheese">Option 1</option>
                                                                <option value="tomatoes">Option 2</option>
                                                                <option value="mozarella">Option 3</option>
                                                                <option value="mushrooms">Option 4</option>
                                                                <option value="pepperoni">Option 5</option>
                                                                <option value="onions">Option 6</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">
                                                            <h5><strong>Medicines</strong></h5><strong></strong>
                                                        </label>
                                                        <textarea name="medicine" name="medicine" rows="4"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button> -->
                                        <input type="submit" class="btn btn-primary mr-2" value="Submit">
                                            <button class="btn btn-light" id="cButton" data-dismiss="modal">Cancel</button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src=" src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src=" plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src=" plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src=" plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src=" plugins/screenfull/dist/screenfull.js"></script>
        <script src=" dist/js/theme.min.js"></script>

        <script src=" plugins/datedropper/datedropper.min.js"></script>
        <script src=" js/form-picker.js"></script>
        <script src=" plugins/moment/moment.js"></script>

        <script src="js/jquery.validate.js"></script>
        <script src="jscode/medicalprofile_validation.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
                (function (b, o, i, l, e, r) {
                    b.GoogleAnalyticsObject = l; b[l] || (b[l] =
                        function () { (b[l].q = b[l].q || []).push(arguments) }); b[l].l = +new Date;
                    e = o.createElement(i); r = o.getElementsByTagName(i)[0];
                    e.src = 'https://www.google-analytics.com/analytics.js';
                    r.parentNode.insertBefore(e, r)
                }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto'); ga('send', 'pageview');
        </script>
</body>

</html>