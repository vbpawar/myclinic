var instructions = new Map();

function getInstructions() {
    $.ajax({
        url: url + 'getInstructions.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        instructions.set(response.Data[i].instruction, response.Data[i]);
                    }
                }

            }
        }
    });
}
getInstructions();