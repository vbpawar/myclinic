

function mapRole() {
    var dropdownList = '<option></option>';
    for (let k of patientName.keys()) {
        dropdownList += '<option value=' + k + '>' + patientName.get(k) + '</option>';
    }
    $('#firstName').html(dropdownList);
    console.log(dropdownList);
}
mapRole();
$("#firstName").select2({
    placeholder: 'Select Patient'
});