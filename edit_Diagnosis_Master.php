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
   
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                </ul>
                <div class="tab-content" id="pills-tabContent">
               
                 
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="diagnosisMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diagnosis" class="required">Diagnosis</label>
                                <input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="Diagnosis Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icdCode">icd Code</label>
                                <input type="text" id="icdCode" name="icdCode" class="form-control" placeholder="icdCode">
                            </div>
                        </div>
                       
                    </div>
                    
                    <button class="btn btn-success" type="submit">Update Diagnosis</button>
                    <button class="btn btn-success" type="button" onClick="gobackD()">Cancel</button>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="jscode/edit_diagnosis.js"></script>
<script src="jscode/update_Diagnosis_Master.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/diagnosis_validation.js"></script>

