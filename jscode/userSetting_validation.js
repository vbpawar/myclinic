$(function() {
    var jvalidate = $("#usersettingForm").validate({
        ignore: [],
        rules: {
     
     
            conpassword :{
                equalTo: "#upassword"
            
            }
          
        },
        messages: {
          
       
            conpassword :{
                required : "Please re-enter the Password"
            }
        }
    });
}

);