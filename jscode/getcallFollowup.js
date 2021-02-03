var followupes = new Map();
var followup_details = {};

var getAllCallFollowup = (callId) => {
    $.ajax({
        url: url + 'getCallFollowup.php',
        type: 'POST',
        dataType: 'json',
        data: { callId: callId },
        success: function(response) {
            followupes.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    followupes.set(response.Data[i].callFollowupsId, response.Data[i]);
                }
            }
            listFollowup(followupes);
        }
    });
};

var listFollowup = followupes => {
    $('#followTable').dataTable().fnDestroy();
    $('#callFollData').empty();

    $('#followTablee').dataTable().fnDestroy();
    $('#callFollDatae').empty();
    var tblData = '';
    for (let k of followupes.keys()) {
        let followup = followupes.get(k);
        tblData += '<tr><td>' + followup.callId + '</td>';
        tblData += '<td>' + followup.followUp + '</td>';
        tblData += '<td>' + followup.followUpDateTime + '</td>';
        tblData += '<td>' + followup.attendedBy + '</td></tr>';
    }
    $('#callFollData').html(tblData);
    $('#followTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        destroy: true
    });

    $('#callFollDatae').html(tblData);
    $('#followTablee').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        destroy: true
    });
};