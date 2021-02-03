// function saveData(){
//     alert('its work');
//     var returnVal = $("#medicalprofileform").valid();
//     if (returnVal) {
//     console.log('e');
//     }
// }

$('#medicalprofileform').on('submit', function(e) {
    console.log(e);
    e.preventDefault();
    var returnVal = $("#medicalprofileform").valid();
    if (returnVal) {
    
        var fData = new FormData(this);
        console.log(fData);
        // fData.serialize();

        // $.ajax({
        //     url: url + 'presentillness.php',
        //     type: 'POST',
        //     data: fData,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     dataType: 'json',
        //     success: function(response) {
        //         if (response.Responsecode == 200) {
        //             swal({
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: response.Message,
        //                 button: false,
        //                 timer: 1500
        //             });
        //             $('#cButton').click();
        //             patients.set(response.Data.patientId, response.Data);
        //             listPatients(patients);

        //         } else {
        //             swal({
        //                 position: 'top-end',
        //                 icon: 'warning',
        //                 title: response.Message,
        //                 button: false,
        //                 timer: 1500
        //             });
        //         }
        //     }
        // });
    }
});