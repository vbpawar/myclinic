<style>
    .error {
        color: red;
    }
  .required:after {
    content:" *";
    color: red;
  }

</style>

<div class="modal fade full-window-modal" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="demoModalLabel"><strong>PATIENT DETAILS:</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="patientform" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstName" class="required">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middleName">Middle Name</label>
                                <input type="text" id="middleName" name="middleName" class="form-control" placeholder="Middle Name" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surname" class="required">Last Name</label>
                                <input type="text" id="surname" name="surname" class="form-control" placeholder="Last Name" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender" class="required">Gender</label>
                                <select class="form-control select2" id="gender" name="gender" placeholder="Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Enter Age</label>
                                <input type="number" class="form-control" name="age" id="age" onchange="getBirthDay(this.value)" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> Date of Birth</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile1" class="required">Height</label>
                                <input type="text" class="form-control" id="height" name="height" placeholder="Height in cm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label for="weight" class="required">Weight</label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight in kg">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="occupation" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="maritalstatus">Marital Status</label>
                                <select class="form-control select2" id="maritalstatus" name="maritalstatus" placeholder="Marital Status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="referredby" class="required">Referred By</label>
                                <select id="referredby" name="referredby" class="form-control" style="width: 100%;"></select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <button class="btn btn-success" style="margin-top:30px" type="button" data-toggle="modal" data-target="#exampleModal">+</button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="required">Consulting Date</label>
                                <input type="date" class="form-control" name="nextVisitDate" id="nextVisitDate">
                            </div>
                        </div>

                    </div>

                    <h5>Contact Details:</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address" class="required">Mobile No.</label>
                                <input type="text" class="form-control" id="mobile1" name="mobile1" placeholder="Mobile No" ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country" class="required">Country</label>

                                <select class="form-control select2" id="country" name="country" style="width: 100%;" onchange="loadStates(this.value);" placeholder="country" style="width:100%;">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state" class="required">State</label>
                                <select class="form-control select2" id="state" name="state" placeholder="state" onchange="loadCities(this.value);" style="width:100%;">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city" class="required">City</label>
                                <select class="form-control select2" id="city" name="city" placeholder="city" style="width:100%;"></select>

                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address" class="required">Address</label>
                                <textarea class="form-control" id="address1" name="address" rows="1" placeholder="Address"></textarea>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">

                <input type="submit" class="btn btn-primary mr-2" value="Submit">
                <button class="btn btn-light" id="cButton" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="jscode/refferList.js"></script>
<script src="jscode/patient_validation.js"></script>
<script src="jscode/addPatient.js"></script>
<script src="jscode/getCountryStateCity.js"></script>
<?php include 'add_reffName.php';?>