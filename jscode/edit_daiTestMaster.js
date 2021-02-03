var loadTestDetails = details => {

    $('#testName').val(details.testName);
    $('#testDetails').val(details.testDetails);
    $('#fees').val(details.fees);
    $('#type').val(details.type);
};
loadTestDetails(test_details);
