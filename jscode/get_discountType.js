var discountTy = new Map();

function getDiscountDetails() {
    $.ajax({
        url: url + 'getDiscountMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                if (response.Data != null) {
                    var n = response.Data.length;
                    for (var i = 0; i < n; i++) {
                        discountTy.set(response.Data[i].discountId, response.Data[i].discountType);
                    }
                }
            }
        }
    });
}
getDiscountDetails();