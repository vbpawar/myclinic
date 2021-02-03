$('#epatientDetails').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#epatientDetails").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('patientId', global_patientId);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updatePatients.php',
            type: 'POST',
            data: fData,
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
                    // $('#editProfile').empty();
                    // $('#tData').show();
                    patients.set(response.Data.patientId, response.Data);
                    //listPatients(patients);
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
});