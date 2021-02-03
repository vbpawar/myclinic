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
   
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="instructionMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="instruction" class="required">English</label>
                                <input type="text" id="instruction" name="instruction" class="form-control" placeholder="Enter Instruction in English">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hindi">Hindi</label>
                                <input type="text" id="hindi" name="hindi" class="form-control" placeholder="Enter Instruction in Hindi">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marathi">Marathi</label>
                                <input type="text" id="marathi" name="marathi" class="form-control" placeholder="Enter Instruction in marathi">
                            </div>
                        </div>
                       
                    </div>
             
                    <button class="btn btn-success" type="submit">Update Instruction</button>
                    <button class="btn btn-success" type="button" onClick="gobackInstruction()">Cancel</button>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="jscode/edit_instruction.js"></script>
<script src="jscode/update_instruction_master.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/instruction_validation.js"></script>


