function loadfranchise(role,franchiseid) {
    var dropdownList = '<option></option>';
    for (let k of franchise.keys()) {
        if(role == 6 || role == 8){
            if(franchiseid == k){
                dropdownList += '<option value=' + k + '>' + franchise.get(k) + '</option>';
            }
        }else{
            dropdownList += '<option value=' + k + '>' + franchise.get(k) + '</option>';
        }
       // dropdownList += '<option value=' + k + '>' + franchise.get(k) + '</option>';
    }
    franchiselist  = dropdownList;
    $('#franchiseid').html(dropdownList);
}
loadfranchise(data.role,data.franchiseid);
$("#franchiseid").select2({
    placeholder: 'Select Franchise',
    allowClear: true,
    dropdownParent: $('#branchModal')
});
$('#franchiseid').val(data.franchiseid).trigger('change');
