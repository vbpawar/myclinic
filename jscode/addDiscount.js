$('#packageForm').on('submit', function(e) {
    e.preventDefault();
    $("#packageForm").validate({
        ignore: [],
        rules: {
            discountTitle: {
                required: true

            },
            branchId: {
                required: true
            }

        },
        messages: {
            discountTitle: {
                required: "Please enter Discount Title"

            },
            branchId: {
                required: "Select from list"
            }

        }
    });
    var returnVal = $("#packageForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'addDiscountClass.php',
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
                    $('#packageForm').trigger('reset');
                    $('#discountTitle').val('').trigger('change');
                    $('#demoModal').modal('hide');
                    discount.set(response.Data.Id, response.Data);
                    listDiscount(discount);
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