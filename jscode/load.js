loadCountries1();

function loadCountries1() {
    var dropdownList = '<option></option>';
    for (let k of countries.keys()) {
        var country = countries.get(k);
        dropdownList += '<option value="' + k + '">' + country + '</option>';
    }
    $('#country1').html(dropdownList);
    $("#country1").select2({
        placeholder: 'Select Country',
        allowClear: true
    });
}

function loadStates1(countryId) {
    var dropdownList = '<option></option>';
    for (let k of states.keys()) {
        var state = states.get(k);
        if (state.country_id == countryId)
            dropdownList += '<option value="' + state.id + '">' + state.name + '</option>';
    }
    $('#state1').html(dropdownList);
    $("#state1").select2({
        placeholder: 'Select State',
        allowClear: true
    });
}

function loadCities1(stateId) {
    var dropdownList = '<option></option>';
    for (let k of cities.keys()) {
        var city = cities.get(k);
        if (city.state_id == stateId)
            dropdownList += '<option value="' + city.id + '">' + city.name + '</option>';
    }
    $('#city1').html(dropdownList);
    $("#city1").select2({
        placeholder: 'Select City',
        allowClear: true
    });
}