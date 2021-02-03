
$(function() {
    var jvalidate = $("#Result_Form").validate({
        ignore: [],
        rules: {
            firstName: {
                required: true,
                maxlength: 50
            },
            visitDate :{
                required :true
            },
            
            TestName :{
                required : true
            }
        },
        messages: {
            firstName: {
                required: "Please Enter Name",
               
            },
            visitDate :{
                required: "Please Enter date",
               
            },
            TestName:{
                required : "Enter test name"
            }

        }
    });
}

);
