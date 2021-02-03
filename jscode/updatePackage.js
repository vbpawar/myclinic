$('#updatePackage').on('submit', function(e) {
    e.preventDefault();
    var fdata = new FormData(this);
    fdata.append('packageId', packageId_u);
    fdata.append('suserid',data.userId);
    fdata.append('susername',data.username);
    $.ajax({
        url: url + 'updatePackage.php',
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
                packages.set(response.Data.packageId, response.Data);
                listPackages(packages);
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