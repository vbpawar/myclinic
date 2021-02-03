$(function() {
        var jvalidate = $("#complaintMasterForm").validate({
            ignore: [],
            rules: {
                complaint: {
                    required: true 
                }
            },
            messages: {
                complaint: {
                    required: "Please Enter complaint Name" 
                }
            }
        });
    }

);