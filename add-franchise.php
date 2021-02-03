<style>
    .error{
        color:red;
    }
   
  .required:after {
    content:" *";
    color: red;
  }

</style>

<div class="modal fade" id="branchModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Franchise details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="branchMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname" class="required">Franchise Name</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="franchise name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cperson" class="required">contact person</label>
                                <input type="text" id="cperson" name="cperson" class="form-control" placeholder="contact person">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cnumber" class="required">contact number</label>
                                <input type="text" id="cnumber" name="cnumber" class="form-control" placeholder="contact number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailid" class="required">Email id </label>
                                <input type="email" id="emailid" name="emailid" class="form-control" placeholder="email id">

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
<script src="jscode/add-franchise.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/franchise-validation.js"></script>
