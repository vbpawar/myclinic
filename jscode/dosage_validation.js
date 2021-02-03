$(function() {
        var jvalidate = $("#dosageMasterForm").validate({
            ignore: [],
            rules: {
                dosage: {
                    required: true 
                }
            },
            messages: {
                dosage: {
                    required: "Please Enter dosage Name" 
                }
            }
        });
    }

);