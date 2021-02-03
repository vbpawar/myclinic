var appointments = new Map();
var u_patientId = null;
var u_appointmentId = null;
var global_patientId = null; //for lumbar neck,and back pain
var details = {};
var fStatus = null;
var u_BranchName = null;
var lang_flag = 1;
var global_date = moment().format('YYYY-MM-DD');
var pres_date = moment().format('YYYY-MM-DD');
$('#dropper-max-year').val(moment().format('YYYY-MM-DD'));
const getAllAppointments = (doctorId) => {
    $.ajax({
        url: url + 'getAllAppointments.php',
        type: 'POST',
        dataType: 'json',
        data: { doctorId: doctorId },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    appointments.set(response.Data[i].appointmentId, response.Data[i]);
                }
                var today = getToday();
                listAppointments(appointments, today);
            }
        }
    });
};

const listAppointments = (appointments, today) => {
    $('#aTable').dataTable().fnDestroy();
    $('#aptData').empty();
    var appointmentDate, appoitmentTime;
    var tblData = '',
        i = 0,
        patientType = '',
        nType = 0,
        cType = 0,
        feesSt = null;
    for (let k of appointments.keys()) {
        let patient = appointments.get(k);
        appointmentDate = moment(patient.appointmentDate).format('YYYY-MM-DD');
        appoitmentTime = moment(patient.appointmentDate).format('HH:mm:ss');
        if (appointmentDate == today) {
            i++;
            if (patient.firstVisitDate == today) {
                patientType = '<td><span class="badge badge-success">New</span></td>';
                nType = nType + 1;
            } else {
                patientType = '<td><span class="badge badge-warning">Follow</span></td>';
            }
            tblData += '<tr><td><img src="img/user.png" class="table-user-thumb" alt="Upload"></td>';
            tblData += '<td>' + patient.firstName + ' ' + patient.surname + '</td>';
            tblData += '<td>' + appoitmentTime + '</td>';
            if (getConsultingStatus(patient.patientId, patient.doctorId, appointmentDate) == 1) {
                cType = cType + 1;
                tblData += '<td><span class="badge badge-success">Consulted</span></td>';
            } else {
                tblData += '<td><span class="badge badge-default">Pending</span></td>';
            }
            feesSt = fees_status(patient.patientId, patient.doctorId, appointmentDate);
            if (feesSt == 0) {
                feesSt = 'unmarked';
            }
            tblData += '<td>' + patient.doctorName + '(' + patient.address + ')</td>';
            tblData += '<td>' + feesSt + '</td>';
            tblData += patientType;
            tblData += '<td ><div class="table-actions" style="text-align : left" >';
            tblData += '<a href="#"  onclick="editPatient(\'' + k + '\',\'' + feesSt + '\')" title="medication"><i class="fa fa-medkit" style="color: blue;"></i></a>';
            tblData += '</div></td></tr>';
        }

    }
    $('#consulted').html(cType);
    $('#totalPatient').html(i);
    $('#newPatients').html(nType);
    $('#aptData').html(tblData);
    $('#aTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllAppointments(data.userId);

const editPatient = (appointmentId, feesSt) => {
    fStatus = feesSt;
    appointmentId = appointmentId.toString();
    let patient = appointments.get(appointmentId);
    details = patient;
    u_patientId = patient.patientId;
    u_appointmentId = appointmentId;
    global_patientId = patient.patientId;
    $('#tData').hide();
    $('#editProfile').load('edit-prescription-2.php');
    $('.wrapper').addClass('nav-collapsed menu-collapsed');
    $('#tog').removeClass('ik-toggle-right');
    $('#tog').addClass('ik-toggle-left');
};

function getToday() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    return today;
}

function fetch(today) {
    var search_date = moment(today).format('YYYY-MM-DD');
    listAppointments(appointments, search_date);
}

var fees_status = (patientId, doctorId, visitDate) => {
    var fees = 0;
    $.ajax({
        url: url + 'getFees-status.php',
        type: 'POST',
        dataType: 'json',
        data: {
            doctorId: doctorId,
            patientId: patientId,
            visitDate: visitDate
        },
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                fees = parseFloat(response.Data.fees);
            } else {
                fees = 0;
            }
        }
    });
    return fees;
};

var getConsultingStatus = (patientId, doctorId, visitDate) => {
    var flag = 0;
    $.ajax({
        url: url + 'getConsultingStatus.php',
        type: 'POST',
        dataType: 'json',
        data: {
            doctorId: doctorId,
            patientId: patientId,
            visitDate: visitDate
        },
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                flag = 1;
            } else {
                flag = 0;
            }
        }
    });
    return flag;
};