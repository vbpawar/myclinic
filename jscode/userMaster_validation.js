$(function() {
        var jvalidate = $("#userMasterForm").validate({
            ignore: [],
            rules: {
                username: {
                    required: true,
                    maxlength: 50
                },
                upassword :{
                    required :true
                },
                
                mobile :{
                    number : true
                },
                addharId:{
                    number :true
                },
                address : {
                    required :true
                },
                conpassword :{
                    equalTo: "#upassword",
                    required:true
                },
                usertype:{
                    required :true
                },
                branchName:{
                    required :true
                }
            },
            messages: {
                username: {
                    required: "Please Enter User Name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                upassword :{
                    required : "Please Enter the Password"
                },
                mobile:{
                    number : "Enter Valid Number"
                },
                addharId:{
                    number : "Enter Valid Number"
                },
                address :{
                    required : "Please Enter the Address"
                },
                conpassword :{
                    required : "Please re-enter the Password"
                },
                usertype:{
                    required : "Select User"
                },
                branchName:{
                    required : "Select Branch"
                }
        

            }
        });
    }

);