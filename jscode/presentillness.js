$(document).on('submit', '#presentillnessform', function(e) {
    e.preventDefault();
    var returnVal = $("#presentillnessform").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('patientId', global_patientId);
        fData.append('visitDate', global_date);
        fData.append('doctorId', data.userId);

        $.ajax({
            url: url + 'insertpresentIllness.php',
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
                    if (editP == 1) {
                        if (presentill.has(uPresent)) {
                            presentill.delete(uPresent);
                            editP = 0;
                        }
                    }
                    $('#presentillnessform').trigger('reset');
                    $('#presentIllnessId').modal('hide');
                    presentill.set(response.Data.onAssesmentId, response.Data);
                    showPresentillness(presentill);
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