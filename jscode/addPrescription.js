function storeTblValues() {
    var TableData = [];
    $('#prescriptionTbl tr').each(function(row, tr) {
        var typeId = $(tr).find('td:eq(0) select').val();
        var medicineId = $(tr).find('td:eq(1) select option:selected').text();
        var morning = $(tr).find('td:eq(2) select').val();
        var evining = $(tr).find('td:eq(3) select').val();
        var night = $(tr).find('td:eq(4) select').val();
        var duration = $(tr).find('td:eq(5) input').val();
        var inst = $(tr).find('td:eq(6) select option:selected').text();
        if (medicineId != '') {
            TableData[row] = {
                "typeId": typeId,
                "medicineId": medicineId,
                "morning": morning,
                "evining": evining,
                "night": night,
                "duration": duration,
                "inst": inst

            };
        }
    });
    TableData.shift();
    return TableData;
}

function savePrescription() {
    var prescriptionData = {
        medicinesDetails: storeTblValues(),
        remarks: $('#adviceId').val(),
        complaints: $('#complaintsId').val(),
        diagnosis: $('#diagnosis').val(),
        patientId: u_patientId,
        doctorId: data.userId,
        nextvisit: $('#nextVisitDate').val(),
        visitDate: pres_date,
        pulse: $('#pulse').val(),
        height: $('#height').val(),
        weight: $('#weight').val(),
        west: $('#west').val(),
        hip: $('#hip').val(),
        temp: $('#temp').val(),
        spo2: $('#spo2').val(),
        bp: $('#bp').val()
    };
    prescriptionData = JSON.stringify(prescriptionData);
    $.ajax({
        url: url + 'addPrescription.php',
        type: 'POST',
        data: { postdata: prescriptionData },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                $('<form action="prescription-print.php" method="POST" target="_blank"><input type="hidden" name="pflag" value="' + lang_flag + '" /><input type="hidden" name="ppatientId" value="' + response.patientId + '" /><input type="hidden" name="pdoctorId" value="' + response.doctorId + '" /><input type="hidden" name="pvisitDate" value="' + response.vdate + '" /></form>').appendTo('body').submit();
                // window.open('prescription-print.php?flag=' + lang_flag + '&patientId=' + response.patientId + '&doctorId=' + response.doctorId + '&visitDate=' + response.vdate);
            } else {
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

function print_prscription(patientId, doctorId, visitDate) {
    $('<form action="prescription-print.php" method="POST" target="_blank"><input type="hidden" name="pflag" value="' + lang_flag + '" /><input type="hidden" name="ppatientId" value="' + patientId + '" /><input type="hidden" name="pdoctorId" value="' + doctorId + '" /><input type="hidden" name="pvisitDate" value="' + visitDate + '" /></form>').appendTo('body').submit();
    //window.open('prescription-print.php?flag=' + lang_flag + '&patientId=' + patientId + '&doctorId=' + doctorId + '&visitDate=' + visitDate);
}