var getPatientAppointments = (patientId) => {
    $.ajax({
        url: url + 'getpatientAppointments.php',
        type: 'POST',
        data: { patientId: patientId },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                $('#cApp').dataTable().fnDestroy();
                $('#cAppData').empty();
                var tblData = '';
                for (var i = 0; i < count; i++) {

                    tblData += '<tr id="appointmentId' + response.Data[i].appointmentId + '"><td>' + getDate(response.Data[i].appointmentDate) + '</td>';
                    tblData += '<td>' + response.Data[i].username + '</td>';
                    tblData += '<td>' + response.Data[i].scheduledBy + '</td>';
                    tblData += '<td><div class="table-actions" style="text-align: left;">';
                    tblData += '<a href="#" class="list-delete" onclick="removeAppointment(' + response.Data[i].appointmentId + ')" title="Remove appointment"><i class="ik ik-trash text-red"></i></a>';
                    tblData += '</div></td></tr>';
                }
                $('#cAppData').html(tblData);
                $('#cApp').dataTable({
                    searching: true,
                    retrieve: true,
                    bPaginate: $('tbody tr').length > 10,
                    order: [],
                    columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf'],
                    destroy: true
                });

            }
        }
    });
};

var removeAppointment = appointmentId => {
    swal({
            title: "Are you sure?",
            text: "Do you really want to Cancel this appointment?",
            icon: "warning",
            buttons: ["Cancel", "Cancel Now"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'removeAppointment.php',
                    type: 'POST',
                    data: { appointmentId: appointmentId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            swal({
                                text: "Appointment Cancel Successfully",
                                icon: "success"
                            });
                            $("#appointmentId" + appointmentId).remove();
                        }
                    }
                });
            } else {
                swal("Appointment is not cancel");
            }
        });
};