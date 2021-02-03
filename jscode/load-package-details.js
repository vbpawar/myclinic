var package_branches = new Map();
var package_tests = new Map();
loadTestPackage();
mapBranches(data.franchiseid);
function show_details(packageId) {
    let package = packages.get(packageId);
    $('#pName').html(package.title);
    $('#packageName').val(package.title);
    $('#pCost').html(parseFloat(package.cost).toLocaleString());
    $('#packageCost').val(package.cost);
    $('#pDetails').html(package.details);
    $('#packageDetails').val(package.details);
    if (package.isActive == 1) {
        package.isActive = 'active';
        $('#isActivet').prop('checked', true);
    } else {
        package.isActive = 'inactive';
        $('#isActivef').prop('checked', true);
    }
    $('#pActive').html(package.isActive);
}
show_details(packageId_u);
show_package_barnch(packageId_u);
show_package_test(packageId_u);

function show_package_barnch(packageId) {
    $.ajax({
        url: url + 'list-packageBranches.php',
        type: 'POST',
        data: { packageId: packageId },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                var n = response.Data.length;
                for (var i = 0; i < n; i++) {
                    package_branches.set(response.Data[i].mapId, response.Data[i]);
                }
            }
            list_package_branches(package_branches);
        }
    });
}

function list_package_branches(package_branches) {
    $('#branchPackage').dataTable().fnDestroy();
    $('#branchData').empty();
    var tblData = '';
    for (let k of package_branches.keys()) {
        let data = package_branches.get(k);
        tblData += '<tr><td>' + data.branchName + '</td>';
        tblData += '<td>' + data.packageDiscount + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="removeBranchPackage(' + k + ')" title="Remove Branch"><i class="ik ik-trash"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#branchData').html(tblData);
    $('#branchPackage').dataTable({
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

function editpackdetails(Id) {
    console.log(Id);
}

function addPackagetoBranch() {
    $("#addpackagebranch").validate({
        ignore: [],
        rules: {
            branchId: {
                required: true,
            },
            packageDiscount: {
                required: true,
                number: true,
                min: 0,
                max: 99
            },
        },
        messages: {
            branchId: {
                required: "Select from list"
            },
            packageDiscount: {
                required: "Please enter quota",
                number: 'Enter only digits',
                min: 'Minimum discount is 0%',
                max: 'Maximum discount can not exceed 99%'
            },
        }
    });
    var returnVal = $("#addpackagebranch").valid();
    if (returnVal) {
        const details = {
            branchId: $('#branchId').val(),
            packageDiscount: $('#packageDiscount').val(),
            packageId: packageId_u,
            suserid:data.userId,
            susername:data.username
        };
        $.ajax({
            url: url + 'addPackage-branchMapping.php',
            type: 'POST',
            data: details,
            dataType: 'json',
            success: function(response) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                if (response.Responsecode == 200) {
                    package_branches.set(response.Data.mapId, response.Data);
                    $('#branchId').val('').trigger('change');
                    $('#packageDiscount').val('');
                }
                list_package_branches(package_branches);
            }
        });
    }
}

function show_package_test(packageId) {
    $.ajax({
        url: url + 'list-packageTest.php',
        type: 'POST',
        data: { packageId: packageId },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                var n = response.Data.length;
                for (var i = 0; i < n; i++) {
                    package_tests.set(response.Data[i].itemId, response.Data[i]);
                }
            }
            list_package_test(package_tests);
        }
    });
}

function list_package_test(package_tests) {
    $('#packageTest').dataTable().fnDestroy();
    $('#packageTestData').empty();
    var tblData = '';
    for (let k of package_tests.keys()) {
        let data = package_tests.get(k);
        tblData += '<tr><td>' + data.testName + '</td>';
        tblData += '<td>' + data.fees + '</td>';
        tblData += '<td>' + data.quota + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="removeTest(' + k + ')" title="Remove Test"><i class="ik ik-trash"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#packageTestData').html(tblData);
    $('#packageTest').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}

function addTest() {
    $("#addPackageDetails").validate({
        ignore: [],
        rules: {
            test: {
                required: true,
            },
            packageQuota: {
                required: true,
                number: true,
                min: 0
            },
        },
        messages: {
            test: {
                required: "Select from list"
            },
            packageQuota: {
                required: "Please enter quota",
                number: 'Enter only digits',
                min: 'Enter valid quota'
            },
        }
    });
    var returnVal = $("#addPackageDetails").valid();
    if (returnVal) {
        const details = {
            testId: $('#test').val(),
            quota: $('#packageQuota').val(),
            packageId: packageId_u,
            suserid:data.userId,
            susername:data.username 
        };
        $.ajax({
            url: url + 'addPackage-test.php',
            type: 'POST',
            data: details,
            dataType: 'json',
            success: function(response) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                if (response.Responsecode == 200) {
                    package_tests.set(response.Data.itemId, response.Data);
                    $('#test').val('').trigger('change');
                    $('#packageQuota').val('');
                }
                list_package_test(package_tests);
            }
        });
    }
}

function removeTest(testId) {
    swal({
            title: "Are you sure?",
            text: 'To remove procedures from this package',
            icon: "warning",
            buttons: ["Cancel", 'Remove Now'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                testId = testId.toString();
                $.ajax({
                    url: url + 'removePackageTest.php',
                    type: 'POST',
                    data: { itemId: testId,suserid:data.userId,
                        susername:data.username },
                    dataType: 'json',
                    success: function(response) {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: response.Message,
                            button: false,
                            timer: 1500
                        });
                        if (response.Responsecode == 200) {
                            package_tests.delete(testId);
                        }
                        list_package_test(package_tests);
                    }
                });
            }
        });
}

function removeBranchPackage(mapId) {
    mapId = mapId.toString();
    swal({
            title: "Are you sure?",
            text: 'To remove this package from branch',
            icon: "warning",
            buttons: ["Cancel", 'Remove Now'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'removePackageBranch.php',
                    type: 'POST',
                    data: { mapId: mapId },
                    dataType: 'json',
                    success: function(response) {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: response.Message,
                            button: false,
                            timer: 1500
                        });
                        if (response.Responsecode == 200) {
                            package_branches.delete(mapId);
                        }
                        list_package_branches(package_branches);
                    }
                });
            }
        });
}