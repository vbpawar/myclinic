<style>
    .error {
        color: red;
    }

    .required:after {
        content: " *";
        color: red;
    }
</style>

<div class="modal fade full-window-modal" id="packageAssign" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
						  <form class="forms-sample" id="assignPackage" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="packageId">Select Package</label>
                                <select class="form-control select2" id="packageId" name="packageId" style="width: 100%;" onchange="packageDetails(this.value)">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="packageDuration">Package Duration</label>
                                <input type="text" id="packageDuration" name="packageDuration" class="form-control" placeholder="e.g-20">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-password">Package Status</label>
                                <div class="checkbox-fade fade-in-success check">
                                    <label>
                                        <input type="radio" value="1" name="isActive" id="isActivet">
                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                        <span>Active</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="0" name="isActive" id="isActivef">
                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-danger"></i>
                                                                            </span>
                                        <span>In active</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Package Title</label>
                                <strong id="package-title"></strong>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Package Details</label>
                                <strong id="package-details"></strong>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Package Cost</label>
                                <strong id="package-cost"></strong>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dt-responsive tbl">
                                <table id="testDetails" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>Quota</th>
                                        </tr>
                                    </thead>
                                    <tbody id="testData">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                        
                    </div>

            <div class="modal-footer">

                <input type="submit" class="btn btn-primary mr-2" value="Submit">
                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
            
        </div>
				</form>
    </div>
</div>
</div>
<script src="jscode/package-details.js"></script>
