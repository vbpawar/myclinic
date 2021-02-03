var branch = new Map();

function getBranch() {
    $.ajax({
        url: url + 'getAllBranch.php',
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        branch.set(response.Data[i].branchId, response.Data[i]);
                    }
                }
            }
        }
    });
}
getBranch();