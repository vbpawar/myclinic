var feess = new Map();
var fees_details = {};
var  feesId_np = {};

var global_date = moment().format('YYYY-MM-DD');
const getAllFees = () => {
    $.ajax({
        url: url + 'getAllFeesMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    feess.set(response.Data[i].feesId, response.Data[i]);
                }
         
                listFees(feess);
            }
        }
    });
};

const listFees = feeses => {
    $('#fTable').dataTable().fnDestroy();
    $('#feesData').empty();
    var tblData = '';
    for (let k of feess.keys()) {
        let fees = feess.get(k);
        badge = '';
        if (fees.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + fees.feesType + '</td>';
        tblData += '<td>' + fees.fee + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editFees(' + (k) + ')" title="Edit Fees details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateFees(' + (k) + ')" title="Active/inactive User"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#feesData').html(tblData);
    $('#fTable').dataTable({
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
getAllFees();

const editFees = (feesId) => {
    feesId = feesId.toString();
    fees_details = feess.get(feesId);
    feesId_np = feesId;
    $('#newFees').hide();
    $('#editfeesNew').load('edit_newFees.php');
};


var DocList=null;
function loadUsers() {
    var dropdownList = '<option></option>';
    users.forEach(user => {
            dropdownList += '<option value="' + user.userId + '">' + user.username + '</option>';
    });
//both eor each are useful

    // for (let k of users.keys()) {
    //     var user = users.get(k);
      
    //         dropdownList += '<option value="' + user.userId + '">' + user.username + '</option>';
    // }
   
    $('#userId').html(dropdownList);
    DocList=dropdownList;
  
    $("#userId").select2({
      
        placeholder: 'Choose from list',
        tags : true,
        allowClear:true,
        
        dropdownParent: $('#feesMasterForm'),
    });
}
loadUsers();

var inactivateFees = feesId => {
    feesId = feesId.toString();
    let fees = feess.get(feesId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (fees.isActive == 1) {
        fees.isActive = 0;
        msg = 'Do you really want to in activate this Fees?';
        btn = 'Deactivate Now';
        msg1 = 'Fees Deactivated';
    } else {
        fees.isActive = 1;
        msg = 'Do you really want to  activate this Fees?';
        btn = 'Activate Now';
        msg1 = 'Fees Activated';
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
                    url: url + 'feesActivation.php',
                    type: 'POST',
                    data: {feesId: feesId},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            feess.set(feesId, fees);
                            listFees(feess);
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

function gobackFees(){
    $('#newFees').show();
    $('#editfeesNew').empty();
}