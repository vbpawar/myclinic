$('#dosageMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#dosageMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('dosageId',dosageId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updateDosageMaster.php',
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
                    $('#doseNew').empty();
                    $('#dosRecord').show();
                    dosageM.set(response.Data.dosageId, response.Data);
                    listDosage(dosageM);
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