var loadDiagnosisDetails = details => {

    $('#diagnosis').val(details.diagnosis);
    $('#icdCode').val(details.icdCode);

 
};
loadDiagnosisDetails(diagnosis_details);
