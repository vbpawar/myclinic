<div id="followNew"></div>
<div class="modal fade" id="takeFeedback" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Take Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form  id="takeFeedbackForm" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                              <label for="feedback">Feedback</label>
                               <textarea name="feedback" id="feedbacknew" rows="2" class="form-control " required></textarea>
                        </div>
                      </div>
                </div>

                <div class="row">
                <div class="dt-responsive tbl col-md-12" >
                                <table id="followTable" class="table">
                                    <thead>
                                        <tr>
                                            <th >Id</th>
                                            <th>Followup</th>
                                            <th>Date</th>
                                            <th>AttendedBy</th>
                                        </tr>
                                    </thead>
                                    <tbody id="callFollData">
                                       
                                    </tbody>
                                </table>
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
<script src="jscode/addcallFeedback.js"></script>
