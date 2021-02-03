$(function() {
        var jvalidate = $("#medicineTypeMasterForm").validate({
            ignore: [],
            rules: {
                type: {
                    required: true 
                }
            },
            messages: {
                type: {
                    required: "Please Enter the type of Medicine" 
                }
            }
        });
    }

);