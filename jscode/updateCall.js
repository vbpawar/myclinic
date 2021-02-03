function updateCall() {
    var returnVal = $("#callForm").valid();
    if (returnVal) {
        var fdata = {
            callId: up_callId,
            clientId: clientId,
            firstName: $('#firstName').val(),
            middleName: $('#middleName').val(),
            lastName: $('#lastName').val(),
            birthdate: $('#birthdate').val(),
            gender: $('#gender').val(),
            emailId: $('#emailId').val(),
            mobile: $('#mobile').val(),
            landline: $('#landline').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            country: $('#country').val(),
            zipcode: $('#zipcode').val(),
            nearByArea: $('#nearByArea').val(),
            reference: $('#reference').val(),
            branchId: $('#branchId').val(),
            userId: $('#userId').val(),
            desease: $('#desease').val(),
            appointmentDate: $('#appointmentDate').val(),
            remarks: $('#remarks').val(),
            folowupNeeded: $('#folowupNeeded').val(),
            follwupdate: $('#follwupdate').val(),
            attendedBy: data.userId,
            callStatus: $('#callStatus').val(),
            feedback: $('#feedback').val(),
            suserid:data.userId,
            susername:data.username
        };
        $.ajax({
            url: url + 'updateCallcenter.php',
            type: 'POST',
            data: fdata,
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
                    $('#fullwindowModal').modal('hide');
                    $('.select2').val('').trigger('change');
                    $('#callForm').trigger('reset');
                    switch (caseParam) {
                        case 1:
                            appointments.set(response.Data.callId, response.Data);
                            listAppointment(appointments);
                            break;
                        case 2:
                            calls.set(response.Data.callId, response.Data);
                            listCalls(calls);
                            break;
                        case 3:
                            follwups.set(response.Data.callId, response.Data);
                            listfollowup(follwups);
                            break;
                        case 4:
                            calls.set(response.Data.callId, response.Data);
                            listCalls(calls);
                            break;
                    }

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
}