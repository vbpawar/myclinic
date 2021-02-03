<div class="modal fade full-window-modal" id="opd-payment-generate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel"><strong>Generate Payment</strong></h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            <div class="container-fluid" >
<div class="row">
<div class="card">
<div class="card-body" style="background: aliceblue;">
<div class="form-group" style="text-align: center;">
                                  
                                  <select class="form-control select2"  id="paymentFor" style="width:100%;">
                                      
                                  </select>
                              </div>
</div>
</div>
</div>
<div class="row">
    <div class="col-sm-12" style="margin-top: 50px;">                       
        <div class="card">
          
            <div class="card-body" style="background: aliceblue;">
                <div class="dt-responsive">
                    <div class="row">
                        <div class="col-sm-6">                                                 
                    <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap" id="tPayment">
                        <thead>
                        <tr>
                            <th>Bill Id</th>
                            <th>Doctor</th>
                            <th>Bill Particular</th>
                            <th>Total</th>
                            <th>Pending</th>                                                    
                        </tr>
                        </thead>
                        <tbody id="tbPayment">
                                                                 
                        <tr>
                            <td>Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>                                                   
                        </tr>
                        <tr>
                            <td>Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>2012/09/26</td>                                                  
                        </tr>
                    </tbody>
                        <tfoot>
                        <tr>
                            <th>Bill Id</th>
                            <th>Doctor</th>
                            <th>Bill Particular</th>
                            <th>Total</th>
                            <th>Pending</th>                                                 
                        </tr>
                        </tfoot>
                    </table>                                              
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-2"> 
                        <h6><strong>For:</strong></h6>
                    </div> 
                    <div class="col-sm-4"> 
                        <h6><strong>DR. RITUPARNA SHINDE</strong></h6>
                    </div> 
                    <div class="col-sm-6"></div>
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-6"> 
                            <label for="total"><strong>Total :</strong></label>
                        </div> 
                        <div class="col-sm-4"> 
                            <label for="received"><strong>Received :</strong></label>
                        </div> 

                        <div class="col-sm-2"></div>
                        
                    </div>

                        <div class="row">
                               <!-- <div class="col-sm-3"></div> -->
                            <div class="col-sm-10"> 
                                <div class="form-group" style="text-align: center;">
                                  
                                    <select class="form-control select2"  id="test" style="width:100%;">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2"> 
                                <div class="form-group" style="text-align: center;">
                                <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="addrow()"><i class="ik ik-plus"></i></button>
                                   
                                </div>
                            </div>
                                     
                        </div>

                    <table id="presTable"
                           class="table table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Fees Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="presTableBody">
                                                                    
                    </tbody>
                </table>
                   
                <div class="row">
                    <div class="col-sm-4">
                        <label for=""><strong>Discount</strong></label> 
                        <input type="text" placeholder=""
                        class="form-control" name="discountAmount"
                        id="discountAmount">
                </div> 
                <div class="col-sm-4 mt-15"> 
                    <label for="total"><strong>Total:</strong></label>
                </div> 
                <div class="col-sm-4"></div>
                </div>
                <div class="row ">
                    <div class="col-sm-4 form-group">
                        <label for=""><strong>Discount %</strong></label> 
                        <input type="text" placeholder=""
                        class="form-control" name="discountPer"
                        id="discountPer">
                </div> 
                <div class="col-sm-8 template-demo">
                  
                        <button type="button" class="btn btn-primary "
                            data-dismiss="modal"><i class="ik ik-pocket"></i>Make Payment</button>
                        <button type="button" class="btn btn-primary"><i class="ik ik-pocket"></i>Accept Payment</button>
                    
                </div>
               
            </div>
               
            </div>
            </div>
                </div>
            </div>
        </div>
       
    </div>
</div>

</div>

            </div>

        </div>

    </div>

</div>