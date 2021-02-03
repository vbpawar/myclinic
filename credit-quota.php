<div class="modal fade" id="creditQuota" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Credit Quota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form  id="creditQuotaForm" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                              <label for="feedback">Quota increase</label>
                               <input type="number" name="typeCount" id="typeCount" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                              <label for="feedback">Remark</label>
                               <textarea name="quotaRemark" id="quotaRemark" rows="2" class="form-control " required></textarea>
                        </div>
                      </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Credit</button>
                        <button class="btn btn-light" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
<script src="jscode/credit-quota.js"></script>
