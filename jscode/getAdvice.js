var advice = [];

function getAdvice() {
    $.ajax({
        url: url + 'get_Advice.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        advice.push(response.Data[i].advice);
                    }
                }
            }
        }
    });
}
getAdvice();