var franchise = new Map();
var franchiseid = null;
var franchdetails = {};
function getfranchise() {
    $.ajax({
        url: url + 'getfranchise.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        franchise.set(response.Data[i].franchiseid, response.Data[i]);
                    }
                    listFranchise(franchise); 
                }
            }
        }
    });
}


var listFranchise = franchise => {
    $('#bTable').dataTable().fnDestroy();
    $('#branchData').empty();
    var tblData = '';

    for (let k of franchise.keys()) {
        let franch = franchise.get(k);
        tblData += '<tr><td>' + franch.franchiseid + '</td>';
        tblData += '<td><b>' + franch.franchisename + '<b></td>';
        tblData += '<td>' + franch.contactperson + '</td>';
        tblData += '<td>' + franch.contactnumber + '</td>';
        tblData += '<td>' + franch.emailid + '</td>';
        tblData += '<td>' + franch.created + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editBranch(' + (k) + ')" title="Edit Franchise details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="removefranchise(' + (k) + ')" title="remove franchise"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="downloadreport(' + (k) + ')" title="Download report"><i class="ik ik-menu text-purple"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#branchData').html(tblData);
    $('#bTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getfranchise();
const editBranch = (branchId) => {
    branchId = branchId.toString();
    franchdetails = franchise.get(branchId);
    franchiseid = branchId;
    $('#newData').hide();
    $('#editbranchNew').empty();
    $('#editbranchNew').load('edit-franchise.php');
};


var removefranchise = branchId => {
    branchId = branchId.toString();
    let branch = franchise.get(branchId);
    let fdata = {
        franchiseid: branchId,
        username:branch.franchisename,
        susername:data.username,
        suserid:data.userId
    };
    swal({
            title: "Are you sure?",
            text: 'Do you really want to remove this franchise?',
            icon: "warning",
            buttons: ["Cancel", 'Delete Now'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'removefranchise.php',
                    type: 'POST',
                    data: fdata,
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            franchise.delete(branchId);
                            listFranchise(franchise);
                            swal({
                                text: response.Message,
                                icon: "success"
                            });

                        }
                    }
                });
            }
        });
};

function goback() {
    $('#newData').show();
    $('#editbranchNew').empty();
}

function downloadreport(franchiseid){
    window.open('franchise-reports.php?franchiseid='+franchiseid,'_blank');
}