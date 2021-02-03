var discounts = new Map();

function getDiscounts(branchId) {
    $.ajax({
        url: url + 'getDiscounts.php',
        type: 'POST',
        dataType: 'json',
        data: { branchId: branchId },
        success: function(response) {
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        discounts.set(response.Data[i].discountId, response.Data[i]);
                    }
                }
            }
            mapDiscounts(discounts);
        }
    });
}

function mapDiscounts(discounts) {
    var dropdownList = '<option></option>';
    for (let k of discounts.keys()) {
        let discount = discounts.get(k);
        dropdownList += '<option value="' + k + '">' + discount.discountType + '</option>';
    }
    $('#discountType').html(dropdownList);
    $("#discountType").select2({
        placeholder: 'Select discount type',
        allowClear: true
    });
}