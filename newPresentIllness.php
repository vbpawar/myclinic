<div class="modal fade full-window-modal" id="presentIllnessId" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form id="presentillnessform" method="POST" class="forms-sample" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header" style="background-color: aliceblue;">
                <h5 class="modal-title" id="fullwindowModalLabel"><strong><u>Present illness</u></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: aliceblue;">
                                        <h3><strong>Present illness</strong></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Chief Complaint</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <textarea placeholder="" class="form-control" id="chiefcomplaints" name="chiefcomplaints"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">History</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <textarea placeholder="" class="form-control" id="history" name="history"></textarea>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top: 86px">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>Vitals</strong></h3>
                                                    </div>
                                                    <div class="card-body" style="background-color: aliceblue;">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <div class="form-group row">
                                                                    <label for="bp" class="col-sm-2 col-form-label">BP</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="bp1" placeholder="" name="bp1">
                                                                    </div>

                                                                    <label for="waist" class="col-sm-2 col-form-label">Waist</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="waist" placeholder="" name="waist">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="Pulse" class="col-sm-2 col-form-label">Pulse</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="pulse1" placeholder="" name="pulse">
                                                                    </div>

                                                                    <label for="hip" class="col-sm-2 col-form-label">Hip</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="hip1" placeholder="" name="hip">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="spo2" class="col-sm-2 col-form-label">SPO2</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="spo21" placeholder="" name="spo2">
                                                                    </div>

                                                                    <label for="hb1c" class="col-sm-2 col-form-label">HB1C</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="hb1c" placeholder="" name="hb1c">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="temp" class="col-sm-2 col-form-label">Temp</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="temperature" placeholder="" name="temperature">
                                                                    </div>

                                                                    <label for="fbs" class="col-sm-2 col-form-label">FBS</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="fbs" placeholder="" name="fbs">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="weight" class="col-sm-2 col-form-label">Weight(KG)</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" class="form-control bmi1" id="weight1"  name="weight">
                                                                    </div>

                                                                    <label for="ppbs" class="col-sm-2 col-form-label">PPBS</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="ppbs"  name="ppbs">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="height" class="col-sm-2 col-form-label">Height(CM)</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" class="form-control bmi1" id="height1" name="height">
                                                                    </div>

                                                                    <label for="gfr" class="col-sm-2 col-form-label">GFR</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control " id="gfr" placeholder="" name="gfr">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="bmi" class="col-sm-2 col-form-label">BMI</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" class="form-control" id="bmi1"  readonly>
                                                                    </div>

                                                                    <label for="goal wt" class="col-sm-2 col-form-label">Goal Wt</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="goalweight" placeholder="" name="goalweight">
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="form-group row">
                                                                    <label for="waist/hip" class="col-sm-2 col-form-label" id="waisthip"><b>Waist/Hip</b></label>
                                                                    <div class="col-sm-4">
                                                                        <label name="waitHipRatio" id="waitHipRatio"></label>
                                                                    </div>
                                                                </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <!-- <div class="card-header">
                                                        <h3><strong>Present illness</strong></h3>
                                                    </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>RS</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <div class="form-group row">
                                                                    <label for="chest" class="col-sm-5 col-form-label">Chest</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="chest" placeholder="" name="chest">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="Added Sound" class="col-sm-5 col-form-label">Added Sound</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="addedSound" placeholder="" name="addedSound">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="Wheeze Rhonchi" class="col-sm-5 col-form-label">Wheeze Rhonchi</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="wheezeRhonchi" placeholder="" name="wheezeRhonchi">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="Dyspnoea" class="col-sm-5 col-form-label">Dyspnoea</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="dyspoea" placeholder="" name="dyspoea">
                                                                    </div>  
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>CNS</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <div class="form-group row">
                                                                    <label for="conciousness" class="col-sm-5 col-form-label">Conciousness</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="conciousness" placeholder="" name="conciousness">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="umnreflex" class="col-sm-5 col-form-label">U.M.N Reflex</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="umnreflex" placeholder="" name="umnreflex">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="lmnreflex" class="col-sm-5 col-form-label">L.M.N Reflex</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="lmnreflex" placeholder="" name="lmnreflex">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="reflexes" class="col-sm-5 col-form-label">Reflexes</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" id="reflexes" placeholder="" name="reflexes">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>CVS</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <div class="form-group row">
                                                                    <label for="s1s2heard" class="col-sm-6 col-form-label">s1,s2 heard</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="s1s2heard" placeholder="" name="s1s2heard">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="murmur" class="col-sm-6 col-form-label">Murmur</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="murmur" placeholder="" name="murmur">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <label><strong><h4>Other</h4>   </strong></label>
                                                                <div class="form-group row">
                                                                    <label for="oralMucosa" class="col-sm-6 col-form-label">Oral Mucosa</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="oralMucosa" placeholder="" name="oralMucosa">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="scalp" class="col-sm-6 col-form-label">Scalp</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="scalp" placeholder="" name="scalp">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="nodules" class="col-sm-6 col-form-label">Nodules</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="nodules" placeholder="" name="nodules">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="eyes" class="col-sm-6 col-form-label">Eyes</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="eyes" placeholder="" name="eyes">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="raynaud" class="col-sm-6 col-form-label">Raynaud's</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="raynaud" placeholder="" name="raynaud">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="telangiectasia" class="col-sm-6 col-form-label">Telangiectasia</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="telangiectasia" placeholder="" name="telangiectasia">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: aliceblue;">
                                                        <h3><strong>Skin</strong></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <div class="form-group row">
                                                                    <label for="photosensivity" class="col-sm-6 col-form-label">Photosensivity</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="photosensivity" placeholder="" name="photosensivity">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="rash" class="col-sm-6 col-form-label">Rash</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="rash" placeholder="" name="rash">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="site" class="col-sm-6 col-form-label">Site</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="site" placeholder="" name="site">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="type" class="col-sm-6 col-form-label">Type</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="type" placeholder="" name="type">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="itching" class="col-sm-6 col-form-label">Itching</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="itching" placeholder="" name="itching">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    $('#bp1').mask('000/000',{placeholder: "___/___"});

$('.bmi1').on('change',function(){
    var height1 = parseFloat($('#height1').val());
    var weight1 = parseFloat($('#weight1').val());
    var meter = height1/100;
    var bmi1 = parseFloat(weight1/(meter*meter));
    $('#bmi1').val(bmi1.toFixed(2));
});
</script>
<script src="js/jquery.validate.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<script src="jscode/presentillness_validation.js"></script>
<script src="jscode/presentillness.js"></script>