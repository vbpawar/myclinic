$('#callrefferedByForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#callrefferedByForm").valid();
    if (returnVal) {
        var fData = new FormData(this);
        $.ajax({
            url: url + 'insertCallReff.php',
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
                    $('#callrefferedByForm').trigger('reset');
                    $('#exampleModalNew').modal('hide');
                    reference.add(response.Data.reference);
                    loadReferences();

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