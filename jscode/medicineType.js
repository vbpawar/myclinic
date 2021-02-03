var medicineType = new Map();
var  medicineType_details = {};
var medicineTypeId_ap = null;

const getAllMedicine = () => {
    $.ajax({
        url: url + 'getMedicineTypes.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    medicineType.set(response.Data[i].medicineTypeId, response.Data[i]);
                }
                listMType(medicineType);
            }
        }
    });
};

const listMType = medicineType => {
    $('#mTypeTable').dataTable().fnDestroy();
    $('#mTypeData').empty();
    var tblData = '';
    for (let k of medicineType.keys()) {
        let mType = medicineType.get(k);
        badge1 = '';
        if (mType.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
        tblData += '<tr><td>' + mType.medicineTypeId + '</td>';
        tblData += '<td>' + mType.type + '</td>';
        tblData += badge1;
 
      
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editMType(' + (k) + ')" title="Edit complaints details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateMType(' + (k) + ')" title="Active/inactive medicine Type"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#mTypeData').html(tblData);
    $('#mTypeTable').dataTable({
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
getAllMedicine();

var editMType = (medicineTypeId) => {
    medicineTypeId = medicineTypeId.toString();
    medicineType_details = medicineType.get(medicineTypeId);
    medicineTypeId_ap= medicineTypeId;
    console.log(medicineTypeId_ap);
    $('#meTypeRecord').hide();
    $('#editMedNew').load('edit_mediType_Master.php');

};

var inactivateMType = medicineTypeId => {
    medicineTypeId = medicineTypeId.toString();
    let mType = medicineType.get(medicineTypeId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (mType.isActive == 1) {
        mType.isActive = 0;
        msg = 'Do you really want to in activate this Medicine Type?';
        btn = 'Deactivate Now';
        msg1 = 'Medicine Type Deactivated';
    } else {
        mType.isActive = 1;
        msg = 'Do you really want to  activate this Dosage?';
        btn = 'Activate Now';
        msg1 = 'Medicine Type Activated';
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
                    url: url + 'medicineTypeActivation.php',
                    type: 'POST',
                    data: {medicineTypeId: medicineTypeId,suserid:data.userId,
                        susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            medicineType.set(medicineTypeId, mType);
                            listMType(medicineType);
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
function goBackType(){
    $('#meTypeRecord').show();
    $('#editMedNew').empty();
}