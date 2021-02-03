function packagedropdown() {
    var dropDownList = '<option></option>';
    packageList.forEach((value, key) => {
        dropDownList += "<option value=" + key + ">" + value.title + "</option>";
    });
    $('#packageId').html(dropDownList);
    $('#packageId').select2({
        placeholder: 'Select Package from list',
        allowClear: true,
        dropdownParent: $('#packageAssign')
    });
}
packagedropdown();

function packageDetails(packageId) {
    let package = packageList.get(packageId);
    if (packageList.has(packageId)) {
        $('#package-title').html(package.title);
        $('#package-details').html(package.details);
        $('#package-cost').html(package.cost);
        var tbldata = '';
        if (package.packagedetails != null) {
            var count = package.packagedetails.length;
            for (var i = 0; i < count; i++) {
                tbldata += '<tr><td>' + package.packagedetails[i].testName + '</td>';
                tbldata += '<td>' + package.packagedetails[i].quota + '</td>';
                tbldata += '</tr>';
            }
        }
        $('#testData').html(tbldata);
    }
}

$('#assignPackage').on('submit', function(e) {
    e.preventDefault();
    $("#assignPackage").validate({
        ignore: [],
        rules: {
            packageId: {
                required: true,
            },
            packageDuration: {
                required: true,
                number: true
            },
            isActive: {
                required: true
            }
        },
        messages: {
            packageId: {
                required: "Select from list"
            },
            packageDiscount: {
                required: "Please enter package duration",
                number: 'Enter only digits',
            },
            isActive: {
                required: 'Select Package status'
            }
        }
    });
    var returnVal = $("#assignPackage").valid();
    if (returnVal) {
        var fdata = new FormData(this);
        fdata.append('patientId', global_patientId);
        fdata.append('packageCost', parseFloat($('#package-cost').text()));
        fdata.append('userId', data.userId);
        fdata.append('branchId', data.branchId);
        $.ajax({
            url: url + 'addpatientPackage.php',
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
                    $('#assignPackage').trigger('reset');
                    $('#packageId').val('').trigger('change');
                    $('#packageAssign').modal('hide');
                    $('#testData').empty();
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
    }
});