function mapBranches(franchiseid) {
    console.log('here');
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let b = branch.get(k);
        if(franchiseid == b.franchiseid){
        dropdownList += '<option value="' + k + '">' + b.branchName + '</option>';
        }
    }
    $('#branchId').html(dropdownList);
    $("#branchId").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
}
function mapfranchise(){
    var dropdownList = '<option></option>';
    for (let k of franchise.keys()) {
        dropdownList += '<option value="' + k + '">' + franchise.get(k) + '</option>';
    }
    $('#franchiseid').html(dropdownList);
    $("#franchiseid").select2({
        placeholder: 'Select franchise',
        allowClear: true
    });
}
$(document).ready(function() {
    mapfranchise();
    
});