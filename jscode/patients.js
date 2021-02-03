var patients = new Map();
var patient_details = {};
var patientId_ap = null;
var global_patientId = null; //for lumbar neck,and back pain
var global_date = moment().format('YYYY-MM-DD');
var contactNo;
var getAllPatients = (branchId) => {
    patients.clear();
    $.ajax({
        url: url + 'getAllPatients.php',
        type: 'POST',
        dataType: 'json',
        data:{
            branchId:branchId
        },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    patients.set(response.Data[i].patientId, response.Data[i]);
                }
                
            }
            listPatients(patients);
        }
    });
};
function mapBranches(role,franchiseid,branchid) {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let m =  branch.get(k);
        if(role == 9 || role == 5){
            dropdownList += '<option value="' + k + '"><b>'+ m.franchisename+'</b>-' + m.branchName+ '</option>';
        }else if(role == 6 || role == 8){
            if(franchiseid == m.franchiseid){
            dropdownList += '<option value="' + k + '">'+ m.branchName+ '</option>';
            }
        }else{
            if(branchid == m.branchId){
            dropdownList += '<option value="' + k + '">' + m.branchName+ '</option>';
            }
        }
    }
    $('#pbranch').html(dropdownList);
}

    mapBranches(data.role,data.franchiseid,data.branchId);
    $("#pbranch").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
    $('#searchCollection').on('click', function(e) {
        e.preventDefault();
            var branch = null;
            if ($('#pbranch').val() != '') {
                branch = $('#pbranch').val();
            }else{
                branch = data.branchId;
            }
            getAllPatients(branch);
    });
$('#searchContact').on('click', function(e) {
    e.preventDefault();
 contactNo = document.getElementById("mobileNo").value;
});

var listPatients = patients => {
    $('#pTable').dataTable().fnDestroy();
    $('#patientData').empty();
    var tblData = '';
    for (let k of patients.keys()) {
        let patient = patients.get(k);  
        if (contactNo==patient.mobile1) {
            tblData += '<tr bgcolor="#BB8FCE"><div class="ikr"><td><img src="img/user.png" class="table-user-thumb" alt="Upload"></td></div>';
            tblData += '<td bgcolor="#BB8FCE">' + patient.firstName + ' ' + patient.surname + '</td>';
            tblData += '<td bgcolor="#BB8FCE">' + getAge(patient.birthDate) + '</td>';
            tblData += '<td bgcolor="#BB8FCE">' + patient.mobile1+ '</td>';
            tblData += '<td bgcolor="#BB8FCE">' + patient.address + ' ' + patient.cityName + '</td>';
            tblData += '<td bgcolor="#BB8FCE">' + getDate(patient.lastVisitDate) + '</td>';
            tblData += '<td bgcolor="#BB8FCE">' + patient.nextVisitDate + '</td>';
            tblData += '<td bgcolor="#BB8FCE"><div class="table-actions" style="text-align: left;">';
            tblData += '<a href="#" onclick="editPatient(' + (k) + ')" title="Edit patients details"><i class="fas fa-user-injured" style="color:red"></i></a>';
            tblData += '<a href="#" class="list-delete" onclick="takeAppointment(' + (k) + ')" title="Take appointment"><i class="fas fa-rupee-sign" style="color:purple"></i></a>';
            tblData += '<a href="#"  onclick="opdPayment(' + (k) + ')" title="Opd Payment"><i class="fas fa-receipt" style="color:blue"></i></a>';
            tblData += '<a href="#"  onclick="acceptPayment(' + (k) + ')" title="Generate Payment"><i class="fas fa-rupee-sign" style="color:green"></i></a>';
    
          } else {
            tblData += '<tr><td><img src="img/user.png" class="table-user-thumb" alt="Upload"></td>';
            tblData += '<td>' + patient.firstName + ' ' + patient.surname + '</td>';
            tblData += '<td>' + getAge(patient.birthDate) + '</td>';
            tblData += '<td >' + patient.mobile1+ '</td>';
            tblData += '<td>' + patient.address + ' ' + patient.cityName + '</td>';
            tblData += '<td>' + getDate(patient.lastVisitDate) + '</td>';
            tblData += '<td>' + patient.nextVisitDate + '</td>';
            tblData += '<td><div class="table-actions" style="text-align: left;">';
            tblData += '<a href="#" onclick="editPatient(' + (k) + ')" title="Edit patients details"><i class="fas fa-user-injured" style="color:red"></i></a>';
            tblData += '<a href="#" class="list-delete" onclick="takeAppointment(' + (k) + ')" title="Take appointment"><i class="fas fa-rupee-sign" style="color:purple"></i></a>';
            tblData += '<a href="#"  onclick="opdPayment(' + (k) + ')" title="Opd Payment"><i class="fas fa-receipt" style="color:blue"></i></a>';
            tblData += '<a href="#"  onclick="acceptPayment(' + (k) + ')" title="Generate Payment"><i class="fas fa-rupee-sign" style="color:green"></i></a>';
}
            tblData += '</div></td></tr>';
        //tblData += '<td>' + patient.mobile1 + '</td>';
        
    }
    $('#patientData').html(tblData);
    $('#pTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true,
        
    });
    
    oTable = $('#pTable').DataTable();

    $('#mobileNo').on('keyup change', function(){
      oTable.search($(this).val()).draw();
    })

};
getAllPatients(data.branchId);

var editPatient = (patientId) => {
    patientId = patientId.toString();
    patient_details = patients.get(patientId);
    global_patientId = patientId;
    $('#tData').hide();
    $('#editProfile').load('edit_patient_profile.php');
};

function takeAppointment(patientId) {
    patientId_ap = patientId;
    $('#appointment').modal('show');
}

function opdPayment(patientId) {
    patientId_ap = patientId;
    paymentDetails(patientId);
    $('#opd-payment').modal('show');
}

function acceptPayment(patientId) {
    patientId_ap = patientId;
    getPreviousPayments(patientId);
    loadTest();
    $('#paymentFor').html(list);
    $("#paymentFor").select2({
        placeholder: 'Select Doctor for payment',
        allowClear: true,
        dropdownParent: $('#opd-payment-generate')
    });
    //  $("#presTable tbody").empty();
    $('#opd-payment-generate').modal('show');
}

function goback() {
    $('#tData').show();
    $('#editProfile').empty();
}