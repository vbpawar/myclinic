$(function() {
        var jvalidate = $("#adviceMasterForm").validate({
            ignore: [],
            rules: {
                advice: {
                    required: true 
                }
            },
            messages: {
                advice: {
                    required: "Please Enter Advice Name" 
                }
            }
        });
    }

);