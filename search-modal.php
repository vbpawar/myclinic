
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Search Old Calls</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control" id="semobile">
                    </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 27px;">
                    <div class="form-group">
                        <button type="button" class="btn btn-success" onclick="searchOldCalls()">Seacrh</button>
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="col-md-12">
                  
                <div class="card-body">
                  
                    <div class="tbl">
                        <table id="sTable" class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>Appointment Date</th>
                                    <th>Follow up Need</th>
                                    <th>Follow up date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="sData">

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>