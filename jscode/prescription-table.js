var rowid = 0;
var rowhtml = "";

function load_initital() {
    for (var i = 0; i < 5; i++) {
        addrow();
    }
}

function addrow() {
    rowid += 1;
    rowhtml = "";
    rowhtml += '<tr id="row' + rowid + '">';
    rowhtml += '<td style="width:10%">';
    rowhtml += '<select class="form-control type" id="typeId' + rowid + '" name="typeId' + rowid + '">';
    rowhtml += '</select>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:25%">';
    rowhtml += '<select class="form-control medicine" id="medicineId' + rowid + '" name="medicineId' + rowid + '" onchange="fetchMedicine(this.value,' + rowid + ')">';
    rowhtml += '</select>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:10%">';
    rowhtml += '<select class="form-control mor" id="morning' + rowid + '" name="morning' + rowid + '"  >';
    rowhtml += '</select>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:10%">';
    rowhtml += '<select class="form-control eve" id="evining' + rowid + '" name="evining' + rowid + '"  >';
    rowhtml += '</select>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:10%">';
    rowhtml += '<select class="form-control nig" id="night' + rowid + '" name="night' + rowid + '"  >';
    rowhtml += '</select>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:5%">';
    rowhtml += '<input type="text" class="form-control dura" id="duration' + rowid + '" name="duration' + rowid + '"/>';
    rowhtml += '</td>';
    rowhtml += '<td style="width:20%">';
    rowhtml += '<select  class="form-control notes" id="inst' + rowid + '" name="inst' + rowid + '">';
    rowhtml += '</select></td>';
    rowhtml += '<td style="width:5%">';
    rowhtml += '<button type="button" class="btn btn-icon btn-danger" onclick="deleterow(' + rowid + ')" title="Remove Medicine"><i class="ik ik-minus"></i></button>';
    rowhtml += '</td>';
    rowhtml += '</tr>';

    $("#prescData").prepend(rowhtml);
    loadMedicine(rowid);
    loadMedicineTypes(rowid);
    loadMedicineDosage(rowid);
    loadInstructions(rowid);
    $("#typeId" + rowid).select2({
        placeholder: 'Select type of medicine',
        allowClear: true,
        tags: true
    });
    $("#medicineId" + rowid).select2({
        placeholder: 'Select medicine',
        allowClear: true,
        tags: true
    });
    $("#morning" + rowid).select2({
        placeholder: 'Select from list',
        allowClear: true,
        tags: true
    });
    $("#evining" + rowid).select2({
        placeholder: 'Select from list',
        allowClear: true,
        tags: true
    });
    $("#night" + rowid).select2({
        placeholder: 'Select from list',
        allowClear: true,
        tags: true
    });
    $("#inst" + rowid).select2({
        placeholder: 'Select instruction',
        allowClear: true,
        tags: true
    });
}

function deleterow(id) {
    $("#row" + id).remove();
}

function fetchMedicine(medicine, rowid) {
    var newOption = null;
    if (medicines.has(medicine)) {
        let medical = medicines.get(medicine);
        $('#duration' + rowid).val(medical.days);
        if ($('#typeId' + rowid).find("option[value='" + medical.type + "']").length) {
            $('#typeId' + rowid).val(medical.type).trigger('change');
        } else {
            newOption = new Option(medical.type, medical.type, true, true);
            $('#typeId' + rowid).append(newOption).trigger('change');
        }
        if ($('#morning' + rowid).find("option[value='" + medical.morning + "']").length) {
            $('#morning' + rowid).val(medical.morning).trigger('change');
        } else {
            newOption = new Option(medical.morning, medical.morning, true, true);
            $('#morning' + rowid).append(newOption).trigger('change');
        }
        if ($('#evining' + rowid).find("option[value='" + medical.noon + "']").length) {
            $('#evining' + rowid).val(medical.noon).trigger('change');
        } else {
            newOption = new Option(medical.noon, medical.noon, true, true);
            $('#evining' + rowid).append(newOption).trigger('change');
        }
        if ($('#night' + rowid).find("option[value='" + medical.night + "']").length) {
            $('#night' + rowid).val(medical.night).trigger('change');
        } else {
            newOption = new Option(medical.night, medical.night, true, true);
            $('#night' + rowid).append(newOption).trigger('change');
        }
        if (medical.instruction != '') {
            if ($('#inst' + rowid).find("option[value='" + medical.instruction + "']").length) {
                $('#inst' + rowid).val(medical.instruction).trigger('change');
            } else {
                newOption = new Option(medical.instruction, medical.instruction, true, true);
                $('#inst' + rowid).append(newOption).trigger('change');
            }
        }
    }
}

function check_instruction_type(id) {
    lang_flag = id;
}