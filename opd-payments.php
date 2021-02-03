
<Style>
   
   @media only screen and (max-width: 600px) {
     .tbl {
       overflow-x:auto;
     }
   }
   </Style>

<div class="modal fade full-window-modal" id="opd-payment" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel"><strong>All Payment Details</strong></h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

               
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card" style="margin-bottom: 11px;">
                               
                                    <div class="card-body" style="background-color: aliceblue;padding-bottom: 0px;">
                                        <div class="col-md-12 tbl">

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label><b>Patient Id :</b></label>
                                                        <span  id="pid"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for=""><b>Name:</b></label>
                                                        <span id="pname"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for=""><b>Mobile :</b></label>
                                                        <span id="pmobile"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for=""><b>Email :</b></label>
                                                        <span id="pemail"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for=""><b>City :</b></label>
                                                        <span id="pcity"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for=""><b>Address :</b></label>
                                                        <span id="paddress"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-8">
                                <div class="card">

                                    <div class="card-body" >
                                        <div class="col-md-12 tbl">

                                            <table id="opdPayment" class="table">
                                                <thead style="background-color: aliceblue; color: darkblack" >
                                                    <tr>
                                                        <th><b>Reciept Id</b></td>
                                                        <th>Type</th>
                                                            <th><b>Doctor</b></th>
                                                            <th><b>Orignal Amount</b></th>
                                                            <th><b>Payable Amount</b></th>
                                                            <th><b>Discount</b></th>
                                                            <th><b>Received Amount</b></th>
                                                            <th><b>Pending Amount</b> </th>
                                                            <th><b>Date</b> </th>
                                                            <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="opdPaymentData">
                                                </tbody>
                                            </table>

                                        </div>

                                        <!-- <hr style="border-width: 5px ; border-top: 1px solid rgba(36, 26, 29, 0.87);">
                                        <div class="form-group row">
                                            <label for="billdetails" class="col-sm-2 col-form-label"><b>Bill Details :</b></label>
                                            <div class="col-sm-8 ">

                                                <textarea class="form-control" id="billdetails" placeholder="Cobalt : 2000.0" name="billamount"></textarea>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header" style="background-color: aliceblue;">

                                    </div>
                                    <form id="makePayment">
                                    <div class="card-body" style="background-color: aliceblue;">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <div class=" row">
                                                    <div class="form-group col-md-4">
                                                        <label for="receiptId"><b>Receipt Id :</b></label>
                                                        <label for="receiptId" name="receiptId" id="receiptId"></label>
                                                    </div>

                                                    <div class="form-group col-md-4"><h6>
                                                        <label for="received"><b>Received :</b></label></h6>
                                                       
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <strong name="received" id="received"></strong>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="billamount" class="col-sm-3 col-form-label"><b>Bill Amount :</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="billamount" placeholder="" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="discount" class="col-sm-3 col-form-label"><b>Discount :</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="discount" placeholder="" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="pendingAmt" class="col-sm-3 col-form-label"><b>Pending Amount:</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="pendingAmt" placeholder="" readonly>

                                                </div>
                                               
                                            </div>

                                            <hr style="border-width: 5px ; border-top: 1px solid rgba(36, 26, 29, 0.87);">

                                            <div class="form-group row">
                                                <label for="paymentMode" class="col-sm-3 col-form-label"><b>Payment Mode :</b></label>
                                                <div class="col-sm-7">

                                                    <select class="form-control" id="paymentMode" onchange="checkPaymentMode(this.value)">
                                                        <option>Cash</option>
                                                        <option>Cheque</option>
                                                        <option>Card</option>
                                                        <option>PayTM</option>
                                                        <option>PhonePay</option>
                                                        <option>RTGS</option>
                                                        <option>IMPS</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row" style="display: none;" id="paymentD">
                                                <label for="paymentDetails" class="col-sm-3 col-form-label"><b>Payment Details:</b> </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="paymentDetails">
                                                    <!-- <h6><b>201</b></h6> -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-3 col-form-label"><b>Amount:</b></label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" id="amount" oninput="check(this);" placeholder="">

                                                </div>
                                                <div class="errorMsg"></div>
                                            </div>

                                            <!-- <div class="form-group row">

                                                <div class="checkbox-fade fade-in-success col">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                        <span>Use Today's Date</span>
                                                    </label>
                                                </div>

                                            </div> -->

                                            <div class="form-group row">
                                                <div class="col-md-2"> </div>
                                                <div class="col-md-4 template-demo">

                                                    <button type="button" class="btn btn-primary" onclick="recievePayment()"><i class="ik ik-pocket"></i>Make Payment</button>

                                                </div>
                                                <!-- <div class="col-md-4 template-demo">

                                                    <button type="button" class="btn btn-primary" onclick="printReciept()" style="display: none;" id="prButton"><i class="ik ik-printer"></i>Print</button>

                                                </div> -->
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>

            </div>

        </div>

    </div>

</div>