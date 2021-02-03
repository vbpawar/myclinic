$(function() {
    var jvalidate = $("#feesMasterForm").validate({
        ignore: [],
        rules: {
            doctorId: {
                required: true              
            }
        
        },
        messages: {
            doctorId: {
                required: "Please Select Doctor",
              
            }

        }
    });
}

);