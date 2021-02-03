var medicineTypes = new Set();

function getMedicinesTypes() {
    $.ajax({
        url: url + 'getAllMedicinesType.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        medicineTypes.add(response.Data[i].type);
                    }
                }

            }
        }
    });
}
getMedicinesTypes();