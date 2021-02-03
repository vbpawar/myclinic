<div class="modal fade full-window-modal" id="cervicalSpine" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: aliceblue;">
                <h5 class="modal-title" id="fullwindowModalLabel"><strong><u>Cervical Spine Assessment</u></strong></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">
                <form id="cervicalSpineForm" method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="container-fluid">
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
                                                <input type="text" class="form-control" id="cerFunDisabilityScore" name="cerFunDisabilityScore" placeholder="">
                                            </div>

                                            <label for="vasScore" class="col-sm-1 col-form-label">VAS Score:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="cerVasScore" name="cerVasScore" placeholder="">
                                            </div>

                                        </div>

                                        <!-- <div class="form-group row">
                                                                <label for="exampleInputUsername2" class="col-sm-12 col-form-label"><center><b>History</b></center></label>
                                                            </div> -->
                                        <div class="form-group row">
                                            <label for="presentSymptoms" class="col-sm-1 col-form-label">Present Symptoms:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="cerPresentSymptoms" name="cerPresentSymptoms" placeholder="">
                                            </div>

                                            <label for="presentSince" class="col-sm-1 col-form-label">Present Since:</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="cerpresentSinceNew" name="cerpresentSinceNew" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="checkbox" value="Improving" name="cerPresentSince">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Improving</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Unchanging" name="cerPresentSince">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Unchanging</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Worsening" name="cerpresentSince">
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
                                                <input type="text" class="form-control" id="cerCommencedAsResult" name="cerCommencedAsResult" placeholder="">
                                            </div>
                                            <div class="col-sm-2 ">
                                                <label>Or no apparent reason</label>
                                            </div>

                                            <label for="symptomsAtOnset" class="col-sm-1 col-form-label">Symptoms at onset:</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="cerSymptAtOnset1" name="cerSymptAtOnset1" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="checkbox" value="neck" name="cerSymptAtOnset">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>neck</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="arm" name="cerSymptAtOnset">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>arm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="forearm" name="cerSymptAtOnset">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>forearm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="headache" name="cerSymptAtOnset">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>headache</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="constantSymptoms" class="col-sm-1 col-form-label">Constant Symptoms:</label>
                                            <div class="col-sm-2 ">
                                                <input type="text" class="form-control" id="cerConstSympt1" name="cerConstSympt1" placeholder="">
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="checkbox" value="neck" name="cerConstSympt">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>neck</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="arm" name="cerConstSympt">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>arm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="forearm" name="cerConstSympt">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>forearm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="headache" name="cerConstSympt">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>headache</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <label for="" class="col-sm-1 col-form-label">Disturbed Sleep:</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="disturbedSleep1" name="disturbedSleep1" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="radio" value="yes" name="disturbedSleep">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="disturbedSleep">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>No</span>
                                                    </label>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="aggravatingFactor" class="col-sm-1 col-form-label">aggravating factor:</label>

                                            <div class="col-sm-4">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="bending" name="cerAggrFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>bending</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="sitting" name="cerAggrFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>sitting</span>
                                                    </label>
                                                    <label class="stand">
                                                        <input type="checkbox" value="turning" name="cerAggrFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Turning</span>
                                                    </label>

                                                    <label>
                                                        <input type="checkbox" value="lying" name="cerAggrFactor">
                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                        <span>lying/rising</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="thedayprogresses" name="cerAggrFactor">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>am/ as the day progresses /pm</span>
                                                    </label>
                                                    <label class="a">
                                                        <input type="checkbox" value="Whentill" name="cerAggrFactor">
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
                                                <input type="text" class="form-control" id="cerAggrFactor1" name="cerAggrFactor1" placeholder="">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="relivingFactor" class="col-sm-1 col-form-label">Reliving Factor:</label>

                                            <div class="col-sm-4">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="bending" name="cerRelFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>bending</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="sitting" name="cerRelFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>sitting</span>
                                                    </label>
                                                    <label class="stand">
                                                        <input type="checkbox" value="standing" name="cerRelFactor">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>turning</span>
                                                    </label>

                                                    <label>
                                                        <input type="checkbox" value="lying" name="cerRelFactor">
                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                        <span>lying/rising</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="the day progresses" name="cerRelFactor">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>am/ as the day progresses /pm</span>
                                                    </label>
                                                    <label class="a">
                                                        <input type="checkbox" value="Whenstill" name="cerRelFactor">
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
                                                <input type="text" class="form-control" id="cerRelFactor1" name="cerRelFactor1" placeholder="">
                                            </div>

                                        </div>
                                        <hr>
                                        <h4>Specific Questions</h4>

                                        <div class="form-group row">
                                            <label for="interSymptoms" class="col-sm-1 col-form-label">Symptoms:</label>
                                            <div class="col-sm-4">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="Dizziness" name="carSymptoms">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Dizziness</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="tinnitus" name="carSymptoms">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Tinnitus</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="nausea" name="carSymptoms">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Nausea</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="swallowing" name="carSymptoms">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>swallowing</span>
                                                    </label>
                                                    <label class="a">
                                                        <input type="checkbox" value="+ve" name="carSymptoms">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>+ve</span>
                                                    </label>
                                                    <label class="b">
                                                        <input type="checkbox" value="-ve" name="carSymptoms">
                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                        <span>-ve</span>
                                                    </label>
                                                </div>
                                            </div>

                                        
                                        </div>

                                        <div class="form-group row">
                                            <span for="medications" class="col-sm-1 col-form-label">Medications:</span>

                                            <div class="col-sm-4">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="Nil" name="cerMedications">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Nil</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="NSAIDS" name="cerMedications">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>NSAIDS</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Analg" name="cerMedications">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Analg</span>
                                                    </label>
                                                    <label class="a">
                                                        <input type="checkbox" value="Steroids" name="cerMedications">
                                                        <span class="cr"> 
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Steroids</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Anticoag" name="cerMedications">
                                                        <span class="cr">
                                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                                        </span>
                                                        <span>Anticoag</span>
                                                    </label>
                                                </div>
                                            </div>

                                         
                                            <span class="col-sm-1 mb-13">Other</span>
                                            <div class="col-sm-6 ">
                                                <input type="text" class="form-control" id="cerMedications1" name="cerMedications1" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="GeneralHealth" class="col-sm-1 col-form-label">General Health:</label>
                                            <div class="col-sm-2 ">
                                                <input type="text" class="form-control" id="cerGenHealth1" name="cerGenHealth1" placeholder="">
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="checkbox" value="Good" name="cerGenHealth">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Good</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Fair" name="cerGenHealth">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Fair</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Poor" name="cerGenHealth">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Poor</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <label for="imaging" class="col-sm-1 col-form-label">Imaging:</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="cerImaging1" name="cerImaging1" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="radio" value="Yes" name="cerImaging">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="cerImaging">
                                                        <span class="cr">
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
                                                <input type="text" class="form-control" id="cerResurgery1" name="cerResurgery1" placeholder="">
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="radio" value="Yes" name="cerResurgery">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="cerResurgery">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>No</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <label for="nightPain" class="col-sm-1 col-form-label">Night Pain:</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" id="cerNightPain1" name="cerNightPain1" placeholder="">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="radio" value="Yes" name="cerNightPain">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="cerNightPain">
                                                        <span class="cr">
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
                                                <input type="text" class="form-control" id="cerAccidents1" name="cerAccidents1" placeholder="">
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="checkbox-fade fade-in-success check">
                                                    <label>
                                                        <input type="radio" value="Yes" name="cerAccidents">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="cerAccidents">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>No</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <label for="weightLoss" class="col-sm-1 col-form-label">Unexplained weight loss:</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" id="cerWeightLoss1" name="cerWeightLoss1" placeholder="">
                                            </div>
                                            <div class="col-sm-2 c">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="radio" value="Yes" name="cerWeightLoss">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="cerWeightLoss">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>No</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <span class="d">Other</span>
                                            <div class="col-sm-2 ">
                                                <input type="text" class="form-control" id="cerWeightLoss2" name="cerWeightLoss2" placeholder="">
                                            </div>

                                        </div>

                                        <hr>
                                        <h4>Examination</h4>
                                        <span><b>POSTURE:</b></span>
                                        <div class="form-group row">

                                            <span class="col-sm-1">Siting:</span>

                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="radio" value="Good" name="cerSitting">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Good</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="Fair" name="cerSitting">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Fair</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="poor" name="cerSitting">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Poor</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <span class="col-sm-1">Standing:</span>

                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="checkbox" value="Good" name="cerStanding">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Good</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Fair" name="cerStanding">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Fair</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="poor" name="cerStanding">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Poor</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <span class="col-sm-1">Protruded Head :</span>

                                            <div class="col-sm-3">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="radio" value="Yes" name="protrudedHead">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" value="No" name="protrudedHead">
                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span>
                                                                        <span>No</span>
                                                                    </label>
                                                               
                                                                   
                                                                </div>
                                                            </div>
                                                            </div>

                                                       


                                                         <span><b>MOVEMENT LOSS:</b></span>
                                                         <div class="form-group row">
                                                            <table class="table table-bordered" id="cerMomentLoss">
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
                                                                <tbody >
                                                                
                                                                  <tr>
                                                                    <th scope="row">Flexion</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                    <th scope="row">Extension</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Lateral Flexion R</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Lateral Flexion L</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Rotation R</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Rotation L</th>
                                                                    <td> <div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span> </label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                    <td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1">
                                                                        <span class="cr">
                                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                                        </span></label></div></td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                              </div>

                                                              <span><b> TEST MOVEMENT:</b></span>
                                                              <div class="form-group row">
                                                                 <table class="table table-bordered" id="cerTestMovement">
                                                                     <thead>
                                                                       <tr>
                                                                         <th scope="col"></th>
                                                                         <th scope="col">Symptoms During Testing</th>
                                                                         <th scope="col">Symptoms After Testing</th>
                                                                         <th scope="colgroup" colspan="3">Mechanical Response
                                                                         <thead> 
                                                                             <th></th> <th></th> <th></th>
                                                                         <th>
                                                                             <div colspan="3"><i class="ik ik-arrow-up"></i>Rom</div> 
                                                                         </th>  
                                                                         <th> <i class="ik ik-arrow-down"></i>Rom</th>
                                                                         <th>No Effect</th>
                                                                         </thead></th>
                                                                       </tr>
                                                                     </thead>
                                                                     <tbody >
                                                                       <tr>
                                                                         <th scope="row">Rep RET</th>
                                                                         <td><input type="text" class="form-control"></td>
                                                                         <td><input type="text" class="form-control"></td>
                                                                         <td><input type="text" class="form-control"></td>
                                                                         <td><input type="text" class="form-control"></td>
                                                                         <td><input type="text" class="form-control"></td>
                                                                    </tr> 
                                                                     </tbody>
                                                                   </table>

                                                                 
                                                                 </div>

                                                                 <span><b>PROVISIONAL CLASSIFICATION:</b></span>
                                                                 <div class="form-group row">
                                                                    <div class="col-sm-3">
                                                                    <div class="checkbox-fade fade-in-success" >
                                                                        <label>
                                                                            <input type="checkbox" value="Derangement"  name="cerderagement" class="form-control" >
                                                                            <span class="cr" >
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Derangement</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="Dysfunction" name="cerderagement" class="form-control">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Dysfunction</span>
                                                    </label>
                                                    <label class="a">
                                                        <input type="checkbox" value="Posture" name="cerderagement" class="form-control">
                                                        <span class="cr">
                                                                                <i class="cr-icon ik ik-check txt-success"></i>
                                                                            </span>
                                                        <span>Posture</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <span class="col-sm-1 ">Other:</span>
                                            <div class="col-sm-3 ">
                                                <input type="text" class="form-control" id="cerderagement2" name="cerderagement2" placeholder="">
                                            </div>
                                            <label for="other" class="col-sm-2 col-form-label">Derangement: Pain Location</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="cerderagement1" name="cerderagement1" placeholder="">
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
                </form>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<script src="jscode/cervicalSpineAssessment.js"></script>