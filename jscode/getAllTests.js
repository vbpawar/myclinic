var test = new Map();

function getTest() {
    $.ajax({
        url: url + 'getAllTest.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        test.set(response.Data[i].testId, response.Data[i]);
                    }
                }
            }
        }
    });
}
getTest();