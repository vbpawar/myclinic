var refName = new Map();

function getReffName() {
    $.ajax({
        url: url + 'getReferredBy.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        refName.set(response.Data[i].refferId, response.Data[i]);
                    }
                }
            }
        }
    });
}

getReffName();