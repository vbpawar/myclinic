var calls = new Map();
var existCall = new Map();
var clientId = null,
    up_callId = null;
// var customers = new Map();
var appointments = new Map();
var follwups = new Map();
var caseParam = null;
var work = new Map();
var global_date = moment().format('YYYY-MM-DD');
var patientId_ap=null;
function branches() {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let b = branch.get(k);
        dropdownList += '<option value="' + k + '">' + b.branchName + '</option>';
    }
    $('#branch').html(dropdownList);
    $("#branch").select2({
        placeholder: 'Select branch',
        allowClear: true

    });
    $('#branchA').html(dropdownList);
    $("#branchA").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
    $('#branchF').html(dropdownList);
    $("#branchF").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
    $('#mbranch').html(dropdownList);
    $("#mbranch").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
}
branches();
$("#callStatus").select2({
    placeholder: 'Select Call Status',
    allowClear: true,
    dropdownParent: $('#fullwindowModal')
});

// const getAllClients = () => {
//     $.ajax({
//         url: url + 'getAllcustomers.php',
//         type: 'POST',
//         dataType: 'json',
//         success: function(response) {
//             if (response.Responsecode == 200) {
//                 const cust = response.Data;
//                 cust.forEach(customer => {
//                     customers.set(customer.clientId, customer);
//                 });
//             }
//         }
//     });
// };
// getAllClients();
// const listCustomers = customers => {
//     $('#appT').hide();
//     $('#customerT').show();
//     $('#customerTable').dataTable().fnDestroy();
//     $('#customerData').empty();
//     var tblData = '';
//     customers.forEach(customer => {
//         tblData += '<tr><td>' + customer.firstName + ' ' + customer.lastName + '</td>';
//         tblData += '<td>' + customer.email + '</td>';
//         tblData += '<td>' + getAge(customer.dateOfBirth) + '</td>';
//         tblData += '<td>' + customer.mobile + '</td>';
//         tblData += '<td>' + customer.stateName + ',' + customer.cityName + '</td>';
//         tblData += '<td><div class="table-actions" style="text-align: left;">';
//         tblData += '<a href="#" onclick="editCustomer(' + (customer.clientId) + ')" title="Edit call details"><i class="ik ik-edit-2 text-blue"></i></a>';
//         tblData += '</div></td></tr>';
//     });
//     $('#customerData').html(tblData);
//     $('#customerTable').dataTable({
//         searching: true,
//         retrieve: true,
//         bPaginate: $('tbody tr').length > 10,
//         order: [],
//         columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
//         dom: 'Bfrtip',
//         buttons: ['copy', 'csv', 'excel', 'pdf'],
//         destroy: true
//     });
// };
const getAppointments = (fromDate, uptoDate, branchId, flag) => {
    $.ajax({
        url: url + 'getAllCalls.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branchId, flag: flag },
        success: function(response) {
            appointments.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    appointments.set(response.Data[i].callId, response.Data[i]);
                }
            }
            listAppointment(appointments);
        }
    });
};

const listAppointment = calls => {
    $('#appointmentT').dataTable().fnDestroy();
    $('#appointmentD').empty();
    var tblData = '';
    for (let k of calls.keys()) {
        let call = calls.get(k);
        var badge = '',
            st = '';
        if (call.folowupNeeded == 1) {
            badge = '<td><span class="badge badge-success">Yes</span></td>';
        } else {
            badge = '<td></td>';
        }
        if (call.callStatus == 1) {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        } else if (call.callStatus == 2) {
            st = '<td><span class="badge badge-warning">Close</span></td>';
        } else {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        }
        tblData += '<tr><td>' + call.firstName + ' ' + call.lastName + '</td>';
        tblData += '<td>' + call.username + '</td>';
        tblData += '<td>' + call.branchName + '</td>';
        tblData += '<td>' + getAge(call.dateOfBirth) + '</td>';
        tblData += '<td>' + call.mobile + '</td>';
        tblData += '<td>' + call.appointment + '</td>';
        tblData += badge;
        tblData += st;
        tblData += '<td>' + call.folowupNeededDateTime + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editCall(\'' + (k) + '\',1)" title="Edit call details"><i class="ik ik-edit-2 text-blue"></i></a>';
        tblData += '<a href="#" onclick="takeFeedback(\'' + (k) + '\',1)" title="Take Feedback"><i class="ik ik-message-circle" style="color:purple"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="takeAppointment(' + (call.mobile) + ')" title="Take appointment"><i class="ik ik-info" style="color:purple"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#appointmentD').html(tblData);
    $('#appointmentT').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAppointments(data.today, data.today, data.branchId, 1);
$('#myAppointments').click();


function takeAppointment(mobile) {
    $.ajax({
        url: url + 'checkpatientexist.php',
        type: 'POST',
        dataType: 'json',
        data: { mobile: mobile,suserid:data.userId,
            susername:data.username },
        success: function(response) {
            if (response.Responsecode == 200) {
                patientId_ap = response.Data.patientId;
                $('#appointment').modal('show');
            }else{
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
            }
        }
    }); 
}
const getAllCalls = (fromDate, uptoDate, branchId) => {
    $.ajax({
        url: url + 'getAbsentCallList.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branchId },
        success: function(response) {
            calls.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    calls.set(response.Data[i].callId, response.Data[i]);
                }
            }
            listCalls(calls);
        }
    });
};
const getFollowuplist = (fromDate, uptoDate, branchId) => {
    $.ajax({
        url: url + 'getFollowupcall.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branchId },
        success: function(response) {
            follwups.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    follwups.set(response.Data[i].callId, response.Data[i]);
                }
            }
            listfollowup(follwups);
        }
    });
};
getFollowuplist(data.today, data.today);
const listfollowup = calls => {
    $('#folloT').dataTable().fnDestroy();
    $('#folloD').empty();
    var tblData = '';
    for (let k of calls.keys()) {
        let call = calls.get(k);
        var badge = '',
            st = '';
        if (call.folowupNeeded == 1) {
            badge = '<td><span class="badge badge-success">Yes</span></td>';
        } else {
            badge = '<td></td>';
        }
        if (call.callStatus == 1) {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        } else if (call.callStatus == 2) {
            st = '<td><span class="badge badge-warning">Close</span></td>';
        } else {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        }
        tblData += '<tr><td>' + call.firstName + ' ' + call.lastName + '</td>';
        tblData += '<td>' + call.username + '</td>';
        tblData += '<td>' + call.branchName + '</td>';
        tblData += '<td>' + getAge(call.dateOfBirth) + '</td>';
        tblData += '<td>' + call.mobile + '</td>';
        tblData += '<td>' + getDate(call.appointmentDate) + '</td>';
        tblData += badge;
        tblData += st;
        tblData += '<td>' + call.folowupNeededDateTime + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editCall(\'' + (k) + '\',3)" title="Edit call details"><i class="ik ik-edit-2 text-blue"></i></a>';
        tblData += '<a href="#" onclick="takeFeedback(\'' + (k) + '\',3)" title="Take Feedback"><i class="ik ik-message-circle" style="color:purple"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#folloD').html(tblData);
    $('#folloT').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
const listCalls = calls => {
    $('#absentT').dataTable().fnDestroy();
    $('#absentD').empty();
    var tblData = '';
    for (let k of calls.keys()) {
        let call = calls.get(k);
        var badge = '',
            st = '';
        if (call.folowupNeeded == 1) {
            badge = '<td><span class="badge badge-success">Yes</span></td>';
        } else {
            badge = '<td></td>';
        }
        if (call.callStatus == 1) {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        } else if (call.callStatus == 2) {
            st = '<td><span class="badge badge-warning">Close</span></td>';
        } else {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        }
        tblData += '<tr><td>' + call.firstName + ' ' + call.lastName + '</td>';
        tblData += '<td>' + call.username + '</td>';
        tblData += '<td>' + call.branchName + '</td>';
        tblData += '<td>' + getAge(call.dateOfBirth) + '</td>';
        tblData += '<td>' + call.mobile + '</td>';
        tblData += '<td>' + getDate(call.appointmentDate) + '</td>';
        tblData += badge;
        tblData += st;
        tblData += '<td>' + call.folowupNeededDateTime + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editCall(\'' + (k) + '\',4)" title="Edit call details"><i class="ik ik-edit-2 text-blue"></i></a>';
        tblData += '<a href="#" onclick="takeFeedback(\'' + (k) + '\',4)" title="Take Feedback"><i class="ik ik-message-circle" style="color:purple"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#absentD').html(tblData);
    $('#absentT').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};


const editCall = (callId, param) => {
    callId = callId.toString();
    up_callId = callId;
    var call;
    caseParam = param;
    switch (param) {
        case 1:
            call = appointments.get(callId);
            break;
        case 2:
            call = work.get(callId);
            break;
        case 3:
            call = follwups.get(callId);
            break;
        case 4:
            call = calls.get(callId);
            break;
    }
    console.log(call);
    clientId = call.clientId;
    $('.ud').show();
    getAllCallFollowup(up_callId);
    $('#s2').hide();
    fill_data(call);
};

function takeFeedback(callId) {
    up_callId = callId;
    getAllCallFollowup(up_callId);
    $('#takeFeedback').modal('show');
}

function callRegister() {
    $("#callRegister").validate({
        ignore: [],
        rules: {
            fromDate: {
                required: true,
            },
            uptoDate: {
                required: true
            },
        },
        messages: {
            fromDate: {
                required: "Select from Date"
            },
            uptoDate: {
                required: "Select upto Date"
            },
        }
    });
    var returnVal = $("#callRegister").valid();
    if (returnVal) {
        var branch = null;
        var fromDate = moment($('#fromDate').val()).format('YYYY-MM-DDTHH:mm:ss');
        var uptoDate = moment($('#uptoDate').val()).format('YYYY-MM-DDTHH:mm:ss');

        if ($('#branch').val() != '') {
            branch = $('#branch').val();
        }
        getAppointments(fromDate, uptoDate, branch);
    }
}

function myWork() {
    $("#myWork").validate({
        ignore: [],
        rules: {
            mfoDate: {
                required: true,
            },
            mupDate: {
                required: true
            },
        },
        messages: {
            mfoDate: {
                required: "Select from Date"
            },
            mupDate: {
                required: "Select upto Date"
            },
        }
    });
    var returnVal = $("#myWork").valid();
    if (returnVal) {
        var branch = null;
        var fromDate = moment($('#mfoDate').val()).format('YYYY-MM-DD');
        var uptoDate = moment($('#mupDate').val()).format('YYYY-MM-DD');
        if ($('#mbranch').val() != '') {
            branch = $('#mbranch').val();
        }
        getMyWork(fromDate, uptoDate, branch);
    }
}

function followupList() {
    $("#followuplist").validate({
        ignore: [],
        rules: {
            folDate: {
                required: true,
            },
            foluDate: {
                required: true
            },
        },
        messages: {
            folDate: {
                required: "Select from Date"
            },
            foluDate: {
                required: "Select upto Date"
            },
        }
    });
    var returnVal = $("#followuplist").valid();
    if (returnVal) {
        var fromDate = moment($('#folDate').val()).format('YYYY-MM-DD');
        var uptoDate = moment($('#foluDate').val()).format('YYYY-MM-DD');
        var branchId = null;
        if ($('#branchA').val() != '') {
            branchId = $('#branchA').val();
        }
        getFollowuplist(fromDate, uptoDate, branchId);
    }
}

function fill_data(call) {
    $('#firstName').val(call.firstName);
    $('#middleName').val(call.middleName);
    $('#lastName').val(call.lastName);
    $('#birthdate').val(call.dateOfBirth);
    $('#gender').val(call.gender).trigger('change');
    $('#emailId').val(call.email);
    $('#mobile').val(call.mobile);
    $('#landline').val(call.landline);
    $('#country').val(call.country).trigger('change');
    $('#state').val(call.state).trigger('change');
    $('#city').val(call.city).trigger('change');
    $('#zipcode').val(call.pincode);
    $('#nearByArea').val(call.nearByArea);
    $('#reference').val(call.reference).trigger('change');
    $('#feedback').val(call.feedback);
    $('#branchId').val(call.branchId).trigger('change');
    $('#desease').val(call.disease);
    $('#appointmentDate').val(call.appointmentDate);
    $('#remarks').val(call.remarks);
    $('#userId').val(call.doctorId).trigger('change');
    // console.log(moment().format(call.folowupNeededDateTime.DATETIME_LOCAL));
    $('#callStatus').val(call.callStatus).trigger('change');
    $('#follwupdate').val(call.follow);
    if (call.folowupNeeded == 1) {
        $('#folowupNeeded').prop('checked', true);
    }
    $('#new').hide();
    $('#update').show();
    $('#fullwindowModal').modal('show');
}

function searchOldCalls() {
    var mobileNumber = $('#semobile').val();
    $.ajax({
        url: url + 'getSearchCall.php',
        type: 'POST',
        dataType: 'json',
        data: { mobile: mobileNumber },
        success: function(response) {
            existCall.clear();
            $('#sTable').dataTable().fnDestroy();
            $('#sData').empty();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                var tblData = '',
                    call = {},
                    badge, new_obj;
                for (var i = 0; i < count; i++) {
                    call = response.Data[i];
                    existCall.set(response.Data[i].callId, response.Data[i]);
                    badge = '';
                    if (call.folowupNeeded == 1) {
                        badge = '<td><span class="badge badge-success">Yes</span></td>';
                    } else {
                        badge = '<td></td>';
                    }
                    tblData += '<tr><td>' + response.Data[i].firstName + ' ' + response.Data[i].lastName + '</td>';
                    tblData += '<td>' + getAge(response.Data[i].dateOfBirth) + '</td>';
                    tblData += '<td>' + response.Data[i].mobile + '</td>';
                    tblData += '<td>' + response.Data[i].city + ' ' + response.Data[i].state + '</td>';
                    tblData += '<td>' + getDate(response.Data[i].appointmentDate) + '</td>';
                    tblData += badge;
                    tblData += '<td>' + getDate(response.Data[i].folowupNeededDateTime) + '</td>';
                    tblData += '<td><div class="table-actions" style="text-align: left;">';
                    tblData += '<a href="#" onclick="renameCall(' + response.Data[i].callId + ')" title="Edit product details"><i class="ik ik-edit-2 text-blue"></i></a>';
                    tblData += '</div></td></tr>';

                }
                $('#sData').html(tblData);
                $('#sTable').dataTable({
                    searching: true,
                    retrieve: true,
                    bPaginate: $('tbody tr').length > 10,
                    order: [],
                    columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf'],
                    destroy: true
                });

            }
        }
    });
}

function renameCall(callId) {
    callId = callId.toString();
    up_callId = callId;
    let call = existCall.get(callId);
    clientId = call.clientId;
    fill_search_data(call);
}

function newCall() {
    clientId = null;
    up_callId = null;
    $('#new').show();
    $('#update').hide();
    $('.ud').hide();
    $('#s2').show();
    $('.select2').val('').trigger('change');
    $('#callForm').trigger('reset');
    $('#fullwindowModal').modal('show');
}

function absentList() {
    $("#absentList").validate({
        ignore: [],
        rules: {
            foDate: {
                required: true,
            },
            upDate: {
                required: true
            },
        },
        messages: {
            foDate: {
                required: "Select from Date"
            },
            upDate: {
                required: "Select upto Date"
            },
        }
    });
    var returnVal = $("#absentList").valid();
    if (returnVal) {
        var fromDate = moment($('#foDate').val()).format('YYYY-MM-DD');
        var uptoDate = moment($('#upDate').val()).format('YYYY-MM-DD');
        var branchId = null;
        if ($('#branchA').val() != '') {
            branchId = $('#branchA').val();
        }
        getAllCalls(fromDate, uptoDate, branchId);

    }
}
getAllCalls(data.today, data.today);

function fill_search_data(call) {
    $('#firstName').val(call.firstName);
    $('#middleName').val(call.middleName);
    $('#lastName').val(call.lastName);
    $('#birthdate').val(call.dateOfBirth);
    $('#gender').val(call.gender).trigger('change');
    $('#emailId').val(call.email);
    $('#mobile').val(call.mobile);
    $('#landline').val(call.landline);
    $('#country').val(call.country).trigger('change');
    $('#state').val(call.state).trigger('change');
    $('#city').val(call.city).trigger('change');
    $('#zipcode').val(call.pincode);
    $('#nearbyarea').val(call.nearByArea);
    $('#reference').val(call.reference).trigger('change');
    $('#branchId').val(call.branchId).trigger('change');
    $('#desease').val(call.disease);
    $('#appointmentDate').val(call.appointmentDate);
    $('#remarks').val(call.remarks);
    $('#userId').val(call.doctorId).trigger('change');
    $('#follwupdate').val(call.folowupNeededDateTime);
    $('#clientId').val(call.clientId);
    $('#fullwindowModal').modal('show');
}
const getMyWork = (fromDate, uptoDate, branchId) => {
    $.ajax({
        url: url + 'getMywork.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branchId },
        success: function(response) {
            work.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    work.set(response.Data[i].callId, response.Data[i]);
                }
            }
            listWork(work);
        }
    });
};
getMyWork(data.today, data.today);
const listWork = calls => {
    $('#workT').dataTable().fnDestroy();
    $('#workD').empty();
    var tblData = '';
    for (let k of calls.keys()) {
        let call = calls.get(k);
        var badge = '',
            st = '';
        if (call.folowupNeeded == 1) {
            badge = '<td><span class="badge badge-success">Yes</span></td>';
        } else {
            badge = '<td></td>';
        }
        if (call.callStatus == 1) {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        } else if (call.callStatus == 2) {
            st = '<td><span class="badge badge-warning">Close</span></td>';
        } else {
            st = '<td><span class="badge badge-success">Idle</span></td>';
        }
        tblData += '<tr><td>' + call.firstName + ' ' + call.lastName + '</td>';
        tblData += '<td>' + call.username + '</td>';
        tblData += '<td>' + call.branchName + '</td>';
        tblData += '<td>' + getAge(call.dateOfBirth) + '</td>';
        tblData += '<td>' + call.mobile + '</td>';
        tblData += '<td>' + call.appointment + '</td>';
        tblData += badge;
        tblData += st;
        tblData += '<td>' + call.folowupNeededDateTime + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editCall(\'' + (k) + '\',2)" title="Edit call details"><i class="ik ik-edit-2 text-blue"></i></a>';
        tblData += '<a href="#" onclick="takeFeedback(\'' + (k) + '\',2)" title="Take Feedback"><i class="ik ik-message-circle" style="color:purple"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#workD').html(tblData);
    $('#workT').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};