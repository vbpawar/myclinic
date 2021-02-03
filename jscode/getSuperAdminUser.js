var users = new Map();

function getUsers() {
    $.ajax({
        url: url + 'getAllSuperAdmin.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        users.set(response.Data[i].userId, response.Data[i]);
                    }
                }
            }
        }
    });
}
getUsers();