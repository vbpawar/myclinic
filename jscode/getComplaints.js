var complaints = [];

function getComplaints() {
    $.ajax({
        url: url + 'getAllcomplaints.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        complaints.push(response.Data[i].complaint);
                    }
                }
            }
        }
    });
}
getComplaints();