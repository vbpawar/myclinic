$('#neckForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#neckForm").valid();
    if (returnVal) {
        var painObj = getpainIntensity_1();
        var perObj = getpersonalCare_1();
        var liftObj = getlifting_1();
        var workObj = getwork();
        var headObj = getheadaches();
        var conObj = getconcentration();
        var sleepObj = getsleeping_1();
        var driveObj = getdriving();
        var readObj = getreading();
        var recObj = getrecreation();

        painObj = JSON.stringify(painObj);
        perObj = JSON.stringify(perObj);
        liftObj = JSON.stringify(liftObj);
        workObj = JSON.stringify(workObj);
        headObj = JSON.stringify(headObj);
        conObj = JSON.stringify(conObj);
        sleepObj = JSON.stringify(sleepObj);
        driveObj = JSON.stringify(driveObj);
        readObj = JSON.stringify(readObj);
        recObj = JSON.stringify(recObj);

        $.ajax({
            url: url + 'insertNeckDisability.php',
            type: 'POST',
            data: {
                patientId: global_patientId,
                visitDate: global_date,
                painIntensity: painObj,
                personalCare: perObj,
                lifting: liftObj,
                work: workObj,
                headaches: headObj,
                concentration: conObj,
                sleeping: sleepObj,
                driving: driveObj,
                reading: readObj,
                recreation: recObj

            },
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {

                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                    if (editN == 1) {
                        if (neckDisiblity.has(uNeck)) {
                            neckDisiblity.delete(uNeck);
                            editN = 0;
                        }
                    }
                    $('#neckDis').modal('hide');
                    neckDisiblity.set(response.Data.ndisabilityId, response.Data);
                    $('#neckForm').trigger('reset');
                    showNeckDisiblity(neckDisiblity);

                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });

                }
            }
        });
    }
});

var getpainIntensity_1 = () => {
    var painObj = {};
    $.each($("input[name='painIntensity1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            painObj[value] = flag;
            // Object.assign(painObj,flag)
        } else {
            painObj[value] = flag;
            // Object.assign(painObj,flag)
        }
    });
    return painObj;
};

var getpersonalCare_1 = () => {
    var perObj = {};
    $.each($("input[name='personalCare1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            perObj[value] = flag;
        } else {
            perObj[value] = flag;
        }

    });
    return perObj;
};

var getlifting_1 = () => {
    var liftObj = {};
    $.each($("input[name='lifting1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            liftObj[value] = flag;
        } else {
            liftObj[value] = flag;
        }

    });
    return liftObj;
};

var getwork = () => {
    var workObj = {};
    $.each($("input[name='work1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            workObj[value] = flag;
        } else {
            workObj[value] = flag;
        }

    });
    return workObj;
};

var getheadaches = () => {
    var headObj = {};
    $.each($("input[name='headaches1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            headObj[value] = flag;
        } else {
            headObj[value] = flag;
        }

    });
    return headObj;
};

var getconcentration = () => {
    var conObj = {};
    $.each($("input[name='concentration1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            conObj[value] = flag;
        } else {
            conObj[value] = flag;
        }

    });
    return conObj;
};

var getsleeping_1 = () => {
    var sleepObj = {};
    $.each($("input[name='sleeping1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            sleepObj[value] = flag;
        } else {
            sleepObj[value] = flag;
        }

    });
    return sleepObj;
};
var getdriving = () => {
    var driveObj = {};
    $.each($("input[name='driving1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            driveObj[value] = flag;
        } else {
            driveObj[value] = flag;
        }

    });
    return driveObj;
};
var getreading = () => {
    var readObj = {};
    $.each($("input[name='reading1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            readObj[value] = flag;
        } else {
            readObj[value] = flag;
        }

    });
    return readObj;
};

var getrecreation = () => {
    var recObj = {};
    $.each($("input[name='recreation1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            recObj[value] = flag;
        } else {
            recObj[value] = flag;
        }

    });
    return recObj;
};
var w = 0,
    m = 0,
    n = 0,
    o = 0,
    p = 0,
    q = 0,
    r = 0,
    s = 0,
    t = 0,
    u = 0;
var v = 0;

$("input[name='painIntensity1']").on('change', function() {
    w = parseInt($(this).val());
    w = w - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='personalCare1']").on('change', function() {
    m = parseInt($(this).val());
    m = m - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='lifting1']").on('change', function() {
    n = parseInt($(this).val());
    n = n - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='work1']").on('change', function() {
    o = parseInt($(this).val());
    o = o - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='headaches1']").on('change', function() {
    p = parseInt($(this).val());
    p = p - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});

$("input[name='concentration1']").on('change', function() {
    q = parseInt($(this).val());
    q = q - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='sleeping1']").on('change', function() {
    r = parseInt($(this).val());
    r = r - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='driving1']").on('change', function() {
    s = parseInt($(this).val());
    s = s - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='reading1']").on('change', function() {
    t = parseInt($(this).val());
    t = t - 1;
    neckCal(w + m + n + o + p + q + r + s + t + u);
});
$("input[name='recreation1']").on('change', function() {
    u = parseInt($(this).val());
    u = u - 1;
    neckCal(l + m + n + o + p + q + r + s + t + u);
});

function neckCal(param) {
    if (param != 0) {
        v = (param / 50) * 100;
        $('#neckPer').html("Percentage " + v.toFixed(2));
    }
}