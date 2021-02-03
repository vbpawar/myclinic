var countries = new Map();
var states = new Map();
var cities = new Map();
var reference = new Set();
getReference();
getCountries();
getStates();
getCities();
loadCountries();

function getCountries() {
    $.ajax({
        url: url + 'getCountries.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    countries.set(response.Data[i].id, response.Data[i].name);
                }
            }
        }
    });
}


function getStates() {
    $.ajax({
        url: url + 'getStates.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    states.set(response.Data[i].id, response.Data[i]);
                }
            }
        }
    });
}

function getCities() {
    $.ajax({
        url: url + 'getCities.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    cities.set(response.Data[i].id, response.Data[i]);
                }
            }
        }
    });
}

function loadCountries() {
    var dropdownList = '<option></option>';
    for (let k of countries.keys()) {
        var country = countries.get(k);
       if(k == 101){
        dropdownList += '<option value="' + k + '">' + country + '</option>';
       }
    }
    $('#country').html(dropdownList);
    $("#country").select2({
        placeholder: 'Select Country',
        allowClear: true,
        dropdownParent: $('#fullwindowModal')
    });
}

function loadStates(countryId) {
    var dropdownList = '<option></option>';
    for (let k of states.keys()) {
        var state = states.get(k);
        if (state.country_id == countryId)
            dropdownList += '<option value="' + state.id + '">' + state.name + '</option>';
    }
    $('#state').html(dropdownList);
    $("#state").select2({
        placeholder: 'Select State',
        allowClear: true,
        dropdownParent: $('#fullwindowModal')
    });
}

function loadCities(stateId) {
    var dropdownList = '<option></option>';
    for (let k of cities.keys()) {
        var city = cities.get(k);
        if (city.state_id == stateId)
            dropdownList += '<option value="' + city.id + '">' + city.name + '</option>';
    }
    $('#city').html(dropdownList);
    $("#city").select2({
        placeholder: 'Select City',
        allowClear: true,
        dropdownParent: $('#fullwindowModal')
    });
}


function getReference() {
    $.ajax({
        url: url + 'getReference.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    reference.add(response.Data[i].reference);
                }
            }
        }
    });
}

function loadReferences() {
    var dropdownList = '<option></option>';
    reference.forEach(refer => {
        dropdownList += '<option>' + refer + '</option>';
    });
    $('#reference').html(dropdownList);
    $("#reference").select2({
        placeholder: 'Select Reference',
        allowClear: true,
        tags: true,
        dropdownParent: $('#fullwindowModal') //for serach in modal
    });
}
loadReferences();