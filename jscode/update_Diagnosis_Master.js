$('#diagnosisMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#diagnosisMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('diagnosisId',diagnosisId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updateDiagnosisMaster.php',
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
                    $('#editdiaNew').empty();
                    $('#diagnosisData').show();
                    diagnosis.set(response.Data.diagnosisId,response.Data);
                    listdiagnosis(diagnosis);
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