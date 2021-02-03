var advice = new Map();
var advice_details = {};
var adviceId_ap = null;

const getAllAdvice = () => {
    $.ajax({
        url: url + 'get_Advice.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    advice.set(response.Data[i].adviceId, response.Data[i]);
                }
                listAdvice(advice);
            }
        }
    });
};

const listAdvice = advice => {
    $('#adviceTable').dataTable().fnDestroy();
    $('#adviceData').empty();
    var tblData = '';
    for (let k of advice.keys()) {
        let ad = advice.get(k);
        badge = '';
        if (ad.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + ad.adviceId + '</td>';
        tblData += '<td>' + ad.advice + '</td>';
        tblData += badge1;
 
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editAdvice(' + (k) + ')" title="Edit advice details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateAdvice(' + (k) + ')" title="Active/inactive Advice"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#adviceData').html(tblData);
    $('#adviceTable').dataTable({
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
getAllAdvice();

const editAdvice = (adviceId) => {
    adviceId = adviceId.toString();
    advice_details = advice.get(adviceId);
    adviceId_ap= adviceId;
    $('#adData').hide();
    $('#adviceNew').load('edit_AdviceMaster.php');

};

var inactivateAdvice = adviceId => {
    adviceId = adviceId.toString();
    let ad = advice.get(adviceId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (ad.isActive == 1) {
        ad.isActive = 0;
        msg = 'Do you really want to in activate this Advice?';
        btn = 'Deactivate Now';
        msg1 = 'Advice Deactivated';
    } else {
        ad.isActive = 1;
        msg = 'Do you really want to  activate this Advice?';
        btn = 'Activate Now';
        msg1 = 'Advice Activated';
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
                    url: url + 'adviceActivation.php',
                    type: 'POST',
                    data: {adviceId: adviceId,suserid:data.userId,
                    susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            advice.set(adviceId,ad);
                            listAdvice(advice);
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
function gobackAdvice(){
    $('#adData').show();
    $('#adviceNew').empty();
}