var packages = new Map();
var packageId_u = null;
var packageDetail = null;

function getPackages(patientId) {
    $.ajax({
        url: url + 'getPatientPackages.php',
        type: 'POST',
        dataType: 'json',
        data: { patientId: patientId },
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        packages.set(response.Data[i].pId, response.Data[i]);
                    }
                }
            }
            listPackages(packages);
        }
    });
}
getPackages(patient_details.patientId);

var listPackages = packages => {
    $('#packageDetails').dataTable().fnDestroy();
    $('#packageData').empty();
    var tblData = '',
        badge;
    packages.forEach(package => {
        badge = '';
        if (package.isActive == 1) {
            badge = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge = '<td><span class="badge badge-warning">inactive</span></td>';
        }
        tblData += '<tr><td>' + package.title + '</td>';
        tblData += '<td>' + parseFloat(package.packageCost).toLocaleString() + '</td>';
        tblData += '<td>' + package.packageDuration + '</td>';
        tblData += '<td>' + package.expirayDate + '</td>';
        tblData += '<td>' + package.purchaseDate + '</td>';
        tblData += badge;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" class="ik edit"  onclick="editPackage(' + (package.pId) + ')" title="View Package Details"><i class="fas fa-window-restore text-purple"></i></a>';
        // tblData += '<a href="#" class="ik edit"  onclick="inactivate(' + (package.packageId) + ')" title="Active/inactive package"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    });
    $('#packageData').html(tblData);
    $('#packageDetails').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};

var editPackage = packageId => {
    packageId = packageId.toString();
    packageId_u = packageId;
    let pac = packages.get(packageId);
    packageDetail = pac;
    $('.load-pack').empty();
    $('.s').hide();
    $('.load-pack').load('load-consumption.php');
};

var addPackage = () => {
    $('#packageAssign').modal('show');
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
        msg1 = 'Package Deactivated';
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
                    url: url + 'customerPackageActivation.php',
                    type: 'POST',
                    data: { packageId: packageId },
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