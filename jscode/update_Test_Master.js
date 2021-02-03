$('#testMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#testMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('testId',testId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updateTestMaster.php',
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
                    $('#TestNew').empty();
                    $('#testDiagnosisData').show();
                  testes.set(response.Data.testId, response.Data);
                  listTest(testes);
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