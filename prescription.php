<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Prescription</h5>
                            <span id="patientName"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Advance</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

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
                                    <input type="text" id="pulse" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Height</label>
                                    <input type="text" id="height" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Weight</label>
                                    <input type="text" id="weight" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">West</label>
                                    <input type="text" id="west" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Hip</label>
                                    <input type="text" id="hip" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">Temprature</label>
                                    <input type="text" id="temp" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="input">SPO2</label>
                                    <input type="text" id="spo2" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="input">Complaints</label>
                                    <input type="text" id="complaintsId" class="form-control" placeholder="Add complaints">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="input">Diagnosis</label>
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
                        <span>Monday</span>
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
    function setDate(param){
        param= parseInt(param);
        console.log("hey"+moment().day(param));
        var date = moment().add(param,'d').toDate();
        var birthDate = moment(date).format('YYYY-MM-DD');
        $('#nextVisitDate').val(birthDate);
      
    }
</script>
<script src="jscode/getAllPrescriptiondata.js"></script>
<script src="jscode/prescription-table.js"></script>
<script src="jscode/check-prescription.js"></script>
<script src="jscode/addPrescription.js"></script>