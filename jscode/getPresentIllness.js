var presentill = new Map();
var present_details = {};
var uPresent = null;
var editP = 0;
var getPresentDetails = (patientId) => {
    $.ajax({
        url: url + 'getpresentillness.php',
        type: 'POST',
        dataType: 'json',
        data: {
            patientId: patientId
        },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    presentill.set(response.Data[i].onAssesmentId, response.Data[i]);
                }
                showPresentillness(presentill);
            }
        }
    });
};

var showPresentillness = presentill => {
    $('#pTable').dataTable().fnDestroy();
    $('#presentData').empty();
    var tblData = '';
    for (let k of presentill.keys()) {
        let present = presentill.get(k);

        tblData += '<tr><td>' + present.vDate + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editPreserntillness(' + (k) + ')" title="Edit presentillness details "><i class="ik ik-edit text-blue"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#presentData').html(tblData);
    $('#pTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{
            orderable: false,
            targets: [0, 1]
        }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};

var editPreserntillness = (onAssesmentId) => {
    onAssesmentId = onAssesmentId.toString();
    present_details = presentill.get(onAssesmentId);
    global_date = present_details.visitDate;
    editP = 1;
    uPresent = onAssesmentId;
    fill_presentIllness(present_details);
};

function fill_presentIllness(presentill) {

    $('#chiefcomplaints').val(presentill.chiefcomplaints);
    $('#history').val(presentill.history);
    $('#bp1').val(presentill.bp);
    $('#waist').val(presentill.waist);
    $('#pulse1').val(presentill.pulse);
    $('#hip1').val(presentill.hip);
    $('#spo21').val(presentill.spo2);
    $('#hb1c').val(presentill.hb1c);
    $('#temperature').val(presentill.temperature);
    $('#fbs').val(presentill.fbs);
    $('#weight1').val(presentill.weight);

    $('#ppbs').val(presentill.ppbs);
    $('#height1').val(presentill.height);
    $('#gfr').val(presentill.gfr);
    $('#goalweight').val(presentill.goalweight);
    $('#waisthip').val(presentill.waisthip);
    $('#chest').val(presentill.chest);
    $('#addedSound').val(presentill.addedSound);
    $('#wheezeRhonchi').val(presentill.wheezeRhonchi);
    $('#dyspoea').val(presentill.dyspoea);
    $('#conciousness').val(presentill.conciousness);
    $('#umnreflex').val(presentill.umnreflex);
    $('#lmnreflex').val(presentill.lmnreflex);
    $('#reflexes').val(presentill.reflexes);
    $('#s1s2heard').val(presentill.s1s2heard);
    $('#murmur').val(presentill.murmur);
    $('#oralMucosa').val(presentill.oralMucosa);
    $('#scalp').val(presentill.scalp);
    $('#nodules').val(presentill.nodules);
    $('#eyes').val(presentill.eyes);
    $('#raynaud').val(presentill.raynaud);
    $('#telangiectasia').val(presentill.telangiectasia);
    $('#photosensivity').val(presentill.photosensivity);
    $('#rash').val(presentill.rash);
    $('#site').val(presentill.site);
    $('#type').val(presentill.type);
    $('#itching').val(presentill.itching);

    $('#presentIllnessId').modal('show');
}