<style>
    .error{
        color:red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>

<div class="modal fade" id="medicinesModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Medicines details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form class="forms-sample" id="medicineMasterForm" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="type"  class="required">Type</label>

                                            <select class="form-control select2" id="typeId" name="type" placeholder="Type" style="width:100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name"  class="required">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="genName">Generic Name</label>
                                            <input type="text" id="genName" name="genName" class="form-control" placeholder="Generic Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="morning"  class="required">Morning</label>

                                            <select class="form-control select2" id="morning" name="morning" style="width:100%;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="noon"  class="required" >Afternoon</label>
                                            <select class="form-control select2" id="noon" name="noon" style="width:100%;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="night"  class="required">Night</label>

                                            <select class="form-control select2" id="night" name="night" style="width:100%;"></select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                   

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="instruction"  class="required">Instruction</label>

                                            <select class="form-control select2" id="instructionId" name="instruction"  style="width:100%;">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="days"  class="required">Days </label>
                                            <input type="text" id="days" name="days" class="form-control" placeholder="Days">
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 35px;">
                                        <div class="form-group">
                                            <label for="isImportant">Important</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" style="margin-top: 35px;" >
                                        <div class="checkbox-fade fade-in-success check">
                                            <label>
                                                <input type="radio" value="1" name="isImportant" >
                                                <span class="cr">
                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                </span>
                                                <span>Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="0" name="isImportant" >
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
</div>

<script src="jscode/insert_Medicines_master.js"></script>
<!-- <script src="jscode/get_Instruction.js"></script> -->
<script src="js/jquery.validate.js"></script>
<script src="jscode/medicines_validation.js"></script>
