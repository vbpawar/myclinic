<style>
    .error {
        color: red;
    }
    .required:after {
    content:" *";
    color: red;
  }

</style>

<link rel="stylesheet" href="dist/css/dropzone.css">
<link rel="stylesheet" href="dist/css/style.css">
<div class="main-content">
    <div class="container-fluid">
   
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                   
                </ul>
              
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="forms-sample" id="feesMasterForm" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-md-4">
                            <div class="form-group">
                                <label for=""  class="required">Doctor Name</label>
                                <select class="form-control select2" id="doctorId" name="doctorId" style="width: 100%">
                                </select>
                            </div>
                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="feesType">Fees Type</label>
                                            <input id="feesType" class="form-control" type="text" name="feesType" placeholder="Fees Type" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fee"  >Doctor Fees</label>
                                            <input id="fee" class="form-control" type="text" name="fee" placeholder="Fees" />
                                        </div>
                                    </div>

                                </div>
                           
                                <button class="btn btn-success" type="submit">Update</button>
                                <button class="btn btn-success" type="button" onclick="gobackFees()">Cancel</button>
                                </form>
                        
                         
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/dropzone.js"></script>
<script type="text/javascript" src="jscode/dropzoneProduct.js"></script>
<script src="jscode/edit_Fees.js"></script>
<script src="jscode/updateFeesMaster.js"></script>
