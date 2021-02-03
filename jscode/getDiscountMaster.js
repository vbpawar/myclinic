var discounts = new Map();
var discount_details = {};
var discountId_np = {};

var global_date = moment().format('YYYY-MM-DD');
const getAllDiscount = () => {
    $.ajax({
        url: url + 'getDiscountMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    discounts.set(response.Data[i].discountId, response.Data[i]);
                }
         
                listDiscount(discounts);
            }
        }
    });
};

const listDiscount = discounts => {
    $('#disTable').dataTable().fnDestroy();
    $('#discountData').empty();
    var tblData = '';
    for (let k of discounts.keys()) {
        let discount = discounts.get(k);
        badge1 = '';
        if (discount.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        // tblData += '<tr><td>' + discount.discountId + '</td>';
       tblData += '<tr><td>' + discount.discountType + '</td>';
      
        tblData += '<td>' + discount.discount + '</td>';
        tblData += '<td>' + discount.createdAt + '</td>';
        // tblData += '<td>' + discount.branchId + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editDiscount(' + (k) + ')" title="Edit Discount details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateDiscount(' + (k) + ')" title="Active/inactive Discount"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }

    $('#discountData').html(tblData);
    $('#disTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllDiscount();

const editDiscount = (discountId) => {
    discountId = discountId.toString();
    discount_details = discounts.get(discountId);
    discountId_np = discountId;
    $('#newFees').hide();
    $('#editfeesNew').load('edit_discount_master.php');
};
function gobackDiscount(){
    $('#newFees').show();
    $('#editfeesNew').empty();
}

var inactivateDiscount = discountId => {
    discountId = discountId.toString();
    let discount = discounts.get(discountId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (discount.isActive == 1) {
        discount.isActive = 0;
        msg = 'Do you really want to in activate this Discount?';
        btn = 'Deactivate Now';
        msg1 = 'Discount Deactivated';
    } else {
        discount.isActive = 1;
        msg = 'Do you really want to  activate this Discount?';
        btn = 'Activate Now';
        msg1 = 'Discount Activated';
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
                    url: url + 'discountActivation.php',
                    type: 'POST',
                    data: {discountId: discountId, suserid:data.userId,
                        susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            discounts.set(discountId, discount);
                            listDiscount(discounts);
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

var userroleList=null;
function mapDiscount() {
    var dropdownList = '<option></option>';
    for (let k of discountTy.keys()) {
        dropdownList += '<option>' + discountTy.get(k) + '</option>';
    }
    $('#discountType').html(dropdownList);
    userroleList = dropdownList;
}
$(document).ready(function() {
    mapDiscount();
    $("#discountType").select2({
        placeholder: 'Select Discount Type',
        allowClear: true,
        dropdownParent: $('#discountMasterForm')
    });
});
