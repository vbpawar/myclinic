<style>
    .error{
        color:red;
    }
       
  .required:after {
    content:" *";
    color: red;
  }
</style>
<div class="main-content">
    <div class="container-fluid">
   
        <div class="col-lg-6 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="testMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="testName" class="required">Test Name</label>
                                <input type="text" id="testName" name="testName" class="form-control" placeholder="Test Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fees" class="required">Fees </label>
                                <input type="text" id="fees" name="fees" class="form-control" placeholder="Fee" >

                            </div>
                        </div>
                      
                       
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="testDetails">Test Details</label>
                                <textarea id="testDetails" name="testDetails" class="form-control" placeholder="Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Update Test</button>
                    <button class="btn btn-success" type="button" onClick="gobackTest()">Cancel</button>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="jscode/edit_daiTestMaster.js"></script>
<script src="jscode/update_Test_Master.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/testMaster_validation.js"></script>

