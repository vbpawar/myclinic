var patientName = new Map();

function getPatientName() {
    $.ajax({
        url: url + 'getPatientsName.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        patientName.set(response.Data[i].patientId, response.Data[i].firstName);
                        

                    }
                }
            }
        }
    });
}
getPatientName();