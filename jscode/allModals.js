function newPresentIllness() {
    global_date = moment().format('YYYY-MM-DD');
    $('#presentillnessform').trigger('reset');
    $('#presentIllnessId').modal('show');
}

function addBack() {
    global_date = moment().format('YYYY-MM-DD');
    $('input:radio').removeAttr('checked');
    $('#backPainForm').trigger('reset');
    $('#per').html('');
    $('#backPain').modal('show');
}

function addNeck() {
    global_date = moment().format('YYYY-MM-DD');
    $('input:radio').removeAttr('checked');
    $('#neckForm').trigger('reset');
    $('#neckPer').html('');
    $('#neckDis').modal('show');
}

function addcerviacl() {
    global_date = moment().format('YYYY-MM-DD');
    $('input:checkbox').removeAttr('checked');
    $('input:radio').removeAttr('checked');
    $('#cervicalSpineForm').trigger('reset');

    $('#cerMomentLoss tr').each(function(row, tr) {
        $(tr).find('td:eq(0) input').val('');
        $(tr).find('td:eq(1) input').val('');
        $(tr).find('td:eq(2) input').val('');
        $(tr).find('td:eq(3) input').val('');
        $(tr).find('td:eq(4) input').val('');
    });
    $('#cerTestMovement tr').each(function(row, tr) {
        $(tr).find('td:eq(0) input').val('');
        $(tr).find('td:eq(1) input').val('');
        $(tr).find('td:eq(2) input').val('');
        $(tr).find('td:eq(3) input').val('');
        $(tr).find('td:eq(4) input').val('');
    });
    $('#cervicalSpine').modal('show');
}

function addlumbarspin() {
    global_date = moment().format('YYYY-MM-DD');
    $('input:checkbox').removeAttr('checked');
    $('input:radio').removeAttr('checked');
    $('#lumbarSpineForm').trigger('reset');
    $('#momentLoss tr').each(function(row, tr) {
        $(tr).find('td:eq(0) input').val('');
        $(tr).find('td:eq(1) input').val('');
        $(tr).find('td:eq(2) input').val('');
        $(tr).find('td:eq(3) input').val('');
        $(tr).find('td:eq(4) input').val('');
    });
    $('#testMovement tr').each(function(row, tr) {
        $(tr).find('td:eq(0) input').val('');
        $(tr).find('td:eq(1) input').val('');
        $(tr).find('td:eq(2) input').val('');
        $(tr).find('td:eq(3) input').val('');
        $(tr).find('td:eq(4) input').val('');
    });
    $('#fullwindowModal2').modal('show');
}