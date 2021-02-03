var medicines = new Map();
var medicine_details = {};
var medicineId_ap = null;
var list = null;
var medicineTypeList=null;
var getAllMedicines = () => {
    $.ajax({
        url: url + 'get_Medicines.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    medicines.set(response.Data[i].medicineId, response.Data[i]);
                }
                listMedicines(medicines);
            }
        }
    });
};

var listMedicines = medicines => {
    $('#medicinesTable').dataTable().fnDestroy();
    $('#medicineData').empty();
    var tblData = '';
    medicines.forEach((medicine,key) => {
        // tblData += '<tr><td>' + medicine.type + '</td>';
        badge1 = '';
        if (medicine.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + medicine.name + '</td>';
        tblData += '<td>' + medicine.genName + '</td>';
        tblData += '<td>' + medicine.type + '</td>';
        tblData += '<td>' + medicine.instruction + '</td>';
        tblData += '<td>' + medicine.morning + '</td>'; 
        tblData += '<td>' + medicine.noon + '</td>'; 
        tblData += '<td>' + medicine.night + '</td>'; 
        tblData += '<td>' + medicine.days + '</td>';
        tblData += '<td>' + medicine.isImportant + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editMedicines(' + (key) + ')" title="Edit Medicines details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateMedicine(' + (key) + ')" title="Active/inactive Medicine"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
        
    });
    $('#medicineData').html(tblData);
    $('#medicinesTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllMedicines();

var editMedicines = (medicineId) => {
    medicineId = medicineId.toString();
    medicine_details = medicines.get(medicineId);
    medicineId_ap= medicineId;
    $('#addMedicines').hide();
    $('#medicineNew').load('edit_Medicines.php');

    var json, obj, values, i;
};
function loadMedicineDosage() {
    
    var dropDownList = '<option></option>';

    medicineDosage.forEach(dosage => {
        dropDownList += "<option>" + dosage + "</option>";
    });
    list = dropDownList;
  
    $('#morning').html(dropDownList);
    $('#noon').html(dropDownList);
    $('#night').html(dropDownList);

    $('.select2').select2({
        placeholder:'select',
        allowClear:true,
        tags:true,
        dropdownParent: $('#medicinesModal'),
        selectOnClose: true
    });
}
loadMedicineDosage();

function loadMedicineTypes() {
    var dropDownList = '<option></option>';
    medicineTypes.forEach(medicine => {
        dropDownList += "<option>" + medicine + "</option>";
    });
    medicineTypeList=dropDownList;
    $('#typeId').html(dropDownList);
    $('.select2').select2({
        placeholder:'select',
        allowClear:true,
        tags:true,
        dropdownParent: $('#medicinesModal'),
        selectOnClose: true,
    });
}
loadMedicineTypes();

function gobackMedicine(){
    $('#addMedicines').show();
    $('#medicineNew').empty();
}


var inactivateMedicine = medicineId => {
    medicineId = medicineId.toString();
    let medicine = medicines.get(medicineId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (medicine.isActive == 1) {
        medicine.isActive = 0;
        msg = 'Do you really want to in activate this Medicines?';
        btn = 'Deactivate Now';
        msg1 = 'Medicines Deactivated';
    } else {
        medicine.isActive = 1;
        msg = 'Do you really want to  activate this Medicines?';
        btn = 'Activate Now';
        msg1 = 'Medicines Activated';
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
                    url: url + 'medicineActivation.php',
                    type: 'POST',
                    data: {medicineId: medicineId,suserid:data.userId,
                        susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            medicines.set(medicineId, medicine);
                            listMedicines(medicines);
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
