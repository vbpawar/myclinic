$('#patientform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#patientform").valid();
    if (returnVal) {
        // var birthdate = moment($('#dropper-max-year').val()).format('YYYY-MM-DD');
        var fData = new FormData(this);
        fData.append('branchId', data.branchId);
        $.ajax({
            url: url + 'addPatient.php',
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
                    $('#patientform').trigger('reset');
                    $('.select2').val('').trigger('change');
                    $('#cButton').click();
                    patients.set(response.Data.patientId, response.Data);
                    listPatients(patients);


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