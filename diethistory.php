<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    .error{
        color:red;
    }
</style>
<body>

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

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fullwindowModal">Add Diet Information</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: aliceblue;">
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>Diet History</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form id="diethistoryform" method="POST" class="forms-sample" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>Information Details</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Fat</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="fat" id="fat">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Metabolic Age</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="metabolicAge" id="metabolicAge">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Viceral Fat</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="viceral" id="viceral">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Chest</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="chest" id="chest">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Waist</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="waist" id="waist">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Hip</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="hip" id="hip">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Thigh(R)</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="thighR" id="thighR">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Thigh(L)</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="thighL" id="thighL">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">Waist Hip Ratio</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="waistRatio" id="waistRatio">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="">No. Family Members</label>
                                                                    <input type="text" placeholder="10" class="form-control" name="noFamilyMembers" id="noFamilyMembers">
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
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>Information</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">DM</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="dm" id="dm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">HTN</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="htn" id="htn">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Vericose Veins</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="vericose" id="vericose">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Irregular Menses</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="irregularMenses" id="irregularMenses">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Thyroid Disorder</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="thyroid" id="thyroid">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Joint Pain</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="joint" id="joint">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Constipation</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="constipation" id="constipation">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Pedal Edema</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="pedalEndema" id="pedalEndema">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">PCOD</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="pcod" id="pcod">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Back Ache</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="backAche" id="backAche">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Acidity</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="acidity" id="acidity">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Gases</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="gases" id="gases">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Heart Disease</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="heartDisease" id="heartDisease">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Dislipidemia</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="Dislipidemia" id="Dislipidemia">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Breathlessness</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="breathlessness" id="breathlessness">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Bloating</label>
                                                                    <input type="text" placeholder="01" class="form-control" name="bloating" id="bloating">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" style="background-color: aliceblue;">
                                            <h3 class="d-block w-100"><strong>Information<small
                                                            class="float-right">Date: 01/01/2020</strong></small></h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Surgical History</label>
                                                        <select class="form-control select2" name="surgicalHistory" id="surgicalHistory">
                                                            <option value="cheese">cheese</option>
                                                            <option value="tomatoes">tomatoes</option>
                                                            <option value="mozarella">mozarella</option>
                                                            <option value="mushrooms">mushrooms</option>
                                                            <option value="pepperoni">pepperoni</option>
                                                            <option value="onions">onions</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Like</label>
                                                        <input type="text" placeholder="likes" class="form-control" name="likes" id="likes">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Dislike</label>
                                                        <input type="text" placeholder="dislikes" class="form-control" name="dislike" id="dislike">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Diet Recall</label>
                                                        <textarea id="dietRecall" name="dietRecall" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Surgical History</label>
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

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Sweet Craving</label>
                                                        <input type="text" placeholder="" class="form-control" name="sweetCraving" id="sweetCraving">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-6 mb-30">
                                                    <h4 class="sub-title">Diat Pattern</h4>
                                                    <div class="checkbox-fade fade-in-success" id="dietPattern" name="dietPattern">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Veg</span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-fade fade-in-success" id="dietPattern" name="dietPattern">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Nonveg</span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-fade fade-in-success" id="dietPattern" name="dietPattern">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Mix</span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-fade fade-in-success" id="dietPattern" name="dietPattern">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Egg</span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Outside Eating Freq</label>
                                                        <input type="text" placeholder="" class="form-control" name="outsideeat" id="outsideeat">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Options</label>
                                                        <select class="form-control select2">
                                                            <option value="cheese">Week</option>
                                                            <option value="tomatoes">Option 2</option>
                                                            <option value="mozarella">Option 3</option>
                                                            <option value="mushrooms">Option 4</option>
                                                            <option value="pepperoni">Option 5</option>
                                                            <option value="onions">Option 6</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Oil Consumption</label>
                                                        <span>/Month</span>
                                                        <input type="text" placeholder="" class="form-control" name="oconsumption" id="oconsumption">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Tea/Coffee</label>
                                                        <span>/Month</span>
                                                        <input type="text" placeholder="tea" class="form-control" name="teacoffee" id="teacoffee">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="address">Exercise Pattern</label>
                                                        <textarea name="address" name="address" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="remark">Remarks</label>
                                                        <textarea name="remark" name="remark" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Past Attempts of Wt. Loss</label>
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
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-6 mb-30">
                                                    <h4 class="sub-title">Other Habbits</h4>
                                                    <div class="checkbox-fade fade-in-success">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Drinking</span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-fade fade-in-success">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Smoking</span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox-fade fade-in-success">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Tobacco</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                              
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.min.js"></script>
    <script src="jscode/apis.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="jscode/diethistory_validation.js"></script>
        <script src="jscode/diet_History.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>