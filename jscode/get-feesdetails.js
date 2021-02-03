var fees_data = new Map();

function fees_details() {
    $.ajax({
        url: url + 'getFeesData.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        fees_data.set(response.Data[i].feesId, response.Data[i]);
                    }
                }
                console.log(fees_data);

            }
        }
    });
}
fees_details();