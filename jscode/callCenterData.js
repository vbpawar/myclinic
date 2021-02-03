var list = null;

function loadUsers(branchId) {
    var dropdownList = '<option></option>';
    for (let k of users.keys()) {
        var user = users.get(k);
        if (user.branchId == branchId && user.usertype == 3)
            dropdownList += '<option value="' + user.userId + '">' + user.username + '</option>';
    }
    list = dropdownList; //for payment screen
    $('#userId').html(dropdownList);
    $("#userId").select2({
        placeholder: 'Choose from list',
        dropdownParent: $('#fullwindowModal')
    });
    $('#doctorid').html(dropdownList);
    $("#doctorid").select2({
        placeholder: 'Choose from list',
        dropdownParent: $('#appointment')
    });
}

function mapBranches() {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let b = branch.get(k);
        dropdownList += '<option value="' + k + '">' + b.branchName + '</option>';
    }
    $('#branchId').html(dropdownList);
}
$(document).ready(function() {
    mapBranches();
    $("#branchId").select2({
        placeholder: 'Select branch',
        allowClear: true,
        dropdownParent: $('#fullwindowModal')
    });
});