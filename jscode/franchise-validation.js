$(function() {
    var jvalidate = $("#branchMasterForm").validate({
        ignore: [],
        rules: {
            fname: {
                required: true,
                maxlength: 100
            },
            emailid :{
                email : true,
                required:true
            },
            cnumber:{
                required :true,
                number:true
            },
            cperson:{
                required:true
            }
        },
        messages: {
            fname: {
                required: 'Enter Franchise name',
                maxlength: 'Can not exceed 100 characters'
            },
            emailid :{
                email : 'Enter correct emailid',
                required:'Please enter an email id'
            },
            cnumber:{
                required :'Enter only numeric numbers',
                number:'Enter a contact number'
            },
            cperson:{
                required:'Enter contact person name'
            }

        }
    });
}

);