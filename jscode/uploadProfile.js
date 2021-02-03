$('#uploadProfile').on('submit', function(e) {
    e.preventDefault();
    var fdata = new FormData(this);
    fdata.append('susername',data.username);
    fdata.append('suserid',data.userId);
    fdata.append('patientId', $('#patientId').val());
    $.ajax({
        url: url + 'updateProfile.php',
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
});