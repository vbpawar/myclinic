<style>
    .error {
        color: red;
    }
    .required:after {
    content:" *";
    color: red;
  }
</style>

<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Test details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="testMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="testName"  class="required">Test Name</label>
                                <input type="text" id="testName" name="testName" class="form-control" placeholder="Test Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"  >
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
                    
                        <div class="col-md-4">
                            <!-- <div class="form-group">
                            
                                <label for="type">Category</label>
                                <select  class="form-control " id="type" name="type" placeholder="type">
                                  <option value="Lab">Lab</option>
                                 <option value="Package">Package</option>
                                 <option value="Other">Other</option>
                             </select>
                            </div> -->
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

    <script src="jscode/insert_daiTestMaster.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/testMaster_validation.js"></script>
  
