<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    .error{
        color:red;
    }

  .table thead th {

    font-weight: 600;
    color: #2c2f31;
    font-size: 14px;

}


   
   @media only screen and (max-width: 600px) {
     .tbl {
       overflow-x:auto;
     }
   }
  
</style>
<body>
  
    <div class="wrapper">
    

        <div class="page-wrap">
          
            <div class="main-content">
                <div class="container-fluid">
                   
                 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Modals</h3>
                                </div>
                                <div class="card-body template-demo">
                                
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#fullwindowModal">OPD Payment Master</button>
                                </div>
                            </div>
                         
                        </div>
                    </div>

                    

                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
                        aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" > 
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>All Payment Details</strong></h5> 
                                    <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true" >&times;</span></button>
                                </div>
                                <div class="modal-body">

        <form id="presentillnessform" method="POST">
                                    <div class="container-fluid">
                                      
                                      <div class="row">
                                        
                                                <div class="col-md-12">
                                                <div class="card">
                                                    <!-- <div class="card-header">  Details                             
                                                      
                                            
                                                    </div> -->
                                                    <div class="card-body">
                                            <div class="col-md-12">

                                                <div class="row">                                                        
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label for="patientId"><b>Patient Id :</b></label>
                                                                   <label for="patientId" name="patientId" id="patientId">1</label>
                                                                </div>
                                                            </div>

                                                             <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for=""><b>Name:</b></label>
                                                                   <label name="fname" id="fname">Tanaya</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for=""><b>Mobile :</b></label>
                                                                   <label name="mobile">9069599499</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for=""><b>Email :</b></label>
                                                                   <label name="email">gsggj@gmail.com</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for=""><b>City :</b></label>
                                                                   <label name="city">Nashik</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for=""><b>Address :</b></label>
                                                                   <label name="city">Nashik</label>
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
                                             
                                    <div class="card-body">
                                 <div class="col-md-12 tbl">
                                    <div class="form-group">
                                               
                                  <table id="data_table" class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th><b>Payment Id</b></td>
                                                    <th><b>Patient Id</b></th>
                                                    <th><b>Doctor Id</b></th>
                                                    <th><b>Bill</b></th>
                                                    <th><b>Orignal Amount</b></th>
                                                    <th><b>Payable Amount</b></th>
                                                    <th><b>Discount</b></th>
                                                    <th><b>Received Amount</b></th>
                                                    <th><b>Pending Amount</b> </th>
                                                    <th><b>Date</b> </th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>
                                                  <tr>
                                                   <td>2</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>
                                                  <tr>
                                                    <td>3</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>
                                                  <tr>
                                                     <td>4</td>
                                                    <td>4</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>
                                                  <tr>
                                                     <td>5</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>
                                                  <tr>
                                                     <td>6</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr> 
                                                  <tr>
                                                     <td>7</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>3000</td>
                                                    <td>3000</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>500</td>
                                                    <td>2500</td>
                                                    <td>1/12/2020</td>
                                                </tr>                                                                                                                                      
                                            </tbody>
                                        </table>
                                                    </div>
                                                </div>

                                                   <hr style="border-width: 5px ; border-top: 1px solid rgba(36, 26, 29, 0.87);">
                                            <div class="form-group row">
                                                <label for="billdetails" class="col-sm-2 col-form-label"><b>Bill Details :</b></label>
                                                <div class="col-sm-8 ">
                                                   
                                               
                                                    <textarea class="form-control" id="billdetails" placeholder="Cobalt : 2000.0" name="billamount"></textarea>
                                                </div>
                                            </div>
                                              
                                            </div>
                                            </div>
                                      </div>


                                      <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;"                               >
                                             
                                                    </div>
                                                    <div class="card-body" style="background-color: aliceblue;">
                                            <div class="col-md-12">
                                    <div class="form-group">

                                                 <div class=" row">
                                                 <div class="form-group col-md-4">
                                                                    <label for="receiptId"><b>Receipt Id :</b></label>
                                                                   <label for="receiptId" name="receiptId" id="receiptId">1</label>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="received"><b>Received :</b></label>
                                                                   <label for="received" name="received" id="received">2000</label>
                                                                </div>
                                                </div>
            
                                               
                                            </div>

                                              <div class="form-group row">
                                                <label for="billamount" class="col-sm-3 col-form-label"><b>Bill Amount :</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="billamount" placeholder="2000.0" name="billamount">
                                                  
                                                </div>
                                            </div>

                                                  <div class="form-group row">
                                                <label for="discount" class="col-sm-3 col-form-label"><b>Discount :</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="discount" placeholder="100.0" name="billamount">
                                                    
                                                </div>
                                            </div>    

                                               <div class="form-group row">
                                                <label for="pendingAmt" class="col-sm-3 col-form-label"><b>Pending Amount:</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="discount" placeholder="100.0" name="billamount">
                                                  
                                                </div>
                                            </div>   

                                            <hr style="border-width: 5px ; border-top: 1px solid rgba(36, 26, 29, 0.87);">


                                               <div class="form-group row">
                                                <label for="paymentMode" class="col-sm-3 col-form-label"><b>Payment Mode :</b></label>
                                                <div class="col-sm-7">
                                                     
                                                        <select class="form-control" id="paymentMode">
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


                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-3 col-form-label"><b>Payment Details:</b> </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="amount" placeholder="100.0" name="amount">
                                                    <!-- <h6><b>201</b></h6> -->
                                                </div>
                                                   </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-3 col-form-label"><b>Amount:</b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="amount" placeholder="100.0" name="amount">
                                                  
                                                </div>
                                            </div>

                                         

                                             <div class="form-group row">
                                     
                                                <div class="checkbox-fade fade-in-success col">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                            </span>
                                                            <span>Use Today's Date</span>
                                                        </label>
                                                    </div>
                                            
                                                </div>

                                        <div class="form-group row">
                                            <div class="col-md-2"> </div>
                                                 <div class="col-md-4 template-demo"> 
                                          
                                                 <button type="button" class="btn btn-primary"><i class="ik ik-pocket"></i>Make Payment</button>

                                                 </div> 
                                                 <div class="col-md-4 template-demo"> 
                                                     
                                                      <button type="button" class="btn btn-primary"><i class="ik ik-printer"></i>Print</button>

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
                        </form>
                    </div>
                </div>
              
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="dist/js/theme.min.js"></script>

        <script src="js/jquery.validate.js"></script>
        <script src="jscode/presentillness_validation.js"></script>
        <script src="jscode/presentillness.js"></script>
                    <!-- <script src="jscode/addPatient.js"></script> -->
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- <script>
              $('#b1').on('click',function(e){
                //   console.log('in');
                var j = $('#presentillnessform').valid();
                if(j){
                    console.log('success');
                }else{
                    console.log('error');
                }
              });


            function preillness(){
                // var obj = {
                //     cheifcomplaint : document.getElementById('cheifcomplaint').value,
                //     history : document.getElementById('history').value,
                //     bp : document.getElementById('bp').value,
                //     waist : document.getElementById('waist').value,
                //     pules : document.getElementById('pules').value,
                //     hip : document.getElementById('hip').value,
                //     spo2 : document.getElementById('spo2').value,
                //     hb1c : document.getElementById('hb1c').value,
                //     temp : document.getElementById('temp').value,
                //     fbs : document.getElementById('fbs').value,
                //     weight : document.getElementById('weight').value,
                //     ppbs : document.getElementById('ppbs').value,

                //     height : document.getElementById('height').value,
                //     gfr : document.getElementById('gfr').value,
                //     bmi : document.getElementById('bmi').value,
                //     goalwt : document.getElementById('goalwt').value,
                //     waisthip : document.getElementById('waisthip').value,
                //     chest : document.getElementById('chest').value,
                //     addedSound : document.getElementById('addedSound').value,
                //     wheezeRhonchi : document.getElementById('wheezeRhonchi').value,
                //     dyspnoea : document.getElementById('dyspnoea').value,
                //     conciousness : document.getElementById('conciousness').value,

                //     umnreflex : document.getElementById('umnreflex').value,
                //     lmnreflex : document.getElementById('lmnreflex').value,
                //     reflexes : document.getElementById('reflexes').value,
                //     s1s2heard : document.getElementById('s1s2heard').value,
                //     murmur : document.getElementById('murmur').value,

                //     oralMucosa : document.getElementById('oralMucosa').value,
                //     scalp : document.getElementById('scalp').value,
                //     nodules : document.getElementById('nodules').value,
                //     eyes : document.getElementById('eyes').value,

                //     raynaud : document.getElementById('raynaud').value,
                //     telangiectasia : document.getElementById('telangiectasia').value,
                //     photosensivity : document.getElementById('photosensivity').value,
                //     rash : document.getElementById('rash').value,
                //     site : document.getElementById('site').value,
                //     type : document.getElementById('type').value,
                //     itching : document.getElementById('itching').value,

                // };
                console.log(obj);
                alert("File Added Successfully...!")
               $.ajax({
        // url: 'stud.php',
        type: 'POST',
        data:obj,
        beforeSend:function(){
        alert('ok');
        },
        success: function(response) {
            alert(response);
           var a =  JSON.parse(response);
           alert(a.code);
            $('#presentillnessform').trigger('reset');
        },
        complete:function(){
            alert('hello');
        }
    });
            }


             
        </script> -->
</body>

</html>