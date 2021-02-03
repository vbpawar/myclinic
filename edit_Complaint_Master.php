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
   
        <div class="col-lg-6 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                    <!-- <li class="nav-item">
                        <a class="nav-link " id="pills-timeline-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-timeline" aria-selected="true"></a>
                    </li>    -->
                   
                </ul>
                <div class="tab-content" id="pills-tabContent">
               
                 
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="complaintMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="complaint"  class="required">Complaints</label>
                                <input type="text" id="complaint" name="complaint" class="form-control" placeholder="Complaint Name">
                            </div>
                        </div>
                       
                    </div>
                    
                    <button class="btn btn-success" type="submit">Update Complaint</button>
                    <button class="btn btn-success" type="button" onClick="gobackComp()">Cancel</button>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="jscode/edit_complaint.js"></script>
<script src="jscode/update_Complaint_Master.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/complaint_validation.js"></script>


