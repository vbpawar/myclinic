var loadBranchDetails = details => {
    $('#branchName').val(details.branchName);
    $('#latitude').val(details.latitude);
    $('#longitude').val(details.longitude);
    $('#mapURL').val(details.mapURL);
    $('#mobile1').val(details.mobile1);
    $('#mobile2').val(details.mobile2);
    $('#countrye').val(details.country).trigger('change');
    $('#statee').val(details.state).trigger('change');
    $('#citye').val(details.city).trigger('change');
    $('#branchAddress').val(details.branchAddress);
    $('#franchiseidu').val(details.franchiseid).trigger('change');
    $("#franchiseidu").prop("readonly", true);
};
$('#franchiseidu').html(franchiselist);
$("#franchiseidu").select2({
    placeholder: 'Select franchise',
    allowClear: true
});
loadCountriesedit();

function loadCountriesedit() {
    var dropdownList = '<option></option>';
    for (let k of countries.keys()) {
        var country = countries.get(k);
        dropdownList += '<option value="' + k + '">' + country + '</option>';
    }
    $('#countrye').html(dropdownList);

    $("#countrye").select2({
        placeholder: 'Select Country',
        allowClear: true
    });
}

function loadStatesedit(countryId) {
    var dropdownList = '<option></option>';
    for (let k of states.keys()) {
        var state = states.get(k);
        if (state.country_id == countryId)
            dropdownList += '<option value="' + state.id + '">' + state.name + '</option>';
    }
    $('#statee').html(dropdownList);
    $("#statee").select2({
        placeholder: 'Select State',
        allowClear: true
    });
}

function loadCitiesedit(stateId) {
    var dropdownList = '<option></option>';
    for (let k of cities.keys()) {
        var city = cities.get(k);
        if (city.state_id == stateId)
            dropdownList += '<option value="' + city.id + '">' + city.name + '</option>';
    }
    $('#citye').html(dropdownList);
    $("#citye").select2({
        placeholder: 'Select City',
        allowClear: true
    });
}

loadBranchDetails(branch_details);