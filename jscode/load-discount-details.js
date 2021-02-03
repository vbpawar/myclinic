function show_details(discountId) {
    let package = discount.get(discountId);
    $('#pName').html(package.ClassType);
    $('#pCost').html(package.branchName);
    $('#disTitle').val(package.ClassType);
    $('#branch').val(package.branchId).trigger('change');
    if (package.details != null) {
        listDetails(package.details);
    }
}
Branches(data.role,data.franchiseid,data.branchId);
$("#branch").select2({
    placeholder: 'Select branch',
    allowClear: true
});
show_details(udiscount);
mapDiscounts(discounts);

function mapDiscounts(discounts) {
    var dropdownList = '<option></option>';
    for (let k of discounts.keys()) {
        let discount = discounts.get(k);
        dropdownList += '<option value="' + k + '">' + discount.discountType + ' (' + discount.discount + '%)</option>';
    }
    $('#discountType').html(dropdownList);
    $("#discountType").select2({
        placeholder: 'Select discount type',
        allowClear: true
    });
}

function listDetails(details) {
    $('#packageTest').dataTable().fnDestroy();
    $('#packageTestData').empty();
    var tblData = '';
    var count = details.length;
    for (var i = 0; i < count; i++) {
        tblData += '<tr id="' + details[i].Id + '"><td>' + (i + 1) + '</td><td>' + details[i].discountType + '</td>';
        tblData += '<td>' + details[i].discount + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="removeTest(' + details[i].Id + ')" title="Remove Discount"><i class="ik ik-trash"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#packageTestData').html(tblData);
    $('#packageTest').dataTable({
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




function addTest() {
    $("#addPackageDetails").validate({
        ignore: [],
        rules: {
            discountType: {
                required: true,
            }
        },
        messages: {
            discountType: {
                required: "Select from list"
            }
        }
    });
    var returnVal = $("#addPackageDetails").valid();
    if (returnVal) {
        const details = {
            discountId: $('#discountType').val(),
            classId: udiscount,
            suserid:data.userId,
            susername:data.username
        };
        $.ajax({
            url: url + 'addDiscountmap.php',
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
                    let package = discount.get(udiscount);
                    package.details = response.Data.details;
                    discount.set(udiscount, package);
                    listDetails(package.details);
                    $('#discountType').val('').trigger('change');
                }
            }
        });
    }
}

function removeTest(classId) {
    swal({
            title: "Are you sure?",
            text: 'To remove discount type from this class',
            icon: "warning",
            buttons: ["Cancel", 'Remove Now'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                classId = classId.toString();
                $.ajax({
                    url: url + 'removeDiscountMap.php',
                    type: 'POST',
                    data: { Id: classId,suserid:data.userId,
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
                        $("#packageTest tr#" + classId + "").remove();
                    }
                });
            }
        });
}

function Branches(role,franchiseid,branchid) {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let m =  branch.get(k);
        if(role == 9 || role == 5){
            dropdownList += '<option value="' + k + '"><b>'+ m.franchisename+'</b>-' + m.branchName+ '</option>';
        }else if(role == 6 || role == 8){
            if(franchiseid == m.franchiseid){
            dropdownList += '<option value="' + k + '">'+ m.branchName+ '</option>';
            }
        }else{
            if(branchid == m.branchId){
            dropdownList += '<option value="' + k + '">' + m.branchName+ '</option>';
            }
        }
    }
    $('#branch').html(dropdownList);
}