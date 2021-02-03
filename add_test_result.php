

<style>
   .error {
   color: red;
   }
   .required:after {
   content: " *";
   color: red;
   }
</style>
<div class="modal fade" id="ResultModal" tabindex="-1" role="dialog" aria-labelledby="ResultModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <form class="forms-sample" id="Result_Form" method="POST" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="ResultModalLabel"><strong><u>Enter new Result Details</u></strong></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="pname" class="required">Patient Name</label>
                        <select class="form-control" style="width: 100%" name="patientId" id="firstName">
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="visitDate" class="required" >Visit Date</label>
                        <input type = "date" class="form-control" name="visitDate" id="visitDate"/>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="TestName" class="required" >Test Name</label>
                        <select class="form-control" style="width: 100%" name="TestName" id="TestName">
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-primary mr-2" value="Submit"  >
               <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </form>
   </div>
</div>
<script src="js/jquery.validate.js"></script>
<script src="jscode/testResultValidation.js"></script>
<script src="jscode/addTestResultlab.js"></script>

