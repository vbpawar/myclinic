<style>
    .error{
        color:red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>

<div class="modal fade" id="feesModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Doctor's Fees:</u></string></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="feesMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for=""  class="required">Doctor Name</label>
                                <select class="form-control select2" id="userId" name="doctorId" style="width: 100%">
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
                                <label for="fee">Doctor Fees</label>
                                <input id="fee" class="form-control" type="text" name="fee" placeholder="Fees"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" />                         
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

<script src="jscode/insertFeesMaster.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/fees_validation.js"></script>
