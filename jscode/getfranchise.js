var franchise = new Map();

function getfranchise() {
    $.ajax({
        url: url + 'getfranchise.php',
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        franchise.set(response.Data[i].franchiseid, response.Data[i].franchisename);
                    }
                }
            }
        }
    });
}
getfranchise();