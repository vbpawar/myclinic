<style>
    .error{
        color:red;
    }
  .required:after {
    content:" *";
    color: red;
  }
</style>
<div class="modal fade" id="branchModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel"><strong><u>Branch details:</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="branchMasterForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branchName" class="required">Branch Name</label>
                                <input type="text" id="branchName" name="branchName" class="form-control" placeholder="Branch Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class="form-control" placeholder="latitude">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="longitude">Longitude </label>
                                <input type="text" id="longitude" name="longitude" class="form-control" placeholder="longitude">

                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latitude">Map Url</label>
                                <input type="text" id="mapURL" name="mapURL" class="form-control" placeholder="Url">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile1">Primary Mobile Number </label>
                                <input id="mobile1" class="form-control" type="text" name="mobile1" placeholder="mobile" ng-pattern="/^[0-9]*$/"
                              onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile2">Secondary Mobile Number </label>
                                <input id="mobile2" class="form-control" type="text" name="mobile2" placeholder="mobile" ng-pattern="/^[0-9]*$/"
                              onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country" class="required">Country</label>

                                <select class="form-control select2" id="country" name="country" style="width: 100%;" onchange="loadStates(this.value);" placeholder="country">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state" class="required">State</label>
                                <select class="form-control select2" id="state" name="state" placeholder="state"  style="width: 100%;"  onchange="loadCities(this.value);">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city" class="required">City</label>
                                <select class="form-control select2" id="city" name="city"  style="width: 100%;"  placeholder="city"></select>

                            </div>
                        </div>

                    </div>

                    <div class="row">

                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="franchiseid"  class="required">Franchise</label>
                                <select class="form-control select2" id="franchiseid" name="franchiseid"  style="width: 100%;"></select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="branchAddress"  class="required">Address</label>
                                <textarea class="form-control" id="branchAddress"  name="branchAddress" rows="1"></textarea>
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

<script src="jscode/insert_branchMaster.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/branchMaster_validation.js"></script>
