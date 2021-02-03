var loadFeesDetails = details => {
 console.log(details);
 
    $('#feesType').val(details.feesType);
    $('#fee').val(details.fee); 
 
 
    $('#doctorId').html(DocList);
 
    $('.select2').select2({
        placeholder:'select doctor'
    });
    $('#doctorId').val(details.doctorId).trigger('change');
};
loadFeesDetails(fees_details);
