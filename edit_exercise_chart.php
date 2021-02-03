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
                        <form class="forms-sample" id="exerciseForm" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                             
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title" >Title</label>
                                        <input type="text" id="title1" name="title" class="form-control">
                                    </div>
                                </div>
                         
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea class="form-control" id="details1" name="details" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                        <div class="text-center">
                                           
                                           <img alt="No image" class="rounded-circle img-fluid mb-20" width="150" height="150" id="userJpg" style="padding-block-end: 10px;">

                                       <div class="row text-center justify-content-md-center">
                                          <div class="form-group">
                                       <input type="file" name="userPic" id="userPic" class="form-control" onchange="loadFile(event)" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            </div>
                                       </div>
                        </div>

                    </div>

                    
                    <button class="btn btn-success" type="submit">Update Exercise</button>
                    <button class="btn btn-success" type="button" onClick="gobackCo()">Cancel</button>
                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="jscode/loadFile.js"></script>
<script src="jscode/editExercise.js"></script>
<script src="jscode/update_exercise.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/exercise_validation.js"></script>


