
  
var getAllPatientContactWise = (contactNo) => {
    $.ajax({
        url: url + 'patientContactWise.php',
        type: 'POST',
        dataType: 'json',
        data:{
            contactNo : contactNo
        },
        success: function(response) {
            if (response.Responsecode == 200) {
                    console.log(response);
                    patients.set(response.Data.patientId,response.Data);
                    listPatients(patients);
            }
            else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
            }
        }
    });
};
$('#searchContact').on('click', function(e) {
    e.preventDefault();

    var contactNo = document.getElementById("mobileNo").value;
    console.log(contactNo);
  
    $("#contactSearch").validate({
        ignore: [],
        rules: {
            mobile1: {
            number:true
            }
           
        },
        messages: {
            mobile1: {
                number: "Please enter valid number"
            },           
        }
    });
    
    getAllPatientContactWise(contactNo);
    
});

