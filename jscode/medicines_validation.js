$(function() {
        var jvalidate = $("#medicineMasterForm").validate({
            ignore: [],
            rules: {
                name: {
                    required: true 
                },
                type:{
                    required: true 
                },
                morning:{
                    required : true
                },
                noon:{
                    required:true
                },
                night:{
                    required:true
                },
                instruction:{
                    required:true
                },
                days:{
                      required:true
                }
            },
            messages: {
                name: {
                    required: "Please Enter medicines Name" 
                },
                type:{
                    required: "Please Enter medicines Type" 
                },
                morning:{
                    required: "Please select morning" 
                },
                noon:{
                    required: "Please select afternoon" 
                },
                night:{
                    required: "Please select night" 
                },
                instruction:{
                    required: "Please select select" 
                },
                days:{
                    required: "Please select days" 
                }
            }
        });
    }

);