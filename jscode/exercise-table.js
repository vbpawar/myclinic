var exerciseRow = 0;
var exerciseHtml = "";
var global_exercise = moment().format('YYYY-MM-DD');

function initial_exercise() {
    for (var i = 0; i < 3; i++) {
        addExercise();
    }
}

function addExercise() {
    exerciseRow += 1;
    exerciseHtml = "";
    exerciseHtml += '<tr id="rowExer' + exerciseRow + '">';
    exerciseHtml += '<td>';
    exerciseHtml += '<select class="form-control exercise" id="exerciseTitle' + exerciseRow + '" name="exerciseTitle' + exerciseRow + '" onchange="fillExercise(this.value,' + exerciseRow + ')">';
    exerciseHtml += '</select>';
    exerciseHtml += '</td>';
    exerciseHtml += '<td style="width: 8px;"><img src="upload/exercise/2.jpg" id="exercisePic' + exerciseRow + '" class="img-rounded img" alt="Upload" style="height:80px; width:120px"></td>';
    exerciseHtml += '<td>';
    exerciseHtml += '<input type="text" class="form-control exrow" id="exerciseDetails' + exerciseRow + '" name="exerciseDetails' + exerciseRow + '"/>';
    exerciseHtml += '</td>';
    exerciseHtml += '<td >';
    exerciseHtml += '<textarea rows="2" col="2" class="form-control exesteps" id="exerciseSteps' + exerciseRow + '" name="exerciseSteps' + exerciseRow + '"></textarea>';
    exerciseHtml += '</td>';
    exerciseHtml += '<td>';
    exerciseHtml += '<button type="button" class="btn btn-icon btn-danger" onclick="removeExercise(' + exerciseRow + ')" title="Remove Medicine"><i class="ik ik-minus"></i></button>';
    exerciseHtml += '</td>';
    exerciseHtml += '</tr>';

    $("#exerciseData").prepend(exerciseHtml);
    loadExercise(exerciseRow);
    $("#exerciseTitle" + exerciseRow).select2({
        placeholder: 'Select exercise',
        width: "100%",
        allowClear: true,
        tags: true
    });
}

function removeExercise(id) {
    $("#rowExer" + id).remove();
}

function loadExercise(id) {
    var dropDownList = '<option></option>';
    exercise.forEach((value, key) => {
        dropDownList += "<option value=" + key + ">" + value.title + "</option>";
    });
    $('#exerciseTitle' + id).html(dropDownList);
}

function fillExercise(exerciseId, rowId) {
    if (exercise.has(exerciseId)) {
        let data = exercise.get(exerciseId);
        let src = "upload/exercise/" + exerciseId + ".jpg";
        $('#exercisePic' + rowId).attr("src", src);
        $('#exerciseDetails' + rowId).val(data.details);
    }
}

function storeExercise() {
    var TableData = [];
    $('#exerciseTable tr').each(function(row, tr) {
        var exerciseId = $(tr).find('td:eq(0) select option:selected').text();
        var details = $(tr).find('td:eq(2) input').val();
        var steps = $(tr).find('td:eq(3) textarea').val();
        if (exerciseId != '') {
            TableData[row] = {
                "exerciseId": exerciseId,
                "details": details,
                "steps": steps
            };
        }
    });
    TableData.shift();
    return TableData;
}

function saveExercise() {
    var exerciseData = {
        exercise: storeExercise(),
        patientId: u_patientId,
        doctorId: data.userId,
        visitDate: global_exercise
    };
    exerciseData = JSON.stringify(exerciseData);
    $.ajax({
        url: url + 'addExercise-prescription.php',
        type: 'POST',
        data: { postdata: exerciseData },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                $('<form action="exercise_print.php" method="POST" target="_blank"><input type="hidden" name="patientId" value="' + response.patientId + '" /><input type="hidden" name="doctorId" value="' + response.doctorId + '" /><input type="hidden" name="visitDate" value="' + response.vdate + '" /></form>').appendTo('body').submit();
                //window.open('exercise_print.php?patientId=' + response.patientId + '&doctorId=' + response.doctorId + '&visitDate=' + response.vdate);
            } else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
            }
        }
    });
}