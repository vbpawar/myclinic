var packageList = new Map();

function getPackage() {
    $.ajax({
        url: url + 'packageListDetails.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        packageList.set(response.Data[i].packageId, response.Data[i]);
                    }
                }
            }
        }
    });
}
getPackage();