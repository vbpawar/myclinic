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
   
    @media only screen and (max-width: 600px) {
        .check {
            margin-top: 8px;
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

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fullwindowModal">Lumbar Spine Assessment</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: aliceblue;">
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>Lumbar Spine Assessment</strong></h5>
                                  
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    
                                </div>
                               
                                <div class="modal-body">
                                <form id="lumbarSpineForm" method="POST" class="forms-sample" enctype="multipart/form-data">
                                    <div     class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>History</strong></h3>
                                                     
                                                    </div>
                                                    <div class="card-body">
                                                     
                                                            <div class="form-group row">
                                                                <label for="functionScore" class="col-sm-1 col-form-label">Functional Disability Score:</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" id="funDisabilityScore" name="funDisabilityScore" placeholder="100">
                                                                </div>


                                                                <label for="vasScore" class="col-sm-1 col-form-label">VAS Score:</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" id="vasScore" name="vasScore" placeholder="0-10">
                                                                </div>

                                                            </div>

                                                            <!-- <div class="form-group row">
                                                                <label for="exampleInputUsername2" class="col-sm-12 col-form-label"><center><b>History</b></center></label>
                                                            </div> -->
                                                            <div class="form-group row">
                                                                <label for="presentSymptoms" class="col-sm-1 col-form-label">Present Symptoms:</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" id="presentSymptoms"  name="presentSymptoms" placeholder="100">
                                                                </div>


                                                                <label for="presentSince" class="col-sm-1 col-form-label">Present Since:</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" id="presentSince" name="presentSince" placeholder="0-10">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success check"  id="presentSince" name="presentSince">
                                                                        <label>
                                                                            <input type="checkbox" value="Improving" name="presentSince">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Improving</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="Unchanging" name="presentSince">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Unchanging</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="Worsening"  name="presentSince">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Worsening</span>
                                                                        </label>
                                                                    </div>
                                                                    </div>

                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="commencedAsResult" class="col-sm-1 col-form-label">Commenced as a result of:</label>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control" id="commencedAsResult" name="commencedAsResult" placeholder="100">
                                                                </div>
                                                                <div class="col-sm-2 ">
                                                                <label>Or no apparent reason</label></div>


                                                                <label for="symptomsAtOnset" class="col-sm-1 col-form-label">Symptoms at onset:</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" id="symptomsAtOnset" name="symptomsAtOnset" placeholder="0-10">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success check"  >
                                                                        <label>
                                                                            <input type="checkbox" value="back" name="symptomsAtOnset">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>back</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="thigh" name="symptomsAtOnset">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>thigh</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="leg" name="symptomsAtOnset">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>leg</span>
                                                                        </label>
                                                                    </div>
                                                                    </div>

                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="constantSymptoms" class="col-sm-1 col-form-label">Constant Symptoms:</label>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control" id="constantSymptoms" name="constantSymptoms" placeholder="100">
                                                                </div>
                                                             
                                                                    <div class="col-sm-2">
                                                                        <div class="checkbox-fade fade-in-success check">
                                                                            <label>
                                                                                <input type="checkbox" value="back" name="constantSymptoms" >
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>back</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="thigh" name="constantSymptoms">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>thigh</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="leg" name="constantSymptoms">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>leg</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>


                                                                <label for="interSymptoms" class="col-sm-1 col-form-label">Intermittent Symptoms:</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" id="interSymptoms" name="interSymptoms" placeholder="0-10">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success check"  >
                                                                        <label>
                                                                            <input type="checkbox"  value="back" name="constantSymptoms">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>back</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="thigh" name="constantSymptoms">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>thigh</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="leg" name="constantSymptoms">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>leg</span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="aggravatingFactor" class="col-sm-1 col-form-label">aggravating factor:</label>
                                                                
                                                             
                                                                    <div class="col-sm-4">
                                                                        <div class="checkbox-fade fade-in-success">
                                                                            <label>
                                                                                <input type="checkbox" value="bending" name="aggravatingFactor">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>bending</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="sitting" name="aggravatingFactor">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>sitting/rising</span>
                                                                            </label>
                                                                            <label class="stand">
                                                                                <input type="checkbox" value="standing" name="aggravatingFactor">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>standing</span>
                                                                            </label>
                                                                            <label class="walk">
                                                                                <input type="checkbox" value="walking" name="aggravatingFactor">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>walking</span>
                                                                            </label>
                                                                                    <label>
                                                                                        <input type="checkbox" value="lying" name="aggravatingFactor">
                                                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                                                        <span>lying</span>
                                                                                    </label>
                                                                        </div>
                                                                    </div>


                                                            
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success">
                                                                        <label>
                                                                            <input type="checkbox" value="thedayprogresses" name="aggravatingFactor">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>am/ as the day progresses /pm</span>
                                                                        </label>
                                                                        <label class="a">
                                                                            <input type="checkbox" value="Whentill" name="aggravatingFactor">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span >When still/ on the move</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>

                                                               
                                                                    <!-- <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Other:</label> -->
                                                                    <span class="col-sm-1 ">Other</span>
                                                                    <div class="col-sm-3 ">
                                                                        <input type="text" class="form-control" id="aggravatingFactor" name="aggravatingFactor" placeholder="100">
                                                                    </div>
                                                           

                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="relivingFactor" class="col-sm-1 col-form-label">Reliving Factor:</label>
                                                                
                                                             
                                                                    <div class="col-sm-4">
                                                                        <div class="checkbox-fade fade-in-success" >
                                                                            <label>
                                                                                <input type="checkbox" value="bending" name="relivingFactor">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>bending</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="sitting" name="relivingFactor">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>sitting/rising</span>
                                                                            </label>
                                                                            <label class="stand">
                                                                                <input type="checkbox" value="standing" name="relivingFactor">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>standing</span>
                                                                            </label>
                                                                            <label class="walk">
                                                                                <input type="checkbox" value="walking" name="relivingFactor">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>walking</span>
                                                                            </label>
                                                                                    <label>
                                                                                        <input type="checkbox" value="lying" name="relivingFactor">
                                                                                        <span class="cr" >
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                                                        <span>lying</span>
                                                                                    </label>
                                                                        </div>
                                                                    </div>


                                                            
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success" >
                                                                        <label>
                                                                            <input type="checkbox" value="the day progresses" name="relivingFactor">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>am/ as the day progresses /pm</span>
                                                                        </label>
                                                                        <label class="a">
                                                                            <input type="checkbox" value="Whenstill" name="relivingFactor">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>When still/ on the move</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>

                                                               
                                                                    <!-- <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Other:</label> -->
                                                                    <span class="col-sm-1 ">Other</span>
                                                                    <div class="col-sm-3 ">
                                                                        <input type="text" class="form-control"id="relivingFactor" name="relivingFactor" placeholder="100">
                                                                    </div>
                                                           

                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="prevTreatments" class="col-sm-1 col-form-label">Previous Treatments:</label>
                                                                <div class="col-sm-4 ">
                                                                    <input type="text" class="form-control" id="prevTreatments" name="prevTreatments" placeholder="100">
                                                                </div>
                                                                <div class="col-sm-7 "></div>

                                                            </div>
                                                            <hr>
                                                            <h4>Specific Questions</h4>

                                                            <div class="form-group row">
                                                            <label for="interSymptoms" class="col-sm-1 col-form-label">Symptoms:</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="checkbox-fade fade-in-success" >
                                                                            <label>
                                                                                <input type="checkbox" value="Cough"  name="specSymptoms" >
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Cough</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="Sneeze"  name="specSymptoms">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Sneeze</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="Strain"  name="specSymptoms">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Strain</span>
                                                                            </label>
                                                                            <label  class="a">
                                                                                <input type="checkbox" value="+ve"  name="specSymptoms">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>+ve</span>
                                                                            </label >
                                                                                    <label class="b">
                                                                                        <input type="checkbox" value="-ve"  name="specSymptoms">
                                                                                        <span class="cr" >
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                                                        <span>-ve</span>
                                                                                    </label>
                                                                        </div>
                                                                    </div>


                                                                    <span class="col-sm-1 ">Bladder:</span>
                                                                <div class="col-sm-6"  >
                                                                    <div class="checkbox-fade fade-in-success" >
                                                                        <label>
                                                                            <input type="checkbox" value="Normal" name="bladder">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Normal</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="Abnormal" name="bladder">
                                                                            <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Abnormal</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        
                                                            <div class="form-group row">
                                                                <span for="medications" class="col-sm-1 col-form-label">Medications:</span>
                                                                
                                                             
                                                                    <div class="col-sm-4">
                                                                        <div class="checkbox-fade fade-in-success"  >
                                                                            <label>
                                                                                <input type="checkbox" value="Nil"  name="medications">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Nil</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="NSAIDS"  name="medications" >
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>NSAIDS</span>
                                                                            </label>
                                                                            <label >
                                                                                <input type="checkbox" value="Analg"  name="medications">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span >Analg</span>
                                                                            </label>
                                                                            <label class="a">
                                                                                <input type="checkbox" value="Steroids" name="medications">
                                                                                <span class="cr"> 
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Steroids</span>
                                                                            </label>
                                                                                    <label>
                                                                                        <input type="checkbox" value="Anticoag" name="medications">
                                                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                                                        <span >Anticoag</span>
                                                                                    </label>
                                                                        </div>
                                                                    </div>


                                                                                                                         
                                                                    <!-- <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Other:</label> -->
                                                                    <span class="col-sm-1 mb-13">Other</span>
                                                                    <div class="col-sm-6 ">
                                                                        <input type="text" class="form-control" id="medications" name="medications" placeholder="Good">
                                                                    </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="GeneralHealth" class="col-sm-1 col-form-label">General Health:</label>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control" id="GeneralHealth" placeholder="100">
                                                                </div>
                                                             
                                                                    <div class="col-sm-2">
                                                                        <div class="checkbox-fade fade-in-success check" >
                                                                            <label>
                                                                                <input type="checkbox" value="Good" name="GeneralHealth">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Good</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="Fair" name="GeneralHealth">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Fair</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="Poor" name="GeneralHealth">
                                                                                <span class="cr"  >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Poor</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>


                                                                <label for="imaging" class="col-sm-1 col-form-label">Imaging:</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" id="imaging" name="imaging" placeholder="0-10">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success check" >
                                                                        <label>
                                                                            <input type="checkbox" value="Yes" name="imaging">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Yes</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="No" name="imaging"s >
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>No</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="recentsurgery" class="col-sm-1 col-form-label">Recent or major surgery:</label>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control" id="recentsurgery" name="recentsurgery" placeholder="No">
                                                                </div>
                                                             
                                                                    <div class="col-sm-2">
                                                                        <div class="checkbox-fade fade-in-success check"  >
                                                                            <label>
                                                                                <input type="checkbox" value="Yes"  name="recentsurgery">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Yes</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="No"  name="recentsurgery">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>No</span>
                                                                            </label>
                                                                           
                                                                        </div>
                                                                    </div>


                                                                <label for="nightPain" class="col-sm-1 col-form-label">Night Pain:</label>
                                                                <div class="col-sm-1">
                                                                    <input type="text" class="form-control" id="nightPain" name="nightPain" placeholder="No">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="checkbox-fade fade-in-success check" >
                                                                        <label>
                                                                            <input type="checkbox" value="Yes" name="nightPain">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Yes</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="No" name="nightPain">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>No</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="accidents" class="col-sm-1 col-form-label">Accidents:</label>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control" id="accidents" name="accidents" placeholder="No">
                                                                </div>
                                                             
                                                                    <div class="col-sm-2">
                                                                        <div class="checkbox-fade fade-in-success check" >
                                                                            <label>
                                                                                <input type="checkbox" value="Yes" name="accidents">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Yes</span>
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="No"  name="accidents">
                                                                                <span class="cr" >
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>No</span>
                                                                            </label>
                                                                           
                                                                        </div>
                                                                    </div>


                                                                <label for="weightLoss" class="col-sm-1 col-form-label">Unexplained weight loss:</label>
                                                                <div class="col-sm-1">
                                                                    <input type="text" class="form-control" id="weightLoss" name="weightLoss" placeholder="No">
                                                                </div>
                                                                <div class="col-sm-2 c">
                                                                    <div class="checkbox-fade fade-in-success">
                                                                        <label>
                                                                            <input type="checkbox" value="Yes" name="weightLoss">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Yes</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="No" name="weightLoss">
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>No</span>
                                                                        </label>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <span class="d">Other</span>
                                                                <div class="col-sm-2 ">
                                                                    <input type="text" class="form-control"  id="weightLoss" name="weightLoss" placeholder="Yes">
                                                                </div>

                                                            </div>

                                                            <hr>
                                                            <h4>Examination</h4>
                                                            <span><b>POSTURE:</b></span>
                                                            <div class="form-group row">
                                                          
                                                            <span class="col-sm-1">Siting:</span>
                                                           
                                                          
                                                            <div class="col-sm-3">
                                                                <div class="checkbox-fade fade-in-success" >
                                                                    <label>
                                                                        <input type="checkbox" value="Good" name="sitting">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Good</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="Fair"  name="sitting">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Fair</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="poor"  name="sitting">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Poor</span>
                                                                    </label>
                                                                   
                                                                </div>
                                                            </div> 

                                                            <span class="col-sm-1">Lordosis:</span>
                                                           
                                                          
                                                            <div class="col-sm-3">
                                                                <div class="checkbox-fade fade-in-success"  >
                                                                    <label>
                                                                        <input type="checkbox" value="Red"  name="lordosis">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Red</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="Acc"  name="lordosis">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Acc</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="Normal"  name="lordosis">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Normal</span>
                                                                    </label>
                                                                   
                                                                </div>
                                                            </div>

                                                            <span class="col-sm-1">Lateral Shift:</span>
                                                           
                                                          
                                                            <div class="col-sm-3">
                                                                <div class="checkbox-fade fade-in-success" >
                                                                    <label>
                                                                        <input type="checkbox" value="Right"  name="lateralshift">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Right</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="Left"  name="lateralshift">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Left</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" value="Nil"  name="lateralshift">
                                                                        <span class="cr" >
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>Nil </span>
                                                                    </label>
                                                                   
                                                                </div>
                                                            </div>
                                                            </div>

                                                         <span><b>NEUROLOGICAL:</b></span>
                                                        <div class="form-group row">
                                                            <label for="motorDeficit" class="col-sm-1 col-form-label">Motor Deficit:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control" id="motorDeficit" name="motorDeficit                                                                            " placeholder="0-10">
                                                            </div>
                                                            <label for="sensoryDeficit" class="col-sm-1 col-form-label">Senscry Deficit:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control" id="sensoryDeficit" name="sensoryDeficit" placeholder="0-10">
                                                            </div>
                                                         </div>


                                                         <span><b>MOVEMENT LOSS:</b></span>
                                                         <div class="form-group row">
                                                            <table class="table table-bordered" id="momentLoss">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">Maj</th>
                                                                    <th scope="col">Mod</th>
                                                                    <th scope="col">Min</th>
                                                                    <th scope="col">Nil</th>
                                                                    <th scope="col">Pain</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    <th scope="row">Flexion</th>
                                                                    <td><input type="text" class="form-control" id="maj" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="mod" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="min" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="nil" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="pain" placeholder=""></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Extension</th>
                                                                    <td><input type="text" class="form-control" id="maj" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="mod" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="min" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="nil" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="pain" placeholder=""></td>
                                                                  </tr>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Side Gliding R</th>
                                                                    <td><input type="text" class="form-control" id="maj" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="mod" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="min" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="nil" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="pain" placeholder=""></td>
                                                                  </tr>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Side Gliding L</th>
                                                                    <td><input type="text" class="form-control" id="maj" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="mod" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="min" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="nil" placeholder=""></td>
                                                                    <td><input type="text" class="form-control" id="pain" placeholder=""></td>
                                                                  </tr>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                              </div>

                                                              <span><b> TEST MOVEMENT:</b></span>
                                                              <div class="form-group row">
                                                                 <table class="table table-bordered" id="testMovement">
                                                                     <thead>
                                                                       <tr>
                                                                         <th scope="col"></th>
                                                                         <th scope="col">Symptoms During Testing</th>
                                                                         <th scope="col">Symptoms After Testing</th>
                                                                        <!-- <th scope="colgroup" colspan="3">/th> -->
                                                                         <th scope="colgroup" colspan="3">Mechanical Response
                                                                         <thead > 
                                                                             <th></th> <th></th> <th></th>
                                                                         <th>
                                                                             <div colspan="3"><i class="ik ik-arrow-up"></i>Rom</div> 
                                                                         </th>  
                                                                         <th> <i class="ik ik-arrow-up"></i>Rom</th>
                                                                         <th>No Effect</th></th>
                                                                         </thead>
                                                                       
                                                                       </tr>
                                                                     </thead>
                                                                     <tbody>
                                                                       <tr>
                                                                         <th scope="row">Rep EIL</th>
                                                                         <td><input type="text" class="form-control" id="testMovement" name="testMovement" placeholder=""></td>
                                                                         <td><input type="text" class="form-control" id="testMovement" placeholder=""></td>
                                                                         <td><input type="text" class="form-control" id="testMovement" placeholder=""></td>
                                                                         <td><input type="text" class="form-control" id="testMovement" placeholder=""></td>
                                                                         <td><input type="text" class="form-control" id="testMovement" placeholder=""></td>
                                                                            </tr> 
                                                                           
                                                                     </tbody>
                                                                   </table>

                                                                 
                                                                 </div>

                                                                 <span><b>PROVISIONAL CLASSIFICATION:</b></span>
                                                                 <div class="form-group row">
                                                                    <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success" >
                                                                        <label>
                                                                            <input type="checkbox" value="Derangement"  name="derangement" >
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Derangement</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="checkbox" value="Dysfunction"  name="derangement"  >
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Dysfunction</span>
                                                                        </label>
                                                                        <label class="a">
                                                                            <input type="checkbox" value="Posture" name="derangement" >
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                                            <span>Posture</span>
                                                                        </label>
                                                                    </div>
                                                                    </div>
                                                                        <span class="col-sm-1 ">Other:</span>
                                                                        <div class="col-sm-3 ">
                                                                        <input type="text" class="form-control" id="derangement" name="derangement" placeholder="100">
                                                                        </div>
                                                                       <label for="other" class="col-sm-2 col-form-label">Derangement:  Pain Location</label>
                                                                        <div class="col-sm-3">
                                                                            <input type="text" class="form-control" id="derangement1" name="derangement1" placeholder="0-10">
                                                                        </div>
                                                                </div>

                                                                <span><b>PRINCIPLE CLASSIFICATION:</b></span>
                                                                <div class="form-group row">
                                                                    <label for="mechTherapy" class="col-sm-2   col-form-label">Mechanical Therappy: </label>
                                                                    <div class="col-sm-2 ">
                                                                        <input type="text" class="form-control" id="mechTherapy" placeholder="No">
                                                                    </div>
                                                                 
                                                                        <div class="col-sm-2 c">
                                                                            <div class="checkbox-fade fade-in-success" >
                                                                                <label>
                                                                                    <input type="checkbox" value="Yes" name="mechTherapy" >
                                                                                    <span class="cr" >
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Yes</span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="checkbox" value="No" name="mechTherapy" >
                                                                                    <span class="cr" >
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>No</span>
                                                                                </label>
                                                                               
                                                                            </div>
                                                                        </div>
                                                               </div>

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
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
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.min.js"></script>
    <!-- <script src="jscode/apis.js"></script> -->
        <script src="js/jquery.validate.js"></script>
        <?php include 'add_lumbarSpine.php';?>
        <script src="jscode/lumbarSpine_validation.js"></script>

                <script src="jscode/lumbarSpine.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
   
</body>

</html>