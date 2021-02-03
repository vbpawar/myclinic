<style>
    .error {
        color: red;
    }
  
  .required:after {
    content:" *";
    color: red;
  }

</style>
<div class="modal fade" id="exampleModalNew" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="forms-sample" id="callrefferedByForm" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel"><strong><u>Enter new referring source</u></strong></h5>
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
                                        <label for="Name"  class="required">Source Name</label>
                                        <input type="text" id="reference1" name="reference1" class="form-control" placeholder="source name" onkeypress='return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32'>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="refemail" name="refemail" placeholder="Email">
                                    </div> -->
                                </div>

                            </div>

                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Mobile No.</label>
                                        <input type="text" class="form-control" id="refmo" name="refmo" placeholder="Mobile No"
                                        ng-pattern="/^[0-9]*$/" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthDate">Birth Date</label>
                                        <input id="birthDate1" class="form-control" type="date" name="birthDate1" placeholder="Max Yr 2020" />
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="1"></textarea>
                                    </div>
                                </div>

                            </div> -->
                        </div>

                        <!-- <div class="col-md-4">
                      

                            <img src="" class="rounded-circle img-fluid mb-20" width="150" height="150" id="reffredJpg" style="padding-block-end: 10px;">

                            <div class="row text-center justify-content-md-center">
                                <div class="form-group">
                                    <input type="file" name="imgProfile" id="imgProfile" class="form-control" onchange="loadpic(event)">
                                </div>
                            </div>

                           

                        </div> -->

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

<script src="jscode/callReffered.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/call_ref_validation.js"></script>
