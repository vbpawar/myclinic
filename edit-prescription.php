<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <!-- <img src="upload/patients/12.jpg" class="avatar" alt="Upload"> -->
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>Prescription</h5>
                            <span id="patientName"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <button type="button" class="btn btn-primary" onclick="goback();">Back</button>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Prescription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#cervical" role="tab" aria-controls="pills-setting" aria-selected="false">Cervical Spine Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#neck" role="tab" aria-controls="pills-setting" aria-selected="false">Neck Disability</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#fullwindowModal1" role="tab" aria-controls="pills-setting" aria-selected="false">Lumbar Spine Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#ques" role="tab" aria-controls="pills-setting" aria-selected="false">Back Pain Questions</a>
                        </li>
                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Present Illness</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Concent form</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">BP</label>
                                    <input type="text" id="bp" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Pulse</label>
                                    <input type="number" id="pulse" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Height</label>
                                    <input type="number" id="height" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Weight</label>
                                    <input type="number" id="weight" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">West</label>
                                    <input type="number" id="west" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Hip</label>
                                    <input type="number" id="hip" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Temprature</label>
                                    <input type="number" id="temp" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">SPO2</label>
                                    <input type="number" id="spo2" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="addrow()"><i class="ik ik-plus"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive">
                                                <table id="prescriptionTbl" class="table table-striped table-bordered nowrap" style="overflow-y: scroll; max-height: 350px; display:block;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%;">Type</th>
                                                            <th style="width: 30%;">Medicine</th>
                                                            <th style="width: 10%;">Morning</th>
                                                            <th style="width: 10%;">Evening</th>
                                                            <th style="width: 10%;">Night</th>
                                                            <th style="width: 10%;">Duration</th>
                                                            <th style="width: 15%;">Notes/Inst</th>
                                                            <th style="width: 5%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="prescData">

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3>Remarks</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="input">Remarks</label>
                                                <textarea name="remark" id="remark" cols="3" rows="3" class="form-control"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="input">Enter Days</label>
                                                <input type="text" id="vdate" class="form-control" oninput="setDate(this.value);">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="input">Next Visit Date</label>
                                                <input type="date" id="nextVisitDate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 26px;">

                                            <button type="button" class="btn  btn-success" onclick="savePrescription()">Save</button>
                                            <button type="button" class="btn  btn-default" onclick="goback()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5>Previous Prescriptions</h5>
                            <div id="prevData"></div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="addrow()" title="Add Medicine"><i class="ik ik-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="prescriptionTbl" class="table table-striped table-bordered nowrap" style="overflow-y: scroll; max-height: 350px; display:block;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Type</th>
                                        <th style="width: 30%;">Medicine</th>
                                        <th style="width: 10%;">Morning</th>
                                        <th style="width: 10%;">Evening</th>
                                        <th style="width: 10%;">Night</th>
                                        <th style="width: 10%;">Duration</th>
                                        <th style="width: 15%;">Notes/Inst</th>
                                        <th style="width: 5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="prescData">

                                </tbody>

                            </table>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <div class="container-fluid">
                                    
                                        <div class="row">
                                         
                                <form class="forms-sample" id="consentMasterForm" method="POST" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">

                                                        <div class="card-body">
                                                            <div class="card-body form-group">

                                                                <h5><center><b>CONSENT FORM</b></center></h5>

                                                                <p style="font-size: 17px; margin-left:10px">I
                                                                    <input type="text"  id="pname1"> am a patient of
                                                                    <input type="text" style="margin-top:15px;" id="deseaseNew"> Since
                                                                    <input type="text" style="margin-top:15px;" id="sinceDays"> </p>

                                                                <p style="font-size: 17px;  margin-left:10px"> I have appraoached Lokmanya Hospitals for the treament of the same.</p>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="input">Enter Days</label>
                            <input type="text" id="vdate" class="form-control" oninput="setDate(this.value);">
                        </div>
                        <strong id="dayOfDate" style="color:green;"></strong>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="input">Next Visit Date</label>
                            <input type="date" id="nextVisitDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 26px;">
                    
                        <button type="button" class="btn  btn-success" onclick="savePrescription()">Save</button>
                        <button type="button" class="btn  btn-default" onclick="goback()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<hr>
<h5>Previous Prescriptions</h5>
<div id="prevData"></div>
                                        </div>
                                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            
                                        </div>
                                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                            <div class="card-body">
                                            <div class="container-fluid">
                                        <div class="jumbotron">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>CONSENT FORM</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row"> 
                                                            <div class="col-md-12">
                                                            <article > I <div class="example-container">
                                                                <mat-form-field>
                                                                  <input matInput placeholder="Input">
                                                                </mat-form-field> </div>am a patient of <input type="text" name="" id="">since <input type="text" name="" id=""> .I have appraoached Lokmanya Hospitals for the treament of the same.</article>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <article>I am aware that my complaints is lifestyle based / degenerative in nature that has accumulated over time due to a wrong lifestyle / posture / age factors, etc.
                                                            The doctor / therapist has examined me and expained about problems and treatment options.</article>
                                                        </div>
                                                    </div>
                                                
                                                            <article>I am aware that non-surgical and / or complementory and alternative methods require its own course of times as they offer progressive wellness and relief. <br>
                                                                I have been explained clearly and properly by the doctors / staff of the therapeutic centre, about the treatment options, indications ad contra-indications. <br><br> </article>
                                                       
                                                    
                                                            <article>I shall abstain from physical and mental stress. I was explained and am aware from counseling that non-invasive, alternative and holistic treatment aproaches  <br>
                                                                 offered has a success rae of 80-90%. I am  aware and agree that there are chances that  i may not get benefit from the therapy due to any underlying anatomical / <br>
                                                                  physiological / lifestyle / medical conditions.</article>
                                                       
                                                    
                                                            <article>I agree with good conscience to undergo the therapy / program offered. I will not hold responsible doctor / <br>
                                                            therapist / technisian / other staff for the treatment results. I assure completed co-operation to the doctor / therapist during the course of the treatment. <br>
                                                             Along with following the prescibed treatment / excercise, leading to an improved proper lifestyle. </article>
                                                        </div>
                                                    </div>

                                                                <p style="font-size: 17px; margin-left:10px"> I agree with good conscience to undergo the therapy / program offered. I will not hold responsible doctor / therapist / technisian / other staff for the treatment results. I assure completed co-operation to the doctor / therapist during the course of the treatment. Along with following the prescibed treatment / excercise, leading to an improved proper lifestyle.</p>
                                                                </span>
                                                                <p>

                                                                    <p style="font-size: 17px; margin-left:10px">I also agree to use my treatment reports for R & D Study purposes for the betterment and humankind.</p>
                                                                    <p style="font-size: 17px; margin-left:10px">Signature of Patient:

                                                                        <h5><center><b>PATIENT ATTENDANT CONSENT</b></center></h5>

                                                                        <p style="font-size: 17px; margin-left:10px">I
                                                                            <input type="text" style="margin-top:20px" id="relativeName"> am a relative / friend to the patient
                                                                            <input type="text" id="treatmentName">We have been explained about the therapy and agree for
                                                                            <input type="text" style="margin-top:50px" id="medicalTreatment"> to undergo 3D Spinal Decompression Mobilization & Correction therapy / program. We will not hold any doctor / therapist / staff of the hospital / medicle centre regarding the treatment regarding the treatment results.</p>
                                                                    </p>
                                                                    <p style="font-size: 17px; margin-left:10px"> The Doctor at
                                                                        <input type="text" style="margin-top:20px" id="hospitalCenterName">centre have Explained myself and My Relatives in detail the Nature of the said Treatment and is &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; & myself ready to undergo the said Rx.
                                                                    </p>

                                                                    <p style="font-size: 17px; margin-left:10px">Relation to Patient:

                                                                        <p style="font-size: 17px; margin-left:10px">Signature of Attendant:

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                               

                            
                                            
                                        </div>
                                   
                                    <button class="btn btn-secondary" onclick="downloadForm();"><i class="fa fa-download"></i>Download concent form</button>
                                    <button type="button" class="btn btn-primary" value="submit" onClick="fun()">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="fullwindowModal1" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" data-toggle="modal" data-target="#fullwindowModal2">Add Lumbar Spine Assessment</button>
                            <div class="container-fluid">

                                <div class="card">

                                    <div class="card-body">
                                        <!-- <div style="overflow-x:auto;"> -->
                                        <div class="dt-responsive tbl">
                                            <table id="sTable" class="table">
                                                <thead>
                                                    <tr>

                                                        <th>Visit Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="spineData">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cervical" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" data-toggle="modal" data-target="#cervicalSpine">Add Cervical Spine Assessment</button>
                            <div class="container-fluid">

                                <div class="card">

                                    <div class="card-body c">
                                        <!-- <div style="overflow-x:auto;"> -->
                                        <div class="dt-responsive tbl">
                                            <table id="cTable" class="table">
                                                <thead>

                                                    <tr>

                                                        <th>Visit Date</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="carvicalData">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="neck" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" data-toggle="modal" data-target="#neckDis"> Add Neck Disability Index</button>
                            <div class="container-fluid">

                                <div class="card">

                                    <div class="card-body c">
                                        <!-- <div style="overflow-x:auto;"> -->
                                        <div class="dt-responsive tbl">
                                            <table id="nTable" class="table">
                                                <thead>

                                                    <tr>

                                                        <th>Visit Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="neckData">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div> -->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="ques" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" data-toggle="modal" data-target="#backPain"> Add Back Pain Question</button>
                            <div class="container-fluid">

                                <div class="card">

                                    <div class="card-body c">
                                        <!-- <div style="overflow-x:auto;"> -->
                                        <div class="dt-responsive tbl">
                                            <table id="bTable" class="table">
                                                <thead>

                                                    <tr>

                                                        <th>Visit Date</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="backData">

                                                </tbody>
                                            </table>
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
<script>
    $('#diagnosis').tagsinput({
        'autocomplete': {
            source: diagnosis
        }
    });
    $('#complaintsId').tagsinput({
        'autocomplete': {
            source: complaints
        }
    });
    //for come to main page appointments
    function goback() {
        $('#editProfile').empty();
        $('#tData').show();
    }
    //set date in datepicker
    function setDate(param) {
        param = parseInt(param);
        var date = moment().add(param, 'd').toDate();
        var birthDate = moment(date).format('YYYY-MM-DD');
        if(moment(birthDate).format('dddd') == 'Sunday'){
            date = moment().add(param+1,'d').toDate();
            birthDate = moment(date).format('YYYY-MM-DD');
        }
        $('#nextVisitDate').val(birthDate);
        $('#dayOfDate').html(moment(birthDate).format('dddd'));
        console.log(moment().weekday());
    }

    function downloadForm() {
        window.open('concentform-print.php', '_blank');
    }
</script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/getLumbarSpine.js"></script>
<script src="jscode/getneckDisblity.js"></script>
<script src="jscode/getBackPain.js"></script>
<script src="jscode/getCervicalSpine.js"></script>
<script src="jscode/getConsentForm.js"></script>

<script src="jscode/getAllPrescriptiondata.js"></script>
<script src="jscode/prescription-table.js"></script>
<script src="jscode/check-prescription.js"></script>
<script src="jscode/addPrescription.js"></script>
<!-- <script src="jscode/insertConsentForm.js"></script> -->
<script>
    getLumbarSpine(u_patientId);
    getNeckDisblity(u_patientId);
    getLowBackPain(u_patientId);
    getCervicalSpine(u_patientId);
</script>
<?php include 'lumbar-spin-assesment.php';?>
    <?php include 'neck-disability.php';?>
        <?php include 'low-backPainQues.php';?>
            <?php include 'carvical-spineAssessment.php';?>