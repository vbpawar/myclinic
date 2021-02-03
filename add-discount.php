<style>
    .error {
        color: red;
    }
</style>
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="demoModalLabel"><u>Add details</u></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="packageForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="packageTitle">Discount Title</label>
                                <input type="text" id="discountTitle" name="discountTitle" class="form-control" placeholder="Title">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="branchId">Branch</label>
                              <select name="branchId" id="branchId" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <input type="submit" class="btn btn-primary mr-2" value="Submit">
                        <button class="btn btn-light" id="cButton" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="jscode/addDiscount.js"></script>