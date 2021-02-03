<style>
    .error {
        color: red;
    }
</style>
<?php
session_start();?>
 <button class="btn btn-primary" type="button" onclick="goback()" style="float: right;">Back</button>
<div class="container-fluid">
   
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Package Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Update Package Details</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-6"> <strong>Package Name</strong>
                                    <br>
                                    <p class="text-muted" id="pName">Johnathan Deo</p>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Package Cost</strong>
                                    <br>
                                    <p class="text-muted" id="pCost">(123) 456 7890</p>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Details</strong>
                                    <br>
                                    <p class="text-muted" id="pDetails">johnathan@admin.com</p>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Active/Inactive</strong>
                                    <br>
                                    <p class="text-muted" id="pActive">London</p>
                                </div>
                            </div>
                            <hr>
                            <form id="addPackageDetails">
                            <div class="row">
                                <div class="col-md-6 col-6"> <strong>Select procedures</strong>
                                    <br>
                                 <select name="test" id="test" class="form-control" style="width: 100%;"></select>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Package quota</strong>
                                    <br>
                                  <input type="number" class="form-control" id="packageQuota" name="packageQuota">
                                </div>
                                <div class="col-md-3 col-6">
                                    <br>
                                   <button class="btn btn-success" type="button" onclick="addTest()">Add procedures</button>
                                </div>
                                
                            </div>
                        </form>
                        <hr>
                            <div class="dt-responsive tbl">
                                <table class="table table-bordered" id="packageTest">
                                    <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>Cost</th>
                                            <th>Quota</th>
                                            <th class="nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="packageTestData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <form id="addpackagebranch">
                            <div class="row">
                                <div class="col-md-3 col-6"> <strong>Select Branch</strong>
                                    <br>
                                 <select name="branchId" id="branchId" class="form-control" style="width: 100%;"></select>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Package Discount(%)</strong>
                                    <br>
                                  <input type="text" class="form-control" id="packageDiscount" name="packageDiscount">
                                </div>
                                <div class="col-md-3 col-6"> <strong>Details</strong>
                                    <br>
                                   <button class="btn btn-success" type="button" onclick="addPackagetoBranch()">Add Branch</button>
                                </div>
                                
                            </div>
                        </form>
                            <hr>
                            <div class="dt-responsive tbl">
                                <table class="table table-bordered" id="branchPackage">
                                    <thead>
                                        <tr>
                                            <th>Branch</th>
                                            <th>Package Discount</th>
                                            <th class="nosort"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="branchData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal" id="updatePackage">
                                <div class="form-group">
                                    <label for="example-name">Package Title</label>
                                    <input type="text" placeholder="Johnathan Doe" class="form-control" name="packageTitle" id="packageName">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Package Cost</label>
                                    <input type="text" placeholder="12.00" class="form-control" name="packageCost" id="packageCost">
                                </div>

                                <div class="form-group">
                                    <label for="example-password">Package Details</label>
                                    <textarea name="packageDetails" id="packageDetails" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="row">

                                    <div class="form-group">
                                        <label for="example-password">Package Status</label>
                                        <div class="checkbox-fade fade-in-success check">
                                            <label>
                                                <input type="radio" value="1" name="isActive" id="isActivet">
                                                <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                <span>Active</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="0" name="isActive" id="isActivef">
                                                <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                <span>In active</span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Update Package Details</button>
                            </form>
                        </div>
                      
                   
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
<script src="jscode/loadTest.js"></script>
<script src="jscode/login.js"></script>
<script src="jscode/load-package-details.js"></script>
<script src="jscode/updatePackage.js"></script>