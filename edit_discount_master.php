<style>
    .error {
        color: red;
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
              
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                        <form class="forms-sample" id="discountMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="discountType" class="required">Discount Type</label>
                                <input id="discountTypee" class="form-control" type="text" name="discountType" />
                            </div>
                        </div>
                       
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discount">Discount(%)</label>
                                <input id="discount" class="form-control" type="text" name="discount" placeholder="Fees Type" />
                            </div>
                        </div>
                        <div class="col-md-4"></div>

                    </div>
                   
                                <button class="btn btn-success" type="submit">Update</button>
                                <button class="btn btn-success" type="button" onclick="gobackDiscount()">Cancel</button>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="jscode/edit_discountMaster.js"></script>
<script src="jscode/updateDiscountMaster.js"></script>
