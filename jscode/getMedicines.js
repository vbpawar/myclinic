var medicines = new Map();

function getMedicines() {
    $.ajax({
        url: url + 'getAllMedicines.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        medicines.set(response.Data[i].medicineId, response.Data[i]);
                    }
                }
            }
        }
    });
}
getMedicines();