$('#feesMasterForm').on('submit', function(e) {
    // console.log(e);
    e.preventDefault();
    var returnVal = $("#feesMasterForm").valid();
    if (returnVal) {
    
        var fData = new FormData(this);


        $.ajax({
            url: url + 'insert_Fees_Master.php',
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
                  $('#feesMasterForm').trigger('reset');
                    $('#cButton').click();
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
               
                }
            }
        });
    }
    });
