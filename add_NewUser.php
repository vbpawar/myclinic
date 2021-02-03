<style>
    .error {
        color: red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>
<div  class="modal fade full-window-modal show" id="userModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>User details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="userMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username" class="required">User Name</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="User Name" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latitude" class="required">Password</label>
                                <input type="password" id="upassword" name="upassword" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latitude" class="required">Confirm  Password</label>
                                <input type="password" id="conpassword" name="conpassword" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">

                      
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="longitude">Mobile Number </label>
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="mobile" ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="usertype">Aadhar Number</label>
                                <input type="text" id="addharId" name="addharId" class="form-control" placeholder="Aadhar Number" ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="usertype" class="required">User Type</label>
                                <select class="form-control select2" id="roleId" name="usertype" style="width: 100%;" placeholder="role Name">  
                                </select>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row">

                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input id="designation" class="form-control" type="text" name="designation" placeholder="Designation" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branchName" class="required">Branch Name </label>
                                <select class="form-control select2" id="branchId" name="branchName" style="width: 100%;" placeholder="Branch Name">
                                 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firmName">Firm Name</label>
                                <input id="firmName" class="form-control" type="text" name="firmName" placeholder="firm Name" />
                            </div>
                        </div>
                     
                        </div>
                        <div class="row">
                      
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Sign</label>
                                    <textarea id="sign" class="form-control" type="text" name="sign" placeholder="sign"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address" class="required">Address</label>
                                    <textarea id="address" class="form-control" type="text" name="address" placeholder="address"></textarea>

                                </div>
                            </div>

                            <div class="col-sm-4" style="margin-top: 33px;">
                        <label for="firmName">Active</label>
                            <div class="checkbox-fade fade-in-success check">
                            <label>
                                    <input type="radio" value="1" name="active" id="active">
                                    <span class="cr">
                                      <i class="cr-icon ik ik-check txt-success"></i>
                                      </span>
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input type="radio" value="0" name="inactive" id="inactive">
                                    <span class="cr">
                                      <i class="cr-icon ik ik-check txt-success"></i>
                                      </span>
                                    <span>No</span>
                                </label>
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

    <script src="jscode/insertUserMaster.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="jscode/userMaster_validation.js"></script>
