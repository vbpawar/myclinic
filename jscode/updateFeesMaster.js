$('#feesMasterForm').on('submit', function(e) {
    // console.log(e);
    e.preventDefault();
   
        var fData = new FormData(this);
        console.log(fData);
        fData.append('feesId',feesId_np);
   
   

        $.ajax({
            url: url + 'update_FeesMaster.php',
            type: 'POST',
            data: fData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    // alert(response.Message);
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                    $('#editfeesNew').empty();
                    $('#newFees').show();
                    feess.set(response.Data.feesId, response.Data);
                    listFees(feess);

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
    
});