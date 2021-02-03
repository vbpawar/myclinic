$(function() {
    var jvalidate = $("#refferedByForm").validate({
        ignore: [],
        rules: {
            Name: {
                required: true 
            }
        },
        messages: {
            Name: {
                required: "Please Enter the referring source" 
            }
        }
    });
}

);