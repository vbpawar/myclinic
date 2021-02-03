var packages = new Map();
var packageId_u = null;

function getPackages() {
    $.ajax({
        url: url + 'getAllPackages.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        packages.set(response.Data[i].packageId, response.Data[i]);
                    }
                }
            }
            listPackages(packages);
        }
    });
}
getPackages();

const listPackages = packages => {
    $('#pTable').dataTable().fnDestroy();
    $('#packageData').empty();
    var tblData = '',
        badge;
    var i = 0;
    for (let k of packages.keys()) {
        let package = packages.get(k);
        badge = '';
        if (package.isActive == 1) {
            badge = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge = '<td><span class="badge badge-warning">inactive</span></td>';
        }
        tblData += '<tr><td>' + (++i) + '</td><td>' + package.title + '</td>';
        tblData += '<td>' + parseFloat(package.cost).toLocaleString() + '</td>';
        tblData += '<td>' + package.details + '</td>';
        tblData += badge;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" class="ik edit"  onclick="editPackage(' + (k) + ')" title="View Package Details"><i class="fas fa-window-restore text-purple"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivate(' + (k) + ')" title="Active/inactive package"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#packageData').html(tblData);
    $('#pTable').dataTable({
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

const editPackage = packageId => {
    packageId = packageId.toString();
    packageId_u = packageId;
    let package = packages.get(packageId);
    $('#package').hide();
    $('#loadPackage').load('edit-package.php');
};

var addPackage = () => {
    $('#demoModal').modal('show');
};

var inactivate = packageId => {
    packageId = packageId.toString();
    let package = packages.get(packageId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (package.isActive == 1) {
        package.isActive = 0;
        msg = 'Do you really want to in activate this package?';
        btn = 'Deactivate Now';
        msg1 = 'Package Deactvated';
    } else {
        package.isActive = 1;
        msg = 'Do you really want to  activate this package?';
        btn = 'Activate Now';
        msg1 = 'Package Activated';
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
                    url: url + 'packageActivation.php',
                    type: 'POST',
                    data: { packageId: packageId,
                        suserid:data.userId,
                        susername:data.username },
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            packages.set(packageId, package);
                            listPackages(packages);
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

const goback = () => {
    $('#loadPackage').empty();
    $('#package').show();
};