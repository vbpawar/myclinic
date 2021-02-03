$('#medicineTypeMasterForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#medicineTypeMasterForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        fData.append('medicineTypeId',medicineTypeId_ap);
        fData.append('suserid',data.userId);
        fData.append('susername',data.username);
        $.ajax({
            url: url + 'update_MedicineType.php',
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
                    $('#editMedNew').empty();
                    $('#meTypeRecord').show();
                    medicineType.set(response.Data.medicineTypeId, response.Data);
                    listMType(medicineType);
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