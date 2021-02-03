$('#refferedByForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#refferedByForm").valid();
    if (returnVal) {
    var fData = new FormData(this);
    $.ajax({
        url: url + 'insertReferringMaster.php',
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
                $('#refferedByForm').trigger('reset');
                $('#exampleModal').modal('hide');
                refName.set(response.Data.refferId, response.Data);
                loadReffName(refName);

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