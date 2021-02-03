var loadMedicineDetails = details => {
    console.log(details);
    $('#typeIde').val(details.type).trigger('change');
    $('#name').val(details.name);
    $('#genName').val(details.genName);

    $('#morninge').val(details.morning).trigger('change');
    $('#noone').val(details.noon).trigger('change');
    $('#nighte').val(details.night).trigger('change');
    $('#instructione').val(details.instruction).trigger('change');
    $('#days').val(details.days);
    //$('#isImportant').val(details.isImportant).trigger('change');
  
    if(details.isActive == 1){
        $('#isImportant1').prop('checked',true);
    }else{
        $('#notImportant1').prop('checked',true); 
    }
 
};

$('#morninge').html(list);
$('#noone').html(list);
$('#nighte').html(list);
$('#instructione').html(list1);
$('#typeIde').html(medicineTypeList);
$('.select2').select2({
    placeholder:'select',
    allowClear:true
   
});

loadMedicineDetails(medicine_details);

