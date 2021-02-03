<style>
    .error{
        color:red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>
<div class="modal fade" id="dosageModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Dosage details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="dosageMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dosage"  class="required">Dosage</label>
                                <input type="text" id="dosage" name="dosage" class="form-control" placeholder="Enter New Dosage">
                            </div>
                        </div>
                        <div class="col-md-4">
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

<script src="jscode/insert_dosage.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/dosage_validation.js"></script>