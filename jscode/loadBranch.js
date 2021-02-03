

function loadBranchs() {
    var dropdownList = '';
    var branchName;
    for (let k of branch.keys()) {
        var branchs = branch.get(k);
        if (k == data.branchId){
            // dropdownList += '<option value="' + branchs.branchId + '">' + branchs.branchName + '</option>';
             branchName=branchs;
           
        }
    }
}
loadBranchs();