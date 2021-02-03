$('#updatePackage').on('submit', function(e) {
    e.preventDefault();
    var fdata = new FormData(this);
    fdata.append('Id', udiscount);
    fdata.append('suserid',data.userId);
    fdata.append('susername',data.username);
    $.ajax({
        url: url + 'updateDiscount.php',
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
                if (discount.has(udiscount)) {
                    let package = discount.get(udiscount);
                    package.ClassType = response.Data.ClassType;
                    package.branchName = response.Data.branchName;
                    discount.set(udiscount, package);
                    listDiscount(discount);
                }
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
});