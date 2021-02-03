var dosageM = new Map();
var dosage_details = {};
var dosageId_ap = null;

const getAllDosagess = () => {
    $.ajax({
        url: url + 'get_Dosage.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    dosageM.set(response.Data[i].dosageId, response.Data[i]);
                }
         
                listDosage(dosageM);
            }
        }
    });
};

const listDosage = dosageM => {
    $('#dosTable').dataTable().fnDestroy();
    $('#dosageData').empty();
    var tblData = '';
    for (let k of dosageM.keys()) {
        let dose = dosageM.get(k);
        badge1 = '';
        if (dose.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + dose.dosageId + '</td>';
        tblData += '<td>' + dose.dosage + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editDosage(' + (k) + ')" title="Edit dosage details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateDose(' + (k) + ')" title="Active/inactive User"><i class="ik ik-trash text-danger"></i></a>';
    
        tblData += '</div></td></tr>';
    }
    $('#dosageData').html(tblData);
    $('#dosTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllDosagess();

var editDosage = (dosageId) => {
    dosageId = dosageId.toString();
    dosage_details = dosageM.get(dosageId);
    dosageId_ap= dosageId;
    console.log(dosageId_ap);
    $('#dosRecord').hide();
    $('#doseNew').load('edit_Dosage_Master.php');

};


var inactivateDose = dosageId => {
    dosageId = dosageId.toString();
    let dose = dosageM.get(dosageId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (dose.isActive == 1) {
        dose.isActive = 0;
        msg = 'Do you really want to in activate this Dosage?';
        btn = 'Deactivate Now';
        msg1 = 'Dosage Deactivated';
    } else {
        dose.isActive = 1;
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
                    url: url + 'dosageActivation.php',
                    type: 'POST',
                    data: {dosageId: dosageId,suserid:data.userId,
                        susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            dosageM.set(dosageId, dose);
                            listDosage(dosageM);
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

function gobackDosage(){
    $('#dosRecord').show();
    $('#doseNew').empty();
}