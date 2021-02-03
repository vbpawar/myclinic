$('#adviceMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#adviceMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('adviceId',adviceId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updateAdvice.php',
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
                    $('#adviceNew').empty();
                    $('#adData').show();
                    advice.set(response.Data.adviceId, response.Data);
                    listAdvice(advice);
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