$('#take-appointment').on('submit', function(e) {
    e.preventDefault();
    var fData = {
        appointmentDate: moment($('#dropper-min-year').val()).format('YYYY-MM-DD HH:mm:ss'),
        userId: $('#userId').val(),
        patientId: patientId_ap,
        scheduledBy: data.username,
        suserid:data.userId,
        susername:data.username
    };
    $.ajax({
        url: url + 'addAppointment.php',
        type: 'POST',
        data: fData,
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

            } else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
            }
            $('#appointment').modal('hide');
            $('#take-appointment').trigger('reset');
            $('#userId').val('').trigger('change');
        }
    });
});