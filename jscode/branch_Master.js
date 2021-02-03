var branches = new Map();
var branch_details = {};
var branchId_ap = null;
var global_date = moment().format('YYYY-MM-DD');
var franchiselist = null;
const getAllBranches = () => {
    $.ajax({
        url: url + 'getAllBranchMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    branches.set(response.Data[i].branchId, response.Data[i]);
                }
                listBranches(branches);
            }
        }
    });
};
const getfranchisebranch = (franchiseid) => {
    $.ajax({
        url: url + 'getfranchisebranch.php',
        type: 'POST',
        dataType: 'json',
        data:{franchiseid:franchiseid},
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    branches.set(response.Data[i].branchId, response.Data[i]);
                }

                listBranches(branches);
            }
        }
    });
};

const listBranches = branches => {
    $('#bTable').dataTable().fnDestroy();
    $('#branchData').empty();
    var tblData = '',
        actbutton;

    for (let k of branches.keys()) {
        let branch = branches.get(k);
        actbutton = '';


        if (branch.isActive == 1 || branch.isActive == '1') {
            actbutton = '<td><span class="badge badge-success">active</span></td>';
        } else {
            actbutton = '<td><span class="badge badge-warning">inactive</span></td>';
        }

        tblData += '<tr><td>' + branch.branchId + '</td>';
        tblData += '<td>' + branch.branchName + '</td>';
        tblData += '<td>' + branch.branchAddress + '</td>';
        tblData += '<td>' + branch.mobile1 + '</td>';
        tblData += '<td><b>' + branch.franchisename  + '<b></td>';
        tblData += actbutton;

        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editBranch(' + (k) + ')" title="Edit branch details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivatebranch(' + (k) + ')" title="Active/inactive branch"><i class="ik ik-trash text-danger"></i></a>';

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

const editBranch = (branchId) => {
    branchId = branchId.toString();
    branch_details = branches.get(branchId);
    branchId_ap = branchId;
    $('#newData').hide();
    $('#editbranchNew').empty();
    $('#editbranchNew').load('edit_Branch_Profile.php');
};


var inactivatebranch = branchId => {
    branchId = branchId.toString();
    let branch = branches.get(branchId);
    let branchdetails = {
         branchId: branchId ,
            branchName:branch.branchName,
            susername:data.username,
            suserid:data.userId
    };
    var msg = '',
        btn = '',
        msg1 = '';
    if (branch.isActive == 1) {
        branch.isActive = 0;
        msg = 'Do you really want to Inactivate this branch?';
        btn = 'Deactivate Now';
        msg1 = 'Branch Deactivated';
    } else {
        branch.isActive = 1;
        msg = 'Do you really want to  activate this branch?';
        btn = 'Activate Now';
        msg1 = 'Branch Activated';
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
                    url: url + 'branchActivation.php',
                    type: 'POST',
                    data: branchdetails,
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            branches.set(branchId, branch);
                            listBranches(branches);
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

function goback1() {
    $('#newData').show();
    $('#editbranchNew').empty();
}
function access_role(role){
    if(role == 9 || role == 5){
        getAllBranches();
    }else{
        getfranchisebranch(data.franchiseid);
    }
}
    access_role(data.role);