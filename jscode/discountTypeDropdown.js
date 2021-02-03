
var userroleList=null;
function mapDiscount() {
    var dropdownList = '<option></option>';
    for (let k of discountTy.keys()) {
        // console.log(userRole.get(k));
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
        tags:true,
        dropdownParent: $('#discountMasterForm')
    });
});

// get table Id
//'<option value='+k+'>' 