<style>
    .error{
        color:red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>
<?php
session_start();
?>

<div class="main-content">
    <div class="container-fluid">
      

        <div class="col-lg-12 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                   

                </ul>
                <div class="tab-content" id="pills-tabContent">
                   
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="userMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username" class="required">User Name</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="User Name" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
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
                                <input type="password" id="conpassword1" name="conpassword" class="form-control" placeholder="Password">
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
                                <select class="form-control select2" id="roleIde" name="usertype" style="width: 100%;" placeholder="role Name">  
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
                                <select class="form-control select2" id="branchIde" name="branchName" style="width: 100%;" placeholder="Branch Name">
                                 
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
                                    <label for="address" class="required" >Address</label>
                                    <textarea id="address" class="form-control" type="text" name="address" placeholder="address"></textarea>

                                </div>
                            </div>
                            <div class="col-sm-4" style="margin-top: 33px;">
                        <label for="firmName">Active</label>
                            <div class="checkbox-fade fade-in-success check">
                                <label>
                                    <input type="radio" value="1" name="active" id="active1">
                                    <span class="cr">
                                      <i class="cr-icon ik ik-check txt-success"></i>
                                      </span>
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input type="radio" value="0" name="active" id="inactive1">
                                    <span class="cr">
                                      <i class="cr-icon ik ik-check txt-success"></i>
                                      </span>
                                    <span>No</span>
                                </label>
                            </div>

                        </div>
                        </div>

                                <button class="btn btn-success" type="submit">Update User</button>
                                <button class="btn btn-success" type="button" onclick="gobackUser()">Cancel</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
      var data = {
userId:<?php echo $_SESSION['userId'];?>,
branchId:<?php echo $_SESSION['branchId'];?>,
username:'<?php echo $_SESSION['username'];?>',
franchiseid:'<?php echo $_SESSION['franchiseid']; ?>',
role:'<?php echo $_SESSION['role'];?>'
};
</script>
<script src="jscode/edit_User.js"></script>
<script src="jscode/update_User_Master.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/userMaster_validation.js"></script>