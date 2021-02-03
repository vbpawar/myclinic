<style>
    .error{
        color:red;
    }
    .required:after {
    content:" *";
    color: red;
  }

</style>

<div class="modal fade" id="instModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Instruction details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
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
             

                <div class="modal-footer">

                    <input type="submit" class="btn btn-primary mr-2" value="Submit">
                    <button class="btn btn-light" id="cButton" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="jscode/insert_instruction.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/instruction_validation.js"></script>