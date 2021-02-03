<style>
    .error {
        color: red;
    }
</style>
 <button class="btn btn-primary" type="button" onclick="goback()" style="float: right;">Back</button>
<div class="container-fluid">
   
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Update Details</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-6"> <strong>Discount Title</strong>
                                    <br>
                                    <p class="text-muted" id="pName"></p>
                                </div>
                                <div class="col-md-3 col-6"> <strong>Branch</strong>
                                    <br>
                                    <p class="text-muted" id="pCost"></p>
                                </div>
                            </div>
                            <hr>
                            <form id="addPackageDetails">
                            <div class="row">
                                <div class="col-md-6 col-6"> <strong>Select Discount</strong>
                                    <br>
                                 <select name="discountType" id="discountType" class="form-control" style="width: 100%;"></select>
                                </div>
                                <div class="col-md-3 col-6">
                                    <br>
                                   <button class="btn btn-success" type="button" onclick="addTest()">Map discount</button>
                                </div>
                                
                            </div>
                        </form>
                        <hr>
                            <div class="dt-responsive tbl">
                                <table class="table table-bordered" id="packageTest">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Discount Type</th>
                                            <th>Discount(%)</th>
                                            <th class="nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="packageTestData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal" id="updatePackage">
                                <div class="form-group">
                                    <label for="example-name">Discount Title</label>
                                    <input type="text" class="form-control" name="disTitle" id="disTitle">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Branch</label>
                                   <select name="branch" id="branch" class="form-control" style="width: 100%;"></select>
                                </div>
                                <button class="btn btn-success" type="submit">Update Details</button>
                            </form>
                        </div>
                      
                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="jscode/load-discount-details.js"></script>
<script src="jscode/updateDiscount.js"></script>