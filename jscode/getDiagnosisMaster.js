var diagnosis = new Map();
var diagnosis_details = {};
var  diagnosisId_ap = null;

const getAlldiagnosis = () => {
    $.ajax({
        url: url + 'getAllDiagnosisMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    diagnosis.set(response.Data[i].diagnosisId, response.Data[i]);
                }
                listdiagnosis(diagnosis);
            }
        }
    });
};

const listdiagnosis = diagnosis => {
    $('#diaTable').dataTable().fnDestroy();
    $('#diaData').empty();
    var tblData = '';
    for (let k of diagnosis.keys()) {
        let diagnos = diagnosis.get(k);
        badge = '';
        if (diagnos.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + diagnos.diagnosisId + '</td>';
        tblData += '<td>' + diagnos.diagnosis + '</td>';
        tblData += '<td>' + diagnos.icdCode  + '</td>';
        tblData += badge1;
      
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editDiagnosis(' + (k) + ')" title="Edit branch details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateDiagnosis(' + (k) + ')" title="Active/inactive Diagnosis"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#diaData').html(tblData);
    $('#diaTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAlldiagnosis();

const editDiagnosis = (diagnosisId) => {
    diagnosisId = diagnosisId.toString();
    diagnosis_details = diagnosis.get(diagnosisId);
    diagnosisId_ap= diagnosisId;
    console.log(diagnosisId_ap);
    $('#diagnosisData').hide();
    $('#editdiaNew').load('edit_Diagnosis_Master.php');
 
};
function gobackD(){
    $('#diagnosisData').show();
    $('#editdiaNew').empty();
}

var inactivateDiagnosis = diagnosisId => {
    diagnosisId = diagnosisId.toString();
    let diagnos = diagnosis.get(diagnosisId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (diagnos.isActive == 1) {
        diagnos.isActive = 0;
        msg = 'Do you really want to in activate this Dosage?';
        btn = 'Deactivate Now';
        msg1 = 'Dosage Deactivated';
    } else {
        diagnos.isActive = 1;
        msg = 'Do you really want to  activate this Dosage?';
        btn = 'Activate Now';
        msg1 = 'Dosage Activated';
    }
    swal({
            title: "Are you sure?",
            text: msg,
            icon: "warning",
            buttons: ["Cancel", btn],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'diagnosisActivation.php',
                    type: 'POST',
                    data: {diagnosisId: diagnosisId,suserid:data.userId,
                        susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            diagnosis.set(diagnosisId, diagnos);
                            listdiagnosis(diagnosis);
                            swal({
                                text: msg1,
                                icon: "success"
                            });

                        }
                    }
                });
            }
        });
};