var userroleList = null;

function mapRole() {
    var dropdownList = '<option></option>';
    for (let k of userRole.keys()) {
        dropdownList += '<option value=' + k + '>' + userRole.get(k) + '</option>';
    }
    $('#roleId').html(dropdownList);
    userroleList = dropdownList;
}
mapRole();
$("#roleId").select2({
    placeholder: 'Select Role',
    allowClear: true,
    tags: true,
    dropdownParent: $('#userMasterForm')
});