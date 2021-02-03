$(function() {
        var jvalidate = $("#branchMasterForm").validate({
            ignore: [],
            rules: {
                branchName: {
                    required: true,
                    maxlength: 50
                },
                mobile :{
                    number : true
                },
                branchAddress:{
                    required :true
                },
                country:{
                    required:true
                },
                state:{
                    required:true
                },
                city:{
                    required:true
                },
                franchiseid:{
                    required:true
                }
            },
            messages: {
                branchName: {
                    required: "Please Enter User Name",
                    maxlength: "Length Exceed upto 50 characters"
                },
              
                mobile:{
                    number : "Enter Valid Number"
                },
                branchAddress:{
                    required: "Please Enter Branch Address"
                },
                country:{
                    required: "Please Select Country"
                },
                state:{
                    required: "Please Select State"
                },
                city:{
                    required: "Please Select city"
                },
                franchiseid:{
                    required:"Select franchise"
                }
            }
        });
    }

);