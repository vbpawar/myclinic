$('#backPainForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#backPainForm").valid();
    if (returnVal) {
        var painObj = getpainIntensity();
        var perObj = getpersonalCare();
        var liftObj = getlifting();
        var walkObj = getwalking();
        var sittObj = getsitting_1();
        var standObj = getstanding();
        var sleepObj = getsleeping();
        var socialObj = getsocialLife();
        var traObj = gettravel();
        var chanObj = getchangingDegreeOfPain();

        painObj = JSON.stringify(painObj);
        perObj = JSON.stringify(perObj);
        liftObj = JSON.stringify(liftObj);
        walkObj = JSON.stringify(walkObj);
        sittObj = JSON.stringify(sittObj);
        standObj = JSON.stringify(standObj);
        sleepObj = JSON.stringify(sleepObj);
        socialObj = JSON.stringify(socialObj);
        traObj = JSON.stringify(traObj);
        chanObj = JSON.stringify(chanObj);
        $.ajax({
            url: url + 'insertBackPainQues.php',
            type: 'POST',
            data: {
                patientId: global_patientId,
                visitDate: global_date,
                painIntensity: painObj,
                personalCare: perObj,
                lifting: liftObj,
                walking: walkObj,
                sitting1: sittObj,
                standing: standObj,
                sleeping: sleepObj,
                socialLife: socialObj,
                travel: traObj,
                changingDegreeOfPain: chanObj
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
                    if (editB == 1) {
                        if (backPain.has(ubackPainId)) {
                            backPain.delete(ubackPainId);
                            editB = 0;
                        }
                    }
                    $('#backPainForm').trigger('reset');
                    $('#backPain').modal('hide');
                    backPain.set(response.Data.lbackpId, response.Data);
                    showBackPain(backPain);
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

var getpainIntensity = () => {
    var painObj = {};
    $.each($("input[name='painIntensity']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            painObj[value] = flag;

        } else {

            painObj[value] = flag;
        }

    });
    return painObj;
};

var getpersonalCare = () => {
    var perObj = {};
    $.each($("input[name='personalCare']"), function() {
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

var getlifting = () => {
    var liftObj = {};
    $.each($("input[name='lifting']"), function() {
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

var getwalking = () => {
    var walkObj = {};
    $.each($("input[name='walking']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            walkObj[value] = flag;
        } else {
            walkObj[value] = flag;
        }

    });
    return walkObj;
};

var getsitting_1 = () => {
    var sittObj = {};
    $.each($("input[name='sitting1']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            sittObj[value] = flag;
        } else {
            sittObj[value] = flag;
        }

    });
    return sittObj;
};

var getstanding = () => {
    var standObj = {};
    $.each($("input[name='standing']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            standObj[value] = flag;
        } else {
            standObj[value] = flag;
        }

    });
    return standObj;
};

var getsleeping = () => {
    var sleepObj = {};
    $.each($("input[name='sleeping']"), function() {
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
var getsocialLife = () => {
    var socialObj = {};
    $.each($("input[name='socialLife']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            socialObj[value] = flag;
        } else {
            socialObj[value] = flag;
        }

    });
    return socialObj;
};

var gettravel = () => {
    var traObj = {};
    $.each($("input[name='travel']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            traObj[value] = flag;
        } else {
            traObj[value] = flag;
        }

    });
    return traObj;
};

var getchangingDegreeOfPain = () => {
    var chanObj = {};
    $.each($("input[name='changingDegreeOfPain']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            chanObj[value] = flag;
        } else {
            chanObj[value] = flag;
        }

    });
    return chanObj;
};
var a = 0,
    b = 0,
    c = 0,
    d = 0,
    e = 0,
    f = 0,
    g = 0,
    h = 0,
    l = 0,
    j = 0;
var k = 0;

$("input[name='changingDegreeOfPain']").on('change', function() {
    a = parseInt($(this).val());
    a = a - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='travel']").on('change', function() {
    b = parseInt($(this).val());
    b = b - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='socialLife']").on('change', function() {
    c = parseInt($(this).val());
    c = c - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='sleeping']").on('change', function() {
    d = parseInt($(this).val());
    d = d - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='standing']").on('change', function() {
    e = parseInt($(this).val());
    e = e - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});

$("input[name='painIntensity']").on('change', function() {
    f = parseInt($(this).val());
    f = f - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='personalCare']").on('change', function() {
    g = parseInt($(this).val());
    g = g - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='lifting']").on('change', function() {
    h = parseInt($(this).val());
    h = h - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='walking']").on('change', function() {
    l = parseInt($(this).val());
    l = l - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});
$("input[name='sitting1']").on('change', function() {
    j = parseInt($(this).val());
    j = j - 1;
    cal(a + b + c + d + e + f + g + h + l + j);
});

function cal(param) {
    if (param != 0) {
        k = (param / 50) * 100;
        $('#per').html("Percentage " + k.toFixed(2));
    }
}