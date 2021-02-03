var list1=null;
function mapInstruction() {
    var dropdownList = '<option></option>';
    for (let k of instruction.keys()) {
        console.log(instruction.get(k));
        dropdownList += '<option>' + instruction.get(k) + '</option>';
    }
   
    $('#instructionId').html(dropdownList);
    list1 = dropdownList;
    console.log(list1)
}
$(document).ready(function() {
     mapInstruction();
    $("#instructionId").select2({
        placeholder: 'Select Instruction',
        allowClear: true,
        tags:true,
        dropdownParent: $('#medicinesModal')
    });
});