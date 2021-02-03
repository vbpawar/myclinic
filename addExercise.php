<style>
    .error {
        color: red;
    }
  
  .required:after {
    content:" *";
    color: red;
  }

</style>
<div class="modal fade" id="exerciseModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="forms-sample" id="exerciseForm" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel"><strong><u>Exercise Details</u></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

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
                                        <input type="text" id="title" name="title" class="form-control">
                                    </div>
                                </div>
                            

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                        <div class="text-center">
                                           
                                           <img src="upload/user/<?php echo $_SESSION['userId'];?>.jpg" class="rounded-circle img-fluid mb-20" width="150" height="150" id="userJpg" style="padding-block-end: 10px;">

                                       <div class="row text-center justify-content-md-center">
                                          <div class="form-group">
                                       <input type="file" name="userPic" id="userPic" class="form-control" onchange="loadFile(event)" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            </div>
                                       </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <input type="submit" class="btn btn-primary mr-2" value="Submit">
                    <button class="btn btn-light"  data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </form>
    </div>
</div>

<script src="jscode/insert_exercise.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/exercise_validation.js"></script>
