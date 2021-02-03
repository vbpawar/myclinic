$('#cervicalSpineForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#cervicalSpineForm").valid();
    if (returnVal) {


        var fun = $('#cerFunDisabilityScore').val();
        var carVas = $('#cerVasScore').val();
        var pres = $('#cerPresentSymptoms').val();
        var cerComObj = $('#cerCommencedAsResult').val();

        var cerPresObj = getcerPresentSince();
        cerPresObj.p1 = $('#cerpresentSinceNew').val();

        var symObj1 = getcerSymptAtOnset();
        symObj1.p2 = $('#cerSymptAtOnset1').val();

        var constObj = getcerConstSympt();
        constObj.p3 = $('#cerConstSympt1').val();

        var disObj = getdisturbedSleep();
        disObj.p4 = $('#disturbedSleep1').val();

        var agObj = getcerAggrFactor();
        agObj.ag1 = $('#cerAggrFactor1').val();

        var reObj = getcerRelFactor();
        reObj.rf1 = $('#cerRelFactor1').val();

        var syreObj = getcarSymptoms();

        var medObj = getcerMedications();
        medObj.p5 = $('#cerMedications1').val();

        var geneObj = getcerGenHealth();
        geneObj.p6 = $('#cerGenHealth1').val();

        var imgObj = getcerImaging();
        imgObj.p7 = $('#cerImaging1').val();

        var surObj = getcerResurgery();
        surObj.p8 = $('#cerResurgery1').val();

        var nObj = getcerNightPain();
        nObj.p9 = $('#cerNightPain1').val();

        var acObj = getcerAccidents();
        acObj.p10 = $('#cerAccidents1').val();


        var wtObj = getcerWeightLoss();
        wtObj.wOther = $('#cerWeightLoss2').val();
        wtObj.wt = $('#cerWeightLoss1').val();

        var csitObj = getcerSitting();
        var standObj = getcerStanding();
        var proObj = getprotrudedHead();
        var deObj = getcerderagement();
        deObj.d1 = $('#cerderagement1').val();
        deObj.d2 = $('#cerderagement2').val();

        cerPresObj = JSON.stringify(cerPresObj);
        symObj1 = JSON.stringify(symObj1);
        constObj = JSON.stringify(constObj);
        disObj = JSON.stringify(disObj);
        agObj = JSON.stringify(agObj);
        reObj = JSON.stringify(reObj);
        syreObj = JSON.stringify(syreObj);
        medObj = JSON.stringify(medObj);
        geneObj = JSON.stringify(geneObj);
        imgObj = JSON.stringify(imgObj);
        surObj = JSON.stringify(surObj);
        nObj = JSON.stringify(nObj);
        acObj = JSON.stringify(acObj);
        wtObj = JSON.stringify(wtObj);
        csitObj = JSON.stringify(csitObj);
        standObj = JSON.stringify(standObj);
        proObj = JSON.stringify(proObj);
        deObj = JSON.stringify(deObj);

        var momentLoss = storeMovement();
        var testMovement = storeT();

        momentLoss = JSON.stringify(Object.assign({}, momentLoss));
        testMovement = JSON.stringify(Object.assign({}, testMovement));
        $.ajax({
            url: url + 'insertCervicalSpine.php',
            type: 'POST',
            data: {
                patientId: global_patientId,
                visitDate: global_date,
                cerFunDisabilityScore: fun,
                cerVasScore: carVas,
                cerPresentSymptoms: pres,
                cerPresentSince: cerPresObj,
                cerCommencedAsResult: cerComObj,
                cerSymptAtOnset: symObj1,
                cerConstSympt: constObj,
                disturbedSleep: disObj,
                cerAggrFactor: agObj,
                cerRelFactor: reObj,
                carSymptoms: syreObj,
                cerMedications: medObj,
                cerGenHealth: geneObj,
                cerImaging: imgObj,
                cerResurgery: surObj,
                cerNightPain: nObj,
                cerAccidents: acObj,
                cerWeightLoss: wtObj,
                cerSitting: csitObj,
                cerStanding: standObj,
                protrudedHead: proObj,
                cerderagement: deObj,
                cerMomentLoss: momentLoss,
                cerTestMovement: testMovement
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
                    console.log(editC);
                    if (editC == 1) {
                        if (cervicals.has(uCerv)) {
                            cervicals.delete(uCerv);
                            console.log(editC);
                            editC = 0;
                        }
                    }
                    cervicals.set(response.Data.cerSpineId, response.Data);
                    $('#cervicalSpine').modal('hide');
                    $('#cervicalSpineForm').trigger('reset');
                    showCervicalSpine(cervicals);
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

var getcerPresentSince = () => {
    var cerPresObj = {};
    $.each($("input[name='cerPresentSince']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            cerPresObj[value] = flag;
        } else {
            cerPresObj[value] = flag;
        }

    });
    return cerPresObj;
};

var getcerSymptAtOnset = () => {
    var symObj1 = {};
    $.each($("input[name='cerSymptAtOnset']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            symObj1[value] = flag;
        } else {
            symObj1[value] = flag;
        }

    });
    return symObj1;
};

var getcerConstSympt = () => {
    var constObj = {};
    $.each($("input[name='cerConstSympt']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            constObj[value] = flag;
        } else {
            constObj[value] = flag;
        }

    });
    return constObj;
};

var getdisturbedSleep = () => {
    var disObj = {};
    $.each($("input[name='disturbedSleep']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            disObj[value] = flag;
        } else {
            disObj[value] = flag;
        }

    });
    return disObj;
};

var getcerAggrFactor = () => {
    var agObj = {};
    $.each($("input[name='cerAggrFactor']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            agObj[value] = flag;
        } else {
            agObj[value] = flag;
        }

    });
    return agObj;
};

var getcerRelFactor = () => {
    var reObj = {};
    $.each($("input[name='cerRelFactor']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            reObj[value] = flag;
        } else {
            reObj[value] = flag;
        }

    });
    return reObj;
};

var getcarSymptoms = () => {
    var syreObj = {};
    $.each($("input[name='carSymptoms']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            syreObj[value] = flag;
        } else {
            syreObj[value] = flag;
        }

    });
    return syreObj;
};

var getcerMedications = () => {
    var medObj = {};
    $.each($("input[name='cerMedications']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            medObj[value] = flag;
        } else {
            medObj[value] = flag;
        }

    });
    return medObj;
};

var getcerGenHealth = () => {
    var geneObj = {};
    $.each($("input[name='cerGenHealth']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            geneObj[value] = flag;
        } else {
            geneObj[value] = flag;
        }

    });
    return geneObj;
};


var getcerImaging = () => {
    var imgObj = {};
    $.each($("input[name='cerImaging']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            imgObj[value] = flag;
        } else {
            imgObj[value] = flag;
        }

    });
    return imgObj;
};


var getcerResurgery = () => {
    var reObj = {};
    $.each($("input[name='cerResurgery']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            reObj[value] = flag;
        } else {
            reObj[value] = flag;
        }

    });
    return reObj;
};


var getcerNightPain = () => {
    var nObj = {};
    $.each($("input[name='cerNightPain']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            nObj[value] = flag;
        } else {
            nObj[value] = flag;
        }

    });
    return nObj;
};



var getcerAccidents = () => {
    var acObj = {};
    $.each($("input[name='cerAccidents']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            acObj[value] = flag;
        } else {
            acObj[value] = flag;
        }

    });
    return acObj;
};


var getcerWeightLoss = () => {
    var wtObj = {};
    $.each($("input[name='cerWeightLoss']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            wtObj[value] = flag;
        } else {
            wtObj[value] = flag;
        }

    });
    return wtObj;
};
var getcerSitting = () => {
    var csitObj = {};
    $.each($("input[name='cerSitting']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            csitObj[value] = flag;
        } else {
            csitObj[value] = flag;
        }

    });
    return csitObj;
};


var getcerStanding = () => {
    var standObj = {};
    $.each($("input[name='cerStanding']"), function() {
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

var getprotrudedHead = () => {
    var proObj = {};
    $.each($("input[name='protrudedHead']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            proObj[value] = flag;
        } else {
            proObj[value] = flag;
        }

    });
    return proObj;
};

var getcerderagement = () => {
    var deObj = {};
    $.each($("input[name='cerderagement']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            deObj[value] = flag;
        } else {
            deObj[value] = flag;
        }

    });
    return deObj;
};

function storeMovement() {
    var TableData = [];

    $('#cerMomentLoss tr').each(function(row, tr) {
        var maj = $(tr).find('td:eq(0) input').is(':checked') ? 1 : 0;
        var mod = $(tr).find('td:eq(1) input').is(':checked') ? 1 : 0;
        var min = $(tr).find('td:eq(2) input').is(':checked') ? 1 : 0;
        var nil = $(tr).find('td:eq(3) input').is(':checked') ? 1 : 0;
        var pain = $(tr).find('td:eq(4) input').is(':checked') ? 1 : 0;

        TableData[row] = {
            "maj": maj,
            "mod": mod,
            "min": min,
            "nil": nil,
            "pain": pain
        };
    });
    TableData.shift();
    return TableData;
}

function storeT() {
    var TableData = [];

    $('#cerTestMovement tr').each(function(row, tr) {
        var maj = $(tr).find('td:eq(0) input').val();
        var mod = $(tr).find('td:eq(1) input').val();
        var min = $(tr).find('td:eq(2) input').val();
        var nil = $(tr).find('td:eq(3) input').val();
        var pain = $(tr).find('td:eq(4) input').val();

        TableData[row] = {
            "During-test": maj,
            "after-test": mod,
            "m-rom-u": min,
            "m-rom-d": nil,
            "m-noefect": pain
        };
    });

    TableData.shift();
    TableData.shift();
    return TableData;
}