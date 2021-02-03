$('#dosageMasterForm').on('submit', function(e) {
    e.preventDefault();       
    var returnVal = $("#dosageMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'insert_dosage_Master.php',
            type: 'POST',
            data: fData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.Responsecode == 200) {
                    
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                    $('#cButton').click();
                    $('#dosageMasterForm').trigger('reset');
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
