var auditlog = new Map();

const getlog = () => {
    $('#mTypeTable').dataTable().fnDestroy();
    $('#mTypeData').empty();
    var tblData = '';
    $.ajax({
        url: url + 'getauditlog.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    tblData += '<tr><td style="width:5%;">'+(i+1)+'</td>';
                    tblData += '<td style="width:50%;">' + response.Data[i].message + '</td>';
                    tblData += '<td>' +response.Data[i].ipaddress + '</td>';
                    tblData += '<td>' +response.Data[i].created + '</td></tr>';
                }
                $('#mTypeData').html(tblData);
                $('#mTypeTable').dataTable({
                    searching: true,
                    retrieve: true,
                    bPaginate: $('tbody tr').length > 10,
                    order: [],
                    columnDefs: [{ orderable: false, targets: [0, 1, 2] }],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf'],
                    destroy: true
                });
            }
        }
    });
};
getlog();