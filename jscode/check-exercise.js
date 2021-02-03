check_exercise(u_patientId, u_appointmentId);

function check_exercise(patientId, appointmentId) {
    let patient = appointments.get(appointmentId);
    $.ajax({
        url: url + 'get-todayExercise.php',
        type: 'POST',
        dataType: 'json',
        data: { patientId: patientId, visitDate: patient.appointment },
        success: function(response) {
            if (response.Responsecode == 200) {
                fill_exist_exercise(response.Data);
            } else {
                initial_exercise();
            }
            //fetch_previous_exercise(u_patientId);
        }
    });
}

function fill_exist_exercise(response) {
    var count = response.length;
    var rowid = 1,
        medical = null,
        newOption = null;
    global_exercise = response[0].visitDate;
    for (var i = 0; i < count; i++) {
        addExercise();
        medical = response[i];
        if ($('#exerciseTitle' + rowid).find("option[value='" + medical.title + "']").length) {
            $('#exerciseTitle' + rowid).val(medical.title).trigger('change');
        } else {
            newOption = new Option(medical.title, medical.title, true, true);
            $('#exerciseTitle' + rowid).append(newOption).trigger('change');
        }
        let src = "upload/exercise/" + medical.id + ".jpg";
        $('#exercisePic' + rowid).attr("src", src);
        $('#exerciseDetails' + rowid).val(medical.details);
        $('#exerciseSteps' + rowid).val(medical.steps);
        rowid++;
    }
}

// function fetch_previous_exercise(u_patientId) {
//     $.ajax({
//         url: url + 'getAllPrescriptions.php',
//         type: 'POST',
//         dataType: 'json',
//         data: { patientId: u_patientId },
//         success: function(response) {
//             if (response.Responsecode == 200) {
//                 fill_prev(response.Data);
//             }
//         }
//     });
// }

// function fill_prev(response) {
//     var count = response.length;
//     for (var i = 0; i < count; i++) {
//         var tblData = '',
//             tbody = '';
//         tblData += '<div class="card">';
//         tblData += '<div class="card-header"><h3 class="d-block w-100"> ' + getDate(response[i].visitDate) + '</h3></div>';
//         tblData += '<div class="card-body">';
//         tblData += '<div class="row invoice-info">';
//         tblData += '<div class="col-sm-6">';
//         tblData += '<div><h5 class="d-block w-100"> Branch: ';
//         tblData += response[i].branchName;
//         tblData += '</h5></div> </div> <div class="col-sm-6">';
//         tblData += '<div><h5 class="d-block w-100"> Doctor: ';
//         tblData += response[i].username;
//         tblData += '</h5></div> </div> </div>';
//         tblData += '<div class="row invoice-info">';
//         tblData += '<div class="col-sm-6 invoice-col">';
//         tblData += '<div class="alert alert-secondary mt-20">Complaints: ';
//         tblData += response[i].complaint;
//         tblData += '</div> </div> <div class="col-sm-6 invoice-col">';
//         tblData += '<div class="alert alert-secondary mt-20">Diagnosis: ';
//         tblData += response[i].diagnosis;
//         tblData += '</div> </div> </div> <div class="row">';
//         tblData += '<div class="col-12 table-responsive"> <table class="table"> <thead> ';
//         tblData += ' <th>Type</th><th>Medicine</th> <th>Morning</th><th>Afternoon</th><th>Night</th><th>Duration</th><th>Inst</th>  </tr> </thead>';
//         if (response[i].medicines != null) {
//             var n = response[i].medicines.length;
//             for (var j = 0; j < n; j++) {
//                 tbody += '<tr><td>' + response[i].medicines[j].type + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].name + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].morning + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].evining + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].night + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].period + '</td>';
//                 tbody += '<td>' + response[i].medicines[j].instruction + '</td></tr>';
//             }
//         }
//         tblData += '<tbody>' + tbody;
//         tblData += ' </tbody> </table></div></div>';
//         tblData += ' <div class="row"> <div class="col-6"> <p class="lead">Next Visit Date ' + getDate(response[i].nextVisitDate) + '</p>';
//         tblData += ' <div class="alert alert-secondary mt-20">Remark: ' + response[i].advice + '  </div>   </div>';
//         tblData += ' <div class="col-6"> </div>  </div>';
//         tblData += ' <div class="row no-print"> <div class="col-12">';
//         // tblData += '<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>';
//         tblData += '<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="print_prscription(\'' + response[i].patientId + '\',\'' + response[i].doctorId + '\',\'' + response[i].visitDate + '\')"><i class="fa fa-download"></i>Print</button>';
//         tblData += ' </div>  </div>  </div> </div>';
//         $('#prevData').append(tblData);
//     }
// }