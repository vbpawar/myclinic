var exercise = new Map();
var exercise_details = {};
var exercise_ap = null;

const getAllExercise = () => {
    $.ajax({
        url: url + 'getExercisedata.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    exercise.set(response.Data[i].id, response.Data[i]);
                }

                listexercise(exercise);
            }
        }
    });
};

const listexercise = exercise => {
    $('#exeTable').dataTable().fnDestroy();
    $('#exeData').empty();
    var tblData = '';
    for (let k of exercise.keys()) {
        let exe = exercise.get(k);
        badge = '';
        if (exe.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }

        // tblData += '<tr><td>' + exe.id + '</td>';
        tblData += '<tr><td><img src="upload/exercise/' + exe.id + '.jpg" class="img-rounded" alt="Upload" style="height:60px; width:120px"></td>';
        tblData += '<td>' + exe.title + '</td>';
        tblData += '<td>' + exe.details + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editExercise(' + (k) + ')" title="Edit Exercise details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateExcercise(' + (k) + ')" title="Active/inactive exercise"><i class="ik ik-info text-purple"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="removeexercise(' + (k) + ')" title="remove exercise"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#exeData').html(tblData);
    $('#exeTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllExercise();

var editExercise = (id) => {
    id = id.toString();
    exercise_details = exercise.get(id);
    exercise_ap = id;
    console.log(exercise_ap);
    $('#exData').hide();
    $('#idEXE').load('edit_exercise_chart.php');

};


var inactivateExcercise = id => {
    id = id.toString();
    let exe = exercise.get(id);
    var msg = '',
        btn = '',
        msg1 = '';
    if (exe.isActive == 1) {
        exe.isActive = 0;
        msg = 'Do you really want to in activate this Exercise?';
        btn = 'Deactivate Now';
        msg1 = 'Exercise Deactivated';
    } else {
        exe.isActive = 1;
        msg = 'Do you really want to  activate this Exercise?';
        btn = 'Activate Now';
        msg1 = 'Exercise Activated';
    }
    swal({
            title: "Are you sure?",
            text: msg,
            icon: "warning",
            buttons: ["Cancel", btn],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'exerciseActivation.php',
                    type: 'POST',
                    data: { id: id,suserid:data.userId,
                        susername:data.username },
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            exercise.set(id, exe);
                            listexercise(exercise);
                            swal({
                                text: msg1,
                                icon: "success"
                            });

                        }
                    }
                });
            }
        });
};

const removeexercise = productId => {
    productId = productId.toString();
    if (exercise.has(productId)) {
        var product = exercise.get(productId);
            swal({
                    title: "Are you sure?",
                    text: "Do you really want to delete ?",
                    icon: "warning",
                    buttons: ["Cancel", "Delete Now"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url + 'removeexercise.php',
                            type: 'POST',
                            data: { id: productId,suserid:data.userId,
                                susername:data.username },
                            dataType: 'json',
                            success: function(response) {
                                if (response.Responsecode == 200) {
                                    exercise.delete(productId);
                                    listexercise(exercise);
                                    swal({
                                        title: "Deleted",
                                        text: response.Message,
                                        icon: "success",
                                    });
                                }
                            }
                        })
                    } else {
                        swal("The exercise is not deleted!");
                    }
                });
    }
}
function gobackCo() {
    $('#exData').show();
    $('#idEXE').empty();
}