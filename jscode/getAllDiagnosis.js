var diagnosis = [];

function getDiagnosis() {
    $.ajax({
        url: url + 'getAllDiagnosis.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        diagnosis.push(response.Data[i].diagnosis);
                    }
                }
            }
        }
    });
}
getDiagnosis();