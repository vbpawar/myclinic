$('#Result_Form').on('submit', function(e) {
    // console.log(e);
    e.preventDefault();
           
    var returnVal = $("#Result_Form").valid();
    if (returnVal) {
        var fData = new FormData(this);


        $.ajax({
            url: url + 'insertlabTest.php',
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
                   
                    $('#Result_Form').trigger('reset');
                    $('.select2').val('').trigger('change');
               
                    $('#ResultModal').modal('hide');
                    tests.set(response.Data.labId, response.Data);
                     listResults(tests);

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
