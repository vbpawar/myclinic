
    <div class="row">
        <div class="col-md-3 col-6"> <strong>Package Name</strong>
            <br>
            <p class="text-muted" id="pNamee"></p>
        </div>
        <div class="col-md-3 col-6"> <strong>Package Cost</strong>
            <br>
            <p class="text-muted" id="pCoste"></p>
        </div>
        <div class="col-md-3 col-6"> <strong>Purchase date</strong>
            <br>
            <p class="text-muted" id="purchaseDatee"></p>
        </div>
        <div class="col-md-3 col-6">
            <br>
           <button class="btn btn-warning" type="button" onclick="fromBack()">Back</button>
        </div>
    </div>
    <hr>
    <div class="dt-responsive tbl">
        <table class="table table-bordered" id="packageTest">
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Frequency</th>
                    <th>Remaining</th>
                    <th>Consumed</th>
                    <th>Last used</th>
                    <th>Consume</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody id="packageTestData">

            </tbody>
        </table>
    </div>
    <hr>
    <center><strong><h3>Transactions</h3></strong></center>
    <div class="dt-responsive tbl">
        <table class="table table-bordered" id="exchangeT">
            <thead>
                <tr>
                    <th>Test</th>
                    <th>Transaction Type(C-credit,D-Debit)</th>
                    <th>Marked by</th>
                    <th>Transaction Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="exchangeData">

            </tbody>
        </table>
    </div>
<?php include 'credit-quota.php';?>
<script src="jscode/consumption.js"></script>