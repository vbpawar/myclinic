$('#complaintMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#complaintMasterForm").valid();
    if (returnVal) {
        var fdata = new FormData(this);
        fdata.append('suserid',data.userId);
        fdata.append('susername',data.username);
        $.ajax({
            url: url + 'insertComplaints.php',
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
                    $('#cButton').click();
                    $('#complaintMasterForm').trigger('reset');
                    complaint.set(response.Data.complaintId, response.Data);
                      listcomplaint(complaint);

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
