$(function() {
        var jvalidate = $("#testMasterForm").validate({
            ignore: [],
            rules: {
                testName: {
                    required: true 
                },
                fees:{
                    required:true
                }
            },
            messages: {
                testName: {
                    required: "Please Enter Test Name" 
                },
                fees:{
                    required: "Please Enter Fees" 
                }
            }
        });
    }

);