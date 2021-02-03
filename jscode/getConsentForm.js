var concent = new Map();
var consent_date = moment().format('YYYY-MM-DD');
var getAllConsentDetails = (u_patientId) => {
    $.ajax({
        url: url + 'getConsentMaster.php',
        type: 'POST',
        data: { patientId: u_patientId },
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                var n = response.Data.length;
                for (var i = 0; i < n; i++) {
                    concent.set(response.Data[i].visitDate, response.Data[i]);
                }

            }
            loadConcent(concent);
            fill_concent(global_date);
        }
    });
};
getAllConsentDetails(u_patientId);

function loadConcent(concent) {
    var dropdownList = '<option></option>';
    for (let k of concent.keys()) {
        var user = concent.get(k);
        dropdownList += '<option value="' + k + '">' + user.visitDate + '</option>';
    }
    $('#concentId').html(dropdownList);
    $("#concentId").select2({
        placeholder: 'Select date'
    });
}

function fill_concent(visitDate) {
    consent_date=visitDate;
    if (concent.has(consent_date)) {
        var user = concent.get(consent_date);
        console.log(user);
        document.getElementById('deseaseNew').value = user.deseaseNew;
        document.getElementById('sinceDays').value = user.sinceDays;
        document.getElementById('relativeName').value = user.relativeName;
        document.getElementById('medicalTreatment').value = user.medicalTreatment;
        document.getElementById('branchName').value = user.hospitalCenterName;
        document.getElementById('treatmentName').value = user.treatmentName;
    }
}