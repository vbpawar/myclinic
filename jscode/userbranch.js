var branchList=null;
function mapBranches(role,franchiseid) {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let b = branch.get(k);
        if(role == 9 || role == 5){
            dropdownList += '<option value="' + k + '">' +b.branchName  + '</option>';
        }else if(role == 6 || role == 8){
            if(franchiseid == b.franchiseid){
            dropdownList += '<option value="' + k + '">' +b.branchName  + '</option>';
            }
        }else{
            dropdownList += '<option value="' + k + '">' +b.branchName  + '</option>';
        }
    }
    $('#branchId').html(dropdownList);
    branchList=dropdownList;

}
$(document).ready(function() {
    mapBranches(data.role,data.franchiseid);
    $("#branchId").select2({
        placeholder: 'Select branch',
        allowClear: true,
    });
});