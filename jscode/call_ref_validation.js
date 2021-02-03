$(function() {
    var jvalidate = $("#callrefferedByForm").validate({
        ignore: [],
        rules: {
            reference1: {
                required: true 
            }
        },
        messages: {
            reference1: {
                required: "Please Enter the reference name" 
            }
        }
    });
}

);