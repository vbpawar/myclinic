const getlog = (role) => {
    $('#mTypeTable').dataTable().fnDestroy();
    $('#mTypeData').empty();
    var tblData = '';
    $.ajax({
        url: url + 'getcustomerappointments.php',
        type: 'POST',
        data:{branchid:data.branchId,franchiseid:data.franchiseid,role:role},
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    if(data.today == response.Data[i].apdate){
                    tblData += '<tr  style="background-color:purple; color:white;" id="appointmentId' + response.Data[i].appointmentId + '"><td style="width:20%"><b>' + response.Data[i].firstName +' '+response.Data[i].surname +'<b></td>';
                    }else{
                        tblData += '<tr  id="appointmentId' + response.Data[i].appointmentId + '"><td style="width:20%"><b>' + response.Data[i].firstName +' '+response.Data[i].surname +'<b></td>';
                    }
                    tblData += '<td style="width:15%">' +response.Data[i].username + '</td>';
                    tblData += '<td style="width:15%">' +response.Data[i].appointmentdate + '</td>';
                    tblData += '<td style="width:15%">' +response.Data[i].scheduledBy + '</td>';
                    tblData += '<td>' +response.Data[i].franchisename +','+response.Data[i].branchName +'</td>';
                    tblData += '<td style="width:5%"><a href="#" class="list-delete" onclick="removeAppointment(' + response.Data[i].appointmentId + ')" title="Cancel appointment"><i class="ik ik-trash text-red"></i></a></td></tr>';
                }
                $('#mTypeData').html(tblData);
                $('#mTypeTable').dataTable({
                    searching: true,
                    retrieve: true,
                    bPaginate: $('tbody tr').length > 10,
                    order: [],
                    columnDefs: [{ orderable: false, targets: [0, 1, 2,3,4] }],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf'],
                    destroy: true
                });
            }
        }
    });
};
getlog(data.role);
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