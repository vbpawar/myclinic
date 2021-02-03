$(function() {
        var jvalidate = $("#editPatientProfile").validate({
            ignore: [],
            rules: {
                fname: {
                    required: true,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    maxlength: 50
                },

                bdate: {
                    required: true

                },
                mobile1: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                emailId: {
                    required: true

                },
                mstatus: {
                    required: true
                },
                gender: {
                    required: true
                },
                refferedId: {
                    required: true
                },
                address: {
                    required: true

                },
                city: {
                    required: true
                },
                pincode: {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 6
                },
                religin: {
                    required: true
                },
                cdate: {
                    required: true
                }

            },
            messages: {
                fname: {
                    required: "Please enter first name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                lname: {
                    required: "Please enter Last name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                bdate: {
                    required: "Please enter Date of birth"

                },
                mobile1: {
                    required: "Please enter mobile number",
                    number: "enter valid number",
                    minlength: "Should enter max 10 digits",
                    maxlength: "Mobile number cannot be exceed more then 10 digits"
                },
                emailId: {
                    required: "Please enter Email Id"

                },
                mstatus: {
                    required: "Kindly mention marital status"
                },
                gender: {
                    required: "Please mention your gender"
                },
                address: {
                    required: "Kindly mention address detail with landmark"

                },
                city: {
                    required: "Please enter your city"
                },
                pincode: {
                    required: "Please enter your postal code",
                    number: "Kindly enter valid 6 digit pincode",
                    minlength: "Pincode cannot exide lessthan 6 digit",
                    maxlength: "Pincode cannot exide morethan 6 digit"
                },
                religin: {
                    required: "Please enter your religin"
                },
                cdate: {
                    required: "Kindly mention your consulting date"
                },
            }
        });
    }

);