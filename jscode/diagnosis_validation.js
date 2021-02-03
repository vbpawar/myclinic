$(function() {
        var jvalidate = $("#diagnosisMasterForm").validate({
            ignore: [],
            rules: {
                diagnosis: {
                    required: true 
                }
            },
            messages: {
                diagnosis: {
                    required: "Please Enter Diagnosis Name" 
                }
            }
        });
    }

);