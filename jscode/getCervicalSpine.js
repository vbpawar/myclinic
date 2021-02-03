var cervicals = new Map();
var cervical_details = {};
var editC = 0;
var uCerv = null;
var getCervicalSpine = (patientId) => {
    $.ajax({
        url: url + 'getAllCervicalSpine.php',
        type: 'POST',
        dataType: 'json',
        data: {
            patientId: patientId
        },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    cervicals.set(response.Data[i].cerSpineId, response.Data[i]);
                }

            }
            showCervicalSpine(cervicals);
        }
    });
};

var showCervicalSpine = cervicals => {

    $('#cTable').dataTable().fnDestroy();
    $('#carvicalData').empty();
    var tblData = '';
    for (let k of cervicals.keys()) {
        let cervical = cervicals.get(k);
        tblData += '<tr><td>' + cervical.visitD + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editCervicalSpine(' + (k) + ')" title="Edit patients details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#carvicalData').html(tblData);
    $('#cTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{
            orderable: false,
            targets: [0, 1]
        }],
        dom: 'Bfrtip',
        destroy: true
    });
};

var editCervicalSpine = (cerSpineId) => {
    cerSpineId = cerSpineId.toString();
    uCerv = cerSpineId;
    editC = 1;
    cervical_details = cervicals.get(cerSpineId);
    global_date = cervical_details.visitDate;
    fill_Cervical(cervical_details);

};

function fill_Cervical(details) {
    if (details.cerVasScore != null) {
        $('#cerVasScore').val(details.cerVasScore);
    }
    if (details.cerPresentSymptoms != null) {
        $('#cerPresentSymptoms').val(details.cerPresentSymptoms);
    }
    if (details.cerFunDisabilityScore != null) {
        $('#cerFunDisabilityScore').val(details.cerFunDisabilityScore);
    }

    if (details.cerCommencedAsResult != null) {
        $('#cerCommencedAsResult').val(details.cerCommencedAsResult);
    }

    var json, obj, values, i;

    json = details.cerPresentSince;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.p1 != null) {
            $('#cerpresentSinceNew').val(obj.p1);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerPresentSince']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerConstSympt;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.p3 != null) {
            $('#cerConstSympt1').val(obj.p3);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerConstSympt']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerSymptAtOnset;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.p2 != null) {
            $('#cerSymptAtOnset1').val(obj.p2);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerSymptAtOnset']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerMedications;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.p5 != null) {
            $('#cerMedications1').val(obj.p5);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerMedications']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.disturbedSleep;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.p4 != null) {
            $('#disturbedSleep1').val(obj.p4);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='disturbedSleep']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerAggrFactor;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.ag1 != null) {
            $('#cerAggrFactor1').val(obj.ag1);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerAggrFactor']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerRelFactor;
    if (json != null) {
        obj = JSON.parse(json);
        if (obj.rf1 != null) {
            $('#cerRelFactor1').val(obj.rf1);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerRelFactor']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }




    json = details.cerGenHealth;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.p6 != null) {
            $('#cerGenHealth1').val(obj.p6);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerGenHealth']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerImaging;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.p7 != null) {
            $('#cerImaging1').val(obj.p7);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerImaging']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }


    json = details.cerResurgery;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.p8 != null) {
            $('#cerResurgery1').val(obj.p8);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerResurgery']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerNightPain;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.p9 != null) {
            $('#cerNightPain1').val(obj.p9);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerNightPain']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerAccidents;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.p10 != null) {
            $('#cerAccidents1').val(obj.p10);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerAccidents']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }


    json = details.cerWeightLoss;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.wt != null) {
            $('#cerWeightLoss1').val(obj.wt);
        }
        if (obj.wOther != null) {
            $('#cerWeightLoss2').val(obj.wOther);
        }

        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerWeightLoss']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerSitting;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerSitting']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.cerStanding;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerStanding']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.carSymptoms;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='carSymptoms']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.protrudedHead;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='protrudedHead']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }
    json = details.cerderagement;
    if (json != null) {
        obj = JSON.parse(json);

        if (obj.d1 != null) {
            $('#cerderagement1').val(obj.d1);
        }
        if (obj.d2 != null) {
            $('#cerderagement2').val(obj.d2);
        }
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='cerderagement']"), function() {
            if (values[i] == 1) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    var content = '',
        m, count;
    json = details.cerMomentLoss;
    if (json != null) {
        content += '<thead><tr><th scope="col"></th><th scope="col">Maj</th><th scope="col">Mod</th><th scope="col">Min</th>';
        content += '<th scope="col">Nil</th><th scope="col">Pain</th></tr></thead>';
        obj = JSON.parse(json);
        count = Object.keys(obj).length;
        var arr = ['Flexion', 'Extension', 'Side Gliding R', 'Side Gliding L', 'Rotation R', 'Rotation L'];
        for (var j = 0; j < count; j++) {
            content += '<tr>';
            content += ' <th scope="row">' + arr[j] + '</th>';
            if (obj[j].maj == 1) {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1" Checked><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            } else {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1"><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            }
            if (obj[j].mod == 1) {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1" Checked><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            } else {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1"><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            }
            if (obj[j].min == 1) {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1" Checked><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            } else {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1"><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            }
            if (obj[j].nil == 1) {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1" Checked><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            } else {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1"><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            }
            if (obj[j].pain == 1) {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1" Checked><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            } else {
                content += '<td><div class="checkbox-fade fade-in-success"><label><input type="checkbox" value="1"  name="movement_1"><span class="cr"><i class="cr-icon ik ik-check txt-success"></i></span> </label></div></td>';
            }
            content += '</tr>';
        }
        $('#cerMomentLoss').html(content);

    }
    json = details.cerTestMovement;
    obj = JSON.parse(json);
    if (Object.keys(obj).length === 0) {} else {
        content = '';
        content += '<thead><tr><th scope="col"></th><th scope="col">Symptoms During Testing</th><th scope="col">Symptoms After Testing</th>';
        content += '<th scope="colgroup" colspan="3">Mechanical Response<thead> <th></th> <th></th> <th></th><th><div colspan="3"><i class="ik ik-arrow-up"></i>Rom</div></th>';
        content += '<th> <i class="ik ik-arrow-down"></i>Rom</th><th>No Effect</th></thead></th></tr></thead>';
        content += '<tr>';
        content += ' <th scope="row">Rep EIL</th>';
        content += '<td><input type="text" class="form-control"  value="' + obj[0]['During-test'] + '"></td>';
        content += '<td><input type="text" class="form-control"  value="' + obj[0]['after-test'] + '"></td>';
        content += '<td><input type="text" class="form-control"  value="' + obj[0]['m-rom-u'] + '"></td>';
        content += '<td><input type="text" class="form-control"  value="' + obj[0]['m-rom-d'] + '"></td>';
        content += '<td><input type="text" class="form-control"  value="' + obj[0]['m-noefect'] + '"></td>';
        content += '</tr>';
        $('#cerTestMovement').html(content);
    }
    $('#cervicalSpine').modal('show');
}