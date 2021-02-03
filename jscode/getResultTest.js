var labTestName = new Map();

function getLabTest() {
    $.ajax({
        url: url + 'getResultTest.php',
        type: 'POST',
        async : false,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        labTestName.set(response.Data[i].TestId, response.Data[i].TestName);
                    }
                }
            }
        }
    });
}
getLabTest();