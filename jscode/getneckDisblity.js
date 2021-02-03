var neckDisiblity = new Map();
var neck_details = {};
var editN = 0;
var uNeck = null;
// var patientId_ap = null;
var gn = 0;
var getNeckDisblity = (patientId) => {
    $.ajax({
        url: url + 'getNeckDisblity.php',
        type: 'POST',
        dataType: 'json',
        data: {
            patientId: patientId
        },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    neckDisiblity.set(response.Data[i].ndisabilityId, response.Data[i]);
                }
                showNeckDisiblity(neckDisiblity);
            }
        }
    });
};

var showNeckDisiblity = neckDisiblity => {
    $('#nTable').dataTable().fnDestroy();
    $('#neckData').empty();
    var tblData = '';
    for (let k of neckDisiblity.keys()) {
        let neck = neckDisiblity.get(k);

        tblData += '<tr><td>' + getDate(neck.visitDate) + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editneck(' + (k) + ')" title="Edit patients details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#neckData').html(tblData);
    $('#nTable').dataTable({
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

var editneck = (neckId) => {
    neckId = neckId.toString();
    neck_details = neckDisiblity.get(neckId);
    global_date = neck_details.visitDate;
    editN = 1;
    uNeck = neckId;
    fill_neck(neck_details);
};

function fill_neck(details) {
    var json, obj, values, i;
    json = details.painIntensity;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        gn = 0;
        $.each($("input[name='painIntensity1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.personalCare;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='personalCare1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.lifting;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='lifting1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.work;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='work1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.headaches;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='headaches1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.concentration;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='concentration1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.sleeping;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='sleeping1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.driving;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='driving1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.reading;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='reading1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }

    json = details.recreation;
    if (json != null) {
        obj = JSON.parse(json);
        values = Object.keys(obj).map(function(key) {
            return obj[key];
        });
        i = 0;
        $.each($("input[name='recreation1']"), function() {
            if (values[i] == 1) {
                gn = gn + i;
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
            i++;
        });
    }
    $('#neckDis').modal('show');
    neckCal(parseInt(gn));
}