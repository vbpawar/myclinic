function loadpatientdetails(u_appointmentId) {
    let patient = appointments.get(u_appointmentId);
    document.getElementById('feedbackname').value = patient.firstName + '  ' + patient.surname; 
    document.getElementById('fphone').value = patient.mobile1; 
}
loadpatientdetails(u_appointmentId);

function feedbackform() {
    var tdata = storefeedbacktable();
   var fdata = {
    patientId:u_patientId,
    feedbackname:$('#feedbackname').val(),
    fage:$('#fage').val(),
    fphone:$('#fphone').val(),
    fplace:$('#fplace').val(),
    findus:$('#findus').val(),
    oexperience:$('#oexperience').val(),
    fsuggestion:$('#fsuggestion').val(),
    tdata:tdata
   };
   fdata.tdata = JSON.stringify(Object.assign({}, fdata.tdata));
   console.log(fdata.tdata);
    $.ajax({
        url: url + 'insert_feedbackform.php',
        type: 'POST',
        data:fdata,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
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
function storefeedbacktable() {
    var TableData = [];
var amb =0,recp=0,phisio=0,asses=0,acep=0;
    $('#fform tr').each(function(row, tr) {
         amb = $(tr).find('td:eq(0) input').val();
        if(amb == ""){
            amb = 0;
        }
           
        recp = $(tr).find('td:eq(1) input').val();
        if(recp == ""){
            recp = 0;
        }
      
        phisio = $(tr).find('td:eq(2) input').val();
        if(phisio == ""){
            phisio = 0;
        }
        asses = $(tr).find('td:eq(3) input').val();
        if(asses == ""){
            asses = 0;
        }
         acep = $(tr).find('td:eq(4) input').val();
         if(acep == ""){
            acep = 0;
        }
        TableData[row] = {
            "apply": amb,
            "poor": recp,
            "fair": phisio,
            "good": asses,
            "excel": acep
        };
    });
    TableData.shift();
    return TableData;
}