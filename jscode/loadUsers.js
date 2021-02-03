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
        placeholder: 'Choose from list'
            // dropdownParent: $('#appointment')
    });
}