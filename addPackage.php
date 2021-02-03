<style>
    .error {
        color: red;
    }
</style>
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="demoModalLabel"><u>Package details</u></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="packageForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="packageTitle">Package Title</label>
                                <input type="text" id="packageTitle" name="packageTitle" class="form-control" placeholder="Title">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="packageCost">Cost</label>
                                <input type="text" id="packageCost" name="packageCost" class="form-control" placeholder="Cost">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="packageDetails">Package Details</label>
                                <textarea name="packageDetails" id="packageDetails" cols="3" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-2 c">
                                    <div class="checkbox-fade fade-in-success">
                                        <label>
                                            <input type="radio" value="1" name="isActive">
                                            <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                            <span>Active</span>
                                        </label>
                                        <label>
                                            <input type="radio" value="0" name="isActive">
                                            <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-warning"></i>
                                                                                    </span>
                                            <span>InActive</span>
                                        </label>

                                    </div>
                                </div>
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
<script src="jscode/package-validation.js"></script>
<script src="jscode/addPackage.js"></script>