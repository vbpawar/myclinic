$('#callForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#callForm").valid();
    if (returnVal) {
        var fdata = new FormData(this);
        var folloDate = $('#follwupdate').val();
        var follo = moment(folloDate).format("YYYY-MM-DD");
        folloDate = moment(folloDate).format("YYYY-MM-DD HH:mm:ss");
        fdata.append('follwupdate', folloDate);
        fdata.append('attendedBy', data.userId);
        fdata.append('suserid',data.userId);
        fdata.append('susername',data.username);
        var appointmentDate;
        if (appointmentDate != null){
         appointmentDate = moment($('#appointmentDate').val()).format("YYYY-MM-DD");
        }        
        $.ajax({
            url: url + 'addCallcenter.php',
            type: 'POST',
            data: fdata,
            cache: false,
            contentType: false,
            processData: false,
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
                    $('.select2').val('').trigger('change');
                    $('#callForm').trigger('reset');
                    $('#fullwindowModal').modal('hide');
                    if (appointmentDate == global_date) {
                        work.set(response.Data.callId, response.Data);
                        listWork(work);
                    }
                    if (follo == global_date) {
                        follwups.set(response.Data.callId, response.Data);
                        listfollowup(follwups);
                    }
               
                    appointments.set(response.Data.callId, response.Data);
                    listAppointment(appointments);
                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                    $('.select2').val('').trigger('change');
                    $('#callForm').trigger('reset');
                    $('#fullwindowModal').modal('hide');
                    listAppointment(appointments);
                }
            }
        });
    }

});