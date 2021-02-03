<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>

<link rel="stylesheet" href="dist/css/dropzone.css">
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/viewImage.css">
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-1">
                    <div class="page-header-title">
                        <i class="rounded-circle" style="margin-right: 50px"><img src="img/user.jpg" style="height: 82px; margin-left: 40px;" class="rounded-circle"  height="50px" id="userPic" /></i>
                        <div class="d-inline">

                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="it">
                    <div class="overlay"></div>
                    <div class="img-show">
                        <span>X</span>
                        <img src="">
                    </div>
                </div>
                <div class="col-lg-8"></div>
                <!-- <div class="col-lg-8 form-group row" style="background-color: #64ffda;">
                                      <label for="" class="col-sm-2 col-form-label"  ><b>Patients Name:</b></label>
                        
                                     <label for="" class="col-sm-2 col-form-label"  id="uname" style="font-weight: bold;"></label> 

                                      <label for="" class="col-sm-2 col-form-label" id="uage" style="font-weight: bold;"></label> 
                                    <label for="" class="col-sm-2 col-form-label" id="ugender" style="font-weight: bold;"></label> 
                                      <label for="" class="col-sm-2 col-form-label" id="uphone" style="font-weight: bold;"></label>  
                                     <label for="" class="col-sm-2 col-form-label" id="ucity" style="font-weight: bold;"></label>    

                </div> -->
                
                <div class="col-lg-2">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <button type="button" class="btn btn-success" onclick="goback();"><i class="ik ik-arrow-left"></i></button>

                    </nav>
                </div>

            </div>
        </div>

        <div class="col-lg-12 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Profile</a>
                    </li>
                    <!-- <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#upload_doc" role="tab" aria-controls="pills-profile" aria-selected="false">Upload Documnets</a>
                                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-setting" aria-selected="false">Upload Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-setting" aria-selected="false">Profile Picture</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#cervical" role="tab" aria-controls="pills-setting" aria-selected="false">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#packages" role="tab" aria-controls="pills-timeline" aria-selected="false">Packages</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade " id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <form id="uploadProfile" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="profiletimeline mt-0">

                                    <div class="text-center">
                                        <img src="img/user.jpg" class="rounded-circle img-fluid mb-20" width="150" height="150" id="userJpg" style="padding-block-end: 10px;">

                                        <div class="row text-center justify-content-md-center">
                                            <div class="form-group">
                                                <input type="file" name="profilePic" id="profilePic" class="form-control" onchange="loadFile(event)" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-success" type="submit">Update profile picture</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">

                            </div>
                            <div class="profiletimeline mt-0">
                                <div class="card-header">
                                    <h3>Upload an Documents</h3></div>
                                <div class="card-body">
                                    <!-- <div class="dropzone"></div> -->
                                    <form class="dropzone" id="myAwesomeDropzone">
                                        <input type="hidden" id="patientId" name="patientId" />
                                    </form>
                                </div>
                                <hr>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">

                            <form class="form-horizontal" id="epatientDetails" method="POST" enctype="multipart/form-data">
                                <h5>Basic Details</h5>
                                <h6><span style="color:red">*</span> Marked fields are mandatory</h6>                                                           
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fname" class="required">First Name</label>
                                            <input type="text" placeholder="Johnathan" class="form-control" name="firstName" id="firstName" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname">Middle Name</label>
                                            <input type="text" placeholder="Kemya" class="form-control" name="middleName" id="middleName" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lname" class="required">Last Name</label>
                                            <input type="text" placeholder="Doe" class="form-control" name="surname" id="surname" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="maritalstatus">Marital Status</label>
                                            <select name="maritalstatus" id="maritalstatus" class="form-control">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="birthDate" class="required">Birth Date</label>
                                            <input type="date" placeholder="123 456 7890" class="form-control" name="birthDate" id="birthDate">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="religion">Religion</label>
                                            <select name="religion" id="religion" class="form-control">
                                                <option value="Hindu">Hindu</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Sikh">Sikh</option>
                                                <option value="Jain">Jain</option>
                                                <option value="none">None of the Above</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h5>Medical Details</h5>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="height" class="required">Height (in cm)</label>
                                            <input type="text" placeholder="165" class="form-control" name="height" id="height">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" class="required">
                                            <label for="weight"  class="required">Weight (in KG)</label>
                                            <input type="text" placeholder="65" class="form-control" name="weight" id="weight">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" placeholder="Enginner" class="form-control" name="occupation" id="occupation" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="referredbye" class="required">Referred By</label>
                                            <select id="referredbye" name="referredbye" class="form-control"></select>
                                        </div>

                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button class="btn btn-success" style="margin-top:30px" type="button" data-toggle="modal" data-target="#exampleModal">+</button>
                                        </div>
                                    </div>
                                </div>

                                <h5>Contact Details:</h5>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mobile1" class="required">Mobile No.</label>
                                            <input type="text" class="form-control" id="mobile1" name="mobile1" placeholder="Mobile No" ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="landline">Landline</label>
                                            <input type="text" placeholder="123 456 7890" class="form-control" name="landline" id="landline">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="economicStrata ">Economic Strata</label>
                                            <select name="economicStrata" id="economicStrata" class="form-control">
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="country1" class="required">Country</label>

                                            <select class="form-control select2" id="country1" name="country"  placeholder="country" onchange="loadStates1(this.value)" style="width:100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="state1" class="required">State</label>
                                            <select class="form-control" id="state1" name="state" placeholder="state" onchange="loadCities1(this.value)" style="width:100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city1" class="required">City</label>
                                            <select class="form-control" id="city1" name="city" placeholder="city" style="width:100%;"></select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address" class="required">Address</label>
                                            <textarea class="form-control" id="address1" name="address" rows="1"></textarea>
                                        </div>

                                    </div>

                                    <div class="col-md-8">
                                        <h6>Select Default Option</h6>

                                        <div class="col-sm-12 col-xl-12 mb-30">
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="alcohol" id="alcohol">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Alcohol</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="tobacco" id="tobacco">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Tobacco</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="diabetes" id="diabetes">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Diabetes</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="smoking" id="smoking">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Smoking</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="HTN" id="HTN">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>HTN</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="cholestrol" id="cholestrol">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Cholesterol</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="1" name="hardDrink" id="hardDrink">
                                                    <span class="cr">
                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                </span>
                                                    <span>Hard Drink</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h5>Appointment Details</h5>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fvisitdate">First Visit Date</label>
                                            <input type="date" class="form-control" name="firstVisitDate" id="firstVisitDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lvisitdate">Last Visit Date</label>
                                            <input type="date" placeholder="Pune" class="form-control" name="lastVisitDate" id="lastVisitDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remark</label>
                                    <textarea name="remarks" id="remarks1" rows="1" class="form-control col-md-4"></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Update Profile</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="cervical" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body c">
                                    <div class="dt-responsive tbl">
                                        <table id="cApp" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Appointment Date</th>
                                                    <th>Doctor Name</th>
                                                    <th>Scheduled By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cAppData">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="packages" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="container-fluid">
                    <!-- <button type="button" class="btn  btn-success s" style="float: right;margin-top:5px;" onclick="addPackage()">Add New</button> -->
                            <div class="card">
                        <div class="load-pack" style="margin-top: 10px;"></div>
                                <div class="card-body c s">
                                    <div class="dt-responsive tbl">
                                        <table id="packageDetails" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Package</th>
                                                    <th>Package Cost</th>
                                                    <th>Package Duration</th>
                                                    <th>Expiray Date</th>
                                                    <th>Purchase Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
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

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(function() {
        "use strict";

        $("#userPic").click(function() {
            var $src = $(this).attr("src");
            $(".it").fadeIn();
            $(".img-show img").attr("src", $src);
        });

        $("span, .overlay").click(function() {
            $(".it").fadeOut();
        });

    });
</script>
<script src="jscode/refferList.js"></script>
<script src="jscode/load.js"></script>
<script src="jscode/cancel-appointment.js"></script>
<script src="jscode/patient_profile.js"></script>
<script type="text/javascript" src="js/dropzone.js"></script>
<script type="text/javascript" src="jscode/dropzoneProduct.js"></script>
<script src="jscode/updatePatientsJs.js"></script>
<script src="jscode/patientPackage.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="jscode/uploadProfile.js"></script>

<script src="jscode/patient_validation.js"></script>
<?php include 'add_reffName.php';?>
<?php include 'assign_package.php';?>