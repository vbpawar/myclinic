

function mapRole1() {
    var dropdownList = '<option></option>';
    for (let k of labTestName.keys()) {
        dropdownList += '<option value=' + k + '>' + labTestName.get(k) + '</option>';
    }
    $('#TestName').html(dropdownList);
    console.log(dropdownList);
}
mapRole1();
$("#TestName").select2({
    placeholder: 'Select Test'
});