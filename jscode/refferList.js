function loadReffName() {
    dropDownList += "<option></option>";
    var dropDownList = '';
    for (let k of refName.keys()) {
        var data = refName.get(k);
        dropDownList += "<option value=" + k + ">" + data.doctorName + " " + data.address + "</option>";
    }
    $('#referredby').html(dropDownList);
    $('#referredby').select2({
        placeholder: 'Select Refferance',
        allowClear: true,
        dropdownParent: $('#demoModal')
    });
    $('#referredbye').html(dropDownList);
    $('#referredbye').select2({
        placeholder: 'Select Refferance',
        allowClear: true,
    });
}
loadReffName();