function demo(u_appointmentId) {

    let patient = appointments.get(u_appointmentId);
    document.getElementById('pname1').value = patient.firstName + '  ' + patient.surname;
    document.getElementById('pname2').value = patient.firstName + '  ' + patient.surname;
 
}
demo(u_appointmentId);

function loadBranchs() {
    var dropdownList = '';
    var branchName;
    for (let k of branch.keys()) {
        var branchs = branch.get(k);
        if (k == data.branchId){
             branchName=branchs;
        }
    }
    document.getElementById('branchName').value =branchName.branchName;
   
}
loadBranchs();

function fun() {
    var pname1 = document.getElementById('pname1').value;
    var deseaseNew = document.getElementById('deseaseNew').value;
    var sinceDays = document.getElementById('sinceDays').value;
    var relativeName = document.getElementById('relativeName').value;
    var pname2 = document.getElementById('pname2').value;
   var treatmentName =document.getElementById('treatmentName').value;
    var medicalTreatment = document.getElementById('medicalTreatment').value;
    var hospitalCenterName = document.getElementById('branchName').value;
    $.ajax({
        url: url + 'insert_consent_form.php',
        type: 'POST',
        data: {
            u_patientId: u_patientId,
            pname1: pname1,
        
            deseaseNew: deseaseNew,
            sinceDays: sinceDays,
            relativeName: relativeName,
            treatmentName:treatmentName,
            medicalTreatment: medicalTreatment,
            hospitalCenterName: hospitalCenterName
        },
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {

                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                $('#pname1').empty();
                $('#pname2').empty();
                $('#branchName').empty();
                $('#treatmentName').empty();
            } else {
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
}