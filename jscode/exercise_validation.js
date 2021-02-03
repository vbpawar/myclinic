$(function() {
    var jvalidate = $("#exerciseForm").validate({
        ignore: [],
        rules: {
            title: {
                required: true 
            }
        },
        messages: {
            title: {
                required: "Please Enter title" 
            }
        }
    });
}

);