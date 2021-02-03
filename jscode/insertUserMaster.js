$('#userMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#userMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'insert_userMaster.php',
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
                    $('#cButton').click();
                    $('#userMasterForm').trigger('reset');
                    $('.select2').val('').trigger('change');
                    users.set(response.Data.userId, response.Data);
                    listUsers(users);

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
