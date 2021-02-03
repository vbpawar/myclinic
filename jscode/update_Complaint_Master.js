$('#complaintMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#complaintMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('complaintId',complaintId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'updateComplaints.php',
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
                    $('#complaintNew').empty();
                    $('#complaintsData').show();
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