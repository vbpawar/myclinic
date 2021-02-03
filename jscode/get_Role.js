var userRole = new Map();

function getUserRole() {
    $.ajax({
        url: url + 'getUserRoleType.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        userRole.set(response.Data[i].roleId, response.Data[i].role);
                    }
                }
            }
        }
    });
}
getUserRole();