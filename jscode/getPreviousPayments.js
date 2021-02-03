var prevTransactions = new Map();

function getPreviousPayments(patientId) {
    $.ajax({
        url: url + 'getPreviousTransactions.php',
        type: 'POST',
        data: { patientId: patientId },
        dataType: 'json',
        success: function(response) {
            prevTransactions.clear();
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        prevTransactions.set(response.Data[i].paymentId, response.Data[i]);
                    }
                }
            }
            list_transactions(prevTransactions);
        }
    });
}

function list_transactions(prevTransactions) {
    $('#tPayment').dataTable().fnDestroy();
    $('#tbPayment').empty();
    var tblData = '',
        total = 0,
        pendingTotal = 0;
    for (let k of prevTransactions.keys()) {
        let data = prevTransactions.get(k);
        total = total + parseFloat(data.total);
        pendingTotal = pendingTotal + parseFloat(data.pending);
        tblData += '<tr><td>' + data.recieptId + '</td>';
        if (data.isPackage == 1) {
            tblData += '<td>Package</td>';
        } else {
            tblData += '<td>OPD</td>';
        }
        tblData += '<td>' + data.username + '</td>';
        tblData += '<td>' + data.originalAmt + '</td>';
        tblData += '<td>' + data.discount + '</td>';
        tblData += '<td>' + data.total + '</td>';
        tblData += '<td>' + data.pending + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="attach_data(' + k + ')" title="Edit Transaction"><i class="ik ik-edit-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#totalP').html(total.toLocaleString());
    $('#pendingTotal').html(pendingTotal.toLocaleString());
    $('#tbPayment').html(tblData);
    $('#tPayment').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}