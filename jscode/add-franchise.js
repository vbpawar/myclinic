$('#branchMasterForm').on('submit', function(e) {
    e.preventDefault();  
    var returnVal = $("#branchMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'addfranchise.php',
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
                    $('#branchMasterForm').trigger('reset');
                    $('#cButton').click();
                    franchise.set(response.Data.franchiseid, response.Data);
                    listFranchise(franchise);
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
