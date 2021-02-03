$(function() {
        var jvalidate = $("#patientform").validate({
            ignore: [],
            rules: {
                firstName: {
                    required: true,
                    maxlength: 50
                },
                surname: {
                    required: true,
                    maxlength: 50
                },
                nextVisitDate:{
                    required: true
                },
                mobile1: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                address: {
                    required: true
                },
                height :{
                    required :true,
                    number : true
                },
              
                referredby:{
                    required :true
               
                },
                weight:{
                required :true,
                number :true
            },
            country :{
                required : true
            },
            state :{
                required : true
            },
            city :{
                required : true
            }

            },
            messages: {
                firstName: {
                    required: "Please enter first name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                surname: {
                    required: "Please enter Last name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                nextVisitDate:{
                    required:  "Please Enter Consulting date"
                },
                mobile1: {
                    required: "Please enter mobile number",
                    number: "enter valid number",
                    minlength: "Should enter max 10 digits",
                    maxlength: "Mobile number cannot be exceed more then 10 digits"
                },
                address: {
                    required: "Please enter full address detail with landmark"

                },
                height:{
                    required: "Please enter height",
                    number: "enter valid number"
                },
              
                referredby:{
                    required: "Please enter name of referredby"
                },
        
                weight:{
                    required: "Please enter weight",
                    number: "enter valid number"
                },
                country:{
                    required: "Please select Country"
                  
                },
                state :{
                    required: "Please select State"
                },
        
                city :{
                    required: "Please select City"
                }

            }
        });
    }

);