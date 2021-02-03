$('#discountMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#discountMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('discountId', discountId_np);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'update_Discount.php',
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
                    $('#editfeesNew').empty();
                    $('#newFees').show();
                    discounts.set(response.Data.discountId, response.Data);
                    listDiscount(discounts);
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