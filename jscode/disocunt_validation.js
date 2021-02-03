$(function() {
    var jvalidate = $("#discountMasterForm").validate({
        ignore: [],
        rules: {
            discountType: {
                required: true 
            }
          
        },
        messages: {
            discountType: {
                required: "Please Enter Discount Type" 
            }

        }
    });
}

);