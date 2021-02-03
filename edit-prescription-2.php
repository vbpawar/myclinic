<style>
/* laptop */
@media only screen   and (min-device-width : 768px)   and (max-device-width : 1024px) {
    .notes{
        width:100px;
    }
    .medicine{
        width:180px;    
    }
    .dura{
        width:30px;
    }
    .type{
        width:70px;
    }
    .mor{
        width:70px;
    }
    .eve{
        width:70px;
    }
    .nig{
        width:70px;
    }
    }

    @media only screen   and (min-device-width : 1030px)   and (max-device-width : 1224px){
        .notes{
        width:150px;
    }
    .medicine{
        width:200px;    
    }
    .dura{
        width:50px;
    }
    .type{
        width:120px;
    }
    .mor{
        width:90px;
    }
    .eve{
        width:90px;
    }
    .nig{
        width:90px;
    }
    }
    /* desktop */
    @media only screen   and (min-width: 1370px)  and (max-width: 1605px) {
        .notes{
        width:200px;
    }
    .medicine{
        width:400px;    
    }
    .dura{
        width:60px;
    }
    .type{
        width:200px;
    }
    .mor{
        width:100px;
    }
    .eve{
        width:100px;
    }
    .nig{
        width:100px;
    }
}
/* mobile */
/* @media only screen and (min-device-width : 320px) and (max-device-width : 480px){
    .notes{
        width:158px;
    }
    .medicine{
        width:300px;    
    }   
    .dura{
        width:30px;
    }
    .type{
        width:100px;
    }
    .mor{
        width:80px;
    }
    .eve{
        width:80px;
    }
    .nig{
        width:80px;
    }
} */
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-3">
                    <div class="page-header-title">
                        <!-- <img src="upload/patients/12.jpg" class="avatar" alt="Upload"> -->
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h4><u>Prescription</u></h4>
                            <span id="patientName"></span>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-warning" >Patients Name: &nbsp; &nbsp;&nbsp;&nbsp;<span id="detailPName"></span></button>
                <button type="button" class="btn btn-primary">Reffered by: &nbsp; &nbsp;&nbsp;&nbsp;<span id="detailsReff"></span></button>
                <button type="button" class="btn btn-success">Fees status: &nbsp; &nbsp;&nbsp;<span id="detailsFees"></span></button>
                                        </div>

                </div>

                <div class="col-lg-2">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <button type="button" class="btn btn-success" onclick="goback();"><i class="ik ik-arrow-left"></i></button>
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
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Consent form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#present" role="tab" aria-controls="pills-setting" aria-selected="false">Present illness</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#exercise" role="tab" aria-controls="pills-setting" aria-selected="false">Exercise chart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#feedbackform" role="tab" aria-controls="pills-setting" aria-selected="false">Feedback Form</a>
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
                                                        <label for="input">Height(CM)</label>
                                                        <input type="number" id="height" class="bmi form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="input">Weight(KG)</label>
                                                        <input type="number" id="weight" class="bmi form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="input">BMI</label>
                                                        <input type="number" id="bmi" class="form-control form-control-sm" readonly>
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
                                                <div class="col-sm-3">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="input"><h4>Complaints</h4></label>
                                                        <input type="text" id="complaintsId" class="form-control" placeholder="Add complaints">
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="input"><h4>Diagnosis</h4></label>
                                                        <input type="text" id="diagnosis" class="form-control" placeholder="Diagnosis">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="addrow()" title="Add Medicine"><i class="ik ik-plus"></i></button>
                                            <div class="col-md-2" style="float: left;">
                                            <div class="form-group">
                                               <label for="instFormat">Instruction format</label>
                                               <select name="instFormat" id="instFormat" class="form-control" onchange="check_instruction_type(this.value)">
                                                    <option value="1">English</option>
                                                    <option value="2">Hindi</option>
                                                    <option value="3">Marathi</option>
                                               </select>
                                            </div>
                                        </div>
                                        
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive">
                                                <table id="prescriptionTbl" class="table table-striped table-bordered nowrap" style="overflow-y: scroll; max-height: 350px; display:block;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%;">Type</th>
                                                            <th style="width: 25%;">Medicine</th>
                                                            <th style="width: 10%;">Morning</th>
                                                            <th style="width: 10%;">Evening</th>
                                                            <th style="width: 10%;">Night</th>
                                                            <th style="width: 5%;">Duration</th>
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
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">

                                            <div class="form-group">
                                               <h4>Advice</h4>
                                                <input name="remark" id="adviceId"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="vdate" style="margin-top: 10px;">Enter Days</label>
                                                <input type="number" id="vdate" class="form-control" oninput="setDate(this.value);">
                                            </div>
                                            <strong id="dayOfDate" style="color:green;"></strong>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nextVisitDate" style="margin-top: 10px;">Next Visit Date</label>
                                                <input type="date" id="nextVisitDate" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-5" style="margin-top: 38px;">

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
                        <div class="tab-pane fade" id="exercise" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <?php include 'exercise-prescription.php';?>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                    <div class="col-md-2 float-right">
                                            <div class="form-group">
                                                <label>Select Date</label>
                                                <select  class="form-control select2" name="concentId" id="concentId" style="width: 100%;" onchange="fill_concent(this.value);"></select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                       
                                <?php include 'concentform.php';?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="feedbackform" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                    <div class="col-md-2 float-right">
                                            <div class="form-group">
                                                <label>Select Date</label>
                                                <select  class="form-control select2" name="feedid" id="feedid" style="width: 100%;" onchange="fill_concent(this.value);"></select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                       
                                <?php include 'feedbackform.php';?>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="feedbackform" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                    <div class="col-md-2 float-right">
                                           
                                        </div>
                                    </div>
                                     <div class="row">
                                       
                                <?php include 'feedbackform.php';?>
                            </div>
                        </div> -->
                        <div class="tab-pane fade" id="fullwindowModal1" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" onclick="addlumbarspin()">Add Lumbar Spine Assessment</button>
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

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;" id="btn"  onclick="addcerviacl()">Add Cervical Spine Assessment</button>
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

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;"  onclick="addNeck()"> Add Neck Disability Index</button>
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

                            <button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;"  onclick="addBack()"> Add Back Pain Question</button>
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


<!-- prentillness -->
<div class="tab-pane fade" id="present" role="tabpanel" aria-labelledby="pills-profile-tab">

<button class="btn btn-success" type="button" style="float: right;margin-top: 10px;margin-right: 22px;"  onclick="newPresentIllness()">Add Present Illness</button>
<div class="container-fluid">

    <div class="card">

        <div class="card-body c">
            <!-- <div style="overflow-x:auto;"> -->
            <div class="dt-responsive tbl">
                <table id="pTable" class="table">
                    <thead>

                        <tr>

                            <th>Visit Date</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="presentData">

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
        'delimiter': ';',
        'autocomplete': {
            source: diagnosis
        }
    });
    $('#complaintsId').tagsinput({
        'delimiter': ';',
        'autocomplete': {
            source: complaints
        }
    });
    $('#adviceId').tagsinput({
        'delimiter': ';',
        'autocomplete': {
            source: advice
        }
    });
    //for come to main page appointments
    function goback() {
        $('#diagnosis').tagsinput('refresh');
        $('#complaintsId').tagsinput('refresh');
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
    }
//print the reciept
    // function downloadForm() {
    //     var visitDate;
    //     window.open('concentform-print.php?visitDate='+visitDate, '_blank');
    // }

    function downloadForm() {
    // window.open('concentform-print.php?patientId='+u_patientId + '&visitDate='+consent_date);
    $('<form action="concentform-print.php" method="POST" target="_blank"><input type="hidden" name="cpatientId" value="'+u_patientId+'" /><input type="hidden" name="cvisitDate" value="'+consent_date+'" /></form>').appendTo('body').submit();
}

    display(details);
    //display the details of patient fees,name,refferance
    function display(details){
        $('#detailPName').html(details.firstName+' '+details.surname);
        $('#detailsReff').html(details.doctorName);
        $('#detailsFees').html(fStatus);
    }
    //mask input for bp
    $('#bp').mask('000/000',{placeholder: "___/___"});
//bmi calculation
    $('.bmi').on('change',function(){
        var height = parseFloat($('#height').val());
        var weight = parseFloat($('#weight').val());
        var meter = height/100;
        var bmi = parseFloat(weight/(meter*meter));
        $('#bmi').val(bmi.toFixed(2));
    });
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
<script src="jscode/insertConsentForm.js"></script>
<script src="jscode/getPresentIllness.js"></script>
<script src="jscode/exercise-table.js"></script>
<script src="jscode/check-exercise.js"></script>
<script>
    getLumbarSpine(u_patientId);
    getNeckDisblity(u_patientId);
    getLowBackPain(u_patientId);
    getCervicalSpine(u_patientId);
    getPresentDetails(u_patientId);
</script>
<?php include 'lumbar-spin-assesment.php';?>            
<?php include 'neck-disability.php';?>
<?php include 'low-backPainQues.php';?>
<?php include 'carvical-spineAssessment.php';?>
<?php include 'newPresentIllness.php';?>
<script src="jscode/allModals.js"></script>
<script src="jscode/feedback-form.js"></script>
<script>
function downloadfeedbackForm() {
    $('<form action="feedbackform-print.php" method="POST" target="_blank"><input type="hidden" name="patientId" value="'+u_patientId+'" /><input type="hidden" name="visitDate" value="'+consent_date+'" /></form>').appendTo('body').submit();
}
</script>
