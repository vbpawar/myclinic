<style>
    .error {
        color: red;
    }
    .required:after {
    content:" *";
    color: red;
  }

</style>
<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <ul class="nav nav-pills custom-pills t1" id="pills-tab" role="tablist">
                    <!-- <li class="nav-item">
                        <a class="nav-link " id="pills-timeline-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-timeline" aria-selected="true"></a>
                    </li>    -->

                </ul>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="medicineMasterForm" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="type" class="required">Type</label>

                                            <select class="form-control select2" id="typeIde" name="type" placeholder="Type" style="width:100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name" class="required">Name</label>
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
                                            <label for="morning" class="required">Morning</label>

                                            <select class="form-control select2" id="morninge" name="morning" style="width:100%;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="noon"  class="required">Afternoon</label>
                                            <select class="form-control select2" id="noone" name="noon" style="width:100%;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="night" class="required">Night</label>

                                            <select class="form-control select2" id="nighte" name="night" style="width:100%;"></select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                   

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="instruction" class="required">Instruction</label>

                                            <select class="form-control select2" id="instructione" name="instruction" placeholder="Instruction" style="width:100%;">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="days" class="required">Days </label>
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
                                                <input type="radio" value="1" name="isImportant" id="isImportant1">
                                                <span class="cr">
                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                </span>
                                                <span>Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="0" name="isImportant" id="notImportant1">
                                                <span class="cr">
                                             <i class="cr-icon ik ik-check txt-success"></i>
                                              </span>
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Update Medicine</button>
                                <button class="btn btn-success" type="button" onClick="gobackMedicine()">cancel</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="jscode/editMedicines.js"></script>
<script src="jscode/update_medicines.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/medicines_validation.js"></script>