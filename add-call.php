
<style>
    .error {
        color: red;
    }
  .required:after {
    content:" *";
    color: red;
  }

</style>
<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="callForm" method="POST">
        <div class="modal-content">
            <div class="modal-header" style="background-color: aliceblue;">
               <center> <h3 class="modal-title" id="fullwindowModalLabel"><strong><u>Create new call entry</u></strong></h3></center>
                <div class="template-demo" id="s2">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="ik ik-search" style="font-size: 20px;color: blueviolet;" title="Quick Look up"></i></button>
                </div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: aliceblue;">
                                    <h3><strong>Basic Details</strong></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="firstName" class="required">First Name</label>
                                                <input type="text" placeholder="" class="form-control" name="firstName" id="firstName">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Middle Name</label>
                                                <input type="text" placeholder="" class="form-control" name="middleName" id="middleName">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Last Name</label>
                                                <input type="text" placeholder="" class="form-control" name="lastName" id="lastName">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Enter Age</label>
                                                <input type="number" class="form-control" name="age" id="age" onchange="getBirthDay(this.value)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Date of Birth</label>
                                                <input type="date" class="form-control" name="birthdate" id="birthdate">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Gender</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">

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
                                    <h3><strong>Contact Details</strong></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Email Id</label>
                                                <input type="email" class="form-control" name="emailId" id="emailId">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Contact Number</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Landline number</label>
                                                <input type="tel" class="form-control" name="landline" id="landline">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Country</label>
                                                <select  class="form-control select2"name="country" id="country" style="width: 100%;" onchange="loadStates(this.value);"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">State</label>
                                        
                                                <select  class="form-control select2" name="state" id="state" style="width: 100%;" onchange="loadCities(this.value);"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">City</label>
                                                <select  class="form-control select2" name="city" id="city" style="width: 100%;"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">Zip Code</label>
                                                <input type="text" class="form-control" name="zipcode" id="zipcode">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Near by area</label>
                                                <input type="text" class="form-control" name="nearByArea" id="nearByArea">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Reference</label>
                                                <select  class="form-control select2" name="reference" id="reference" style="width: 100%;"></select>
                                            </div>
                                        </div> -->
                           
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Call Status</label>
                                               <select name="callStatus" id="callStatus" style="width: 100%;" class="form-control select2">
                                               <option></option>
                                               <option value="1">Idle</option>
                                               <option value="2">Close Query</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Branch</label>
                                                <select name="branchId" id="branchId" class="form-control select2" style="width: 100%;" onchange="loadUsers(this.value)">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="required">Doctor</label>
                                                <select name="userId" id="userId" class="form-control select2" style="width: 100%;">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="referredby" class="required">Reference</label>
                                <select  class="form-control select2" name="reference" id="reference" style="width: 100%;"></select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <button class="btn btn-success" style="margin-top:30px" type="button" data-toggle="modal" data-target="#exampleModalNew">+</button>
                            </div>
                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="background-color: aliceblue;">
                        <h3 class="d-block w-100"><strong>Information
                                                          </strong></h3>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Disease</label>
                                    <input type="text" class="form-control" name="desease" id="desease">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Appointment Date</label>
                                    <div class="input-group input-group-primary"  id="apDate">
                                    <input type='text' class="form-control" id='appointmentDate' name="appointmentDate" autocomplete="off"/>
                                                    <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                                </div>
                                </div>
                            </div>
   
                        

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <input type="text"  class="form-control" name="remarks" id="remarks">
                                </div>
                            </div>

                            <div class="col-md-2" style="margin-top: 32px;">
                                <div class="form-group">
                                <div class="checkbox-fade fade-in-success">
                                                        <label>
                                                            <input type="checkbox" name="folowupNeeded" id="folowupNeeded" value="1">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Follow up needed ?</span>
                                                        </label>
                                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Follow up Date/Time</label>
                                    <input type="hidden" id="clientId" name="clientId">
                                    <div class="form-group">
                <div class='input-group date' id="foDate1">
                    <input type='datetime-local' class="form-control datepicker" name="foDate1" id='follwupdate'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
                                </div>
                            </div> -->
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="">Follow up Date/Time</label>
                                    <input type="hidden" id="clientId" name="clientId">
                                       <div class="form-group">
                                       <div class="input-group input-group-primary"  id="apDate">
                                       <input type='text' class="form-control" id='follwupdate' name="foDate1" autocomplete="off"/>
                                       <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                       </div>
                                       
                                 </div>                
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ud" style="display: none;">
                <div class="dt-responsive tbl col-md-6" >
                                <table id="followTablee" class="table">
                                    <thead>
                                        <tr>
                                            <th >Id</th>
                                            <th>Followup</th>
                                            <th>Date</th>
                                            <th>AttendedBy</th>
                                        </tr>
                                    </thead>
                                    <tbody id="callFollDatae">
                                       
                                    </tbody>
                                </table>
                             </div>
          </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="new">Save changes</button>
                <button type="button" class="btn btn-primary" id="update" style="display: none;" onclick="updateCall()">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="jscode/call-center-validation.js"></script>
<script src="jscode/addCall.js"></script>
<script src="jscode/updateCall.js"></script>
<?php include 'callRef.php';?>
  <script>
         
            jQuery('#appointmentDate').datetimepicker();
            jQuery('#follwupdate').datetimepicker();
        </script>