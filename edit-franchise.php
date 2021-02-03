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
                    <input type="submit" class="btn btn-primary mr-2" value="Update">
                    <button class="btn btn-light" onclick="goback()">Cancel</button>
                </div>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="jscode/edit-franchise.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/franchise-validation.js"></script>


