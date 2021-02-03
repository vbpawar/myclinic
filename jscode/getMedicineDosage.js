var medicineDosage = new Set();

function getMedicinesDosage() {
    $.ajax({
        url: url + 'getAllMedicineDosage.php',
        type: 'POST',
        dataType: 'json',
        async:false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        medicineDosage.add(response.Data[i].dosage);
                    }
                }

            }
        }
    });
}
getMedicinesDosage();