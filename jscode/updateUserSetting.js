$('#usersettingForm').on('submit', function(e) {
    // console.log(e);
    e.preventDefault();
    var returnVal = $("#usersettingForm").valid();
    if (returnVal) {
        var fData = new FormData(this);

        fData.append('userId', data.userId);

        $.ajax({
            url: url + 'userSettingUpdate.php',
            type: 'POST',
            data: fData,
            processData: false,
            contentType: false,
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
                if(response.Data!=null){
                    users.set(response.Data.userId, response.Data);
                }
                $('#usersettingForm').trigger('reset');

                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                    // alert(response.Message);
                }
            }
        });
    }
});