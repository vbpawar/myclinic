var loadInstructionDetails = details => {
    $('#instruction').val(details.instruction);
    $('#hindi').val(details.hindi);

    $('#marathi').val(details.marathi);
 
};
loadInstructionDetails(instruction_details);
