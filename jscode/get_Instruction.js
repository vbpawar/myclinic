var instruction = new Map();

function getInstruction() {
    $.ajax({
        url: url + 'getAllInstruction.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        instruction.set(response.Data[i].instructionId, response.Data[i].instruction);
                    }
                }
            }
        }
    });
}
getInstruction();