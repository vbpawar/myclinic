var city = new Map();

function getCities() {
    $.ajax({
        url: url + 'getALlCities.php',
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function(response) {
            
            if (response.Responsecode == 200) {
                console.log(response);
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        city.set(response.Data[i].id, response.Data[i].name);
                    }
                }
            }
        }
    });
}
getCities();