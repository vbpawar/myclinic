function loadTest() {
    var dropdownList = '<option></option>';
    for (let k of test.keys()) {
        var tests = test.get(k);
        dropdownList += '<option value="' + tests.testId + '">' + tests.testName + '-' + tests.fees + '</option>';
    }
    $('#test').html(dropdownList);
    $("#test").select2({
        placeholder: 'Select Procedures',
        allowClear: true,
        dropdownParent: $('#opd-payment-generate')
    });
}

function loadTestPackage() {
    var dropdownList = '<option></option>';
    for (let k of test.keys()) {
        var tests = test.get(k);
        dropdownList += '<option value="' + tests.testId + '">' + tests.testName + '-' + tests.fees + '</option>';
    }
    $('#test').html(dropdownList);
    $("#test").select2({
        placeholder: 'Select Test',
        allowClear: true,
    });
}