var backPain = new Map();
var back_details = {};
var editB = 0;
var ubackPainId = null;
// var patientId_ap = null;
var tp = 0;
var getLowBackPain = (patientId) => {
    $.ajax({
        url: url + 'getBackPainQues.php',
        type: 'POST',
        dataType: 'json',
        data: {
            patientId: patientId
        },
        success: function(response) {
            backPain.clear();
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    backPain.set(response.Data[i].lbackpId, response.Data[i]);
                }

            }
            showBackPain(backPain);
        }
    });
};

var showBackPain = backPain => {
    $('#bTable').dataTable().fnDestroy();
    $('#backData').empty();
    var tblData = '';
    for (let k of backPain.keys()) {
        let neck = backPain.get(k);

        tblData += '<tr><td>' + getDate(neck.visitDate) + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editBack(' + (k) + ')" title="Edit patients details "><i class="ik ik-edit text-blue"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#backData').html(tblData);
    $('#bTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{
            orderable: false,
            targets: [0, 1]
        }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};

var editBack = (lbackpId) => {
    lbackpId = lbackpId.toString();
    back_details = backPain.get(lbackpId);
    global_date = back_details.visitDate;
    editB = 1;
    ubackPainId = lbackpId;
    fill_back(back_details);
};


function fill_back(back) {
    var json, obj, values, i;
    json = back.painIntensity;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        tp = 0;
        $.each($("input[name='painIntensity']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.personalCare;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='personalCare']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.lifting;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='lifting']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.walking;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='walking']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.sitting;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='sitting1']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.standing;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='standing']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.sleeping;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='sleeping']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.socialLife;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='socialLife']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.travel;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='travel']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = back.changingDegreeOfPain;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='changingDegreeOfPain']"), function() {
            if (values[i] == 1) {
                tp = tp + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }
    $('#backPain').modal('show');
    cal(parseInt(tp));
}