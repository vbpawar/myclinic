<div class="modal fade" id="appointment" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Take Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form  id="take-appointment" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Doctor Name</label>
                                <select class="form-control" id="doctorid" name="doctorid" style="width: 100%">
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Consulting Date</label>
                                <div class="input-group input-group-primary">
                                <input type="text"  class="form-control" name="apdate" id="apdate" required autocomplete="off">
                                       <!-- <input type='text' class="form-control" id='follwupdate' name="foDate1" autocomplete="off"/> -->
                                       <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-calendar"></i></label></span>
                                       </div>
                               
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button class="btn btn-light" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="jscode/call-center-appointment.js"></script>