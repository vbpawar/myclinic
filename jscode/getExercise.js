var exercise = new Map();

function getExercise() {
    $.ajax({
        url: url + 'getExercisedata.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        exercise.set(response.Data[i].id, response.Data[i]);
                    }
                }
            }
        }
    });
}
getExercise();