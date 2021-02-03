$('#lumbarSpineForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#lumbarSpineForm").valid();
    if (returnVal) {

        var momentLoss = storemomentLoss();
        console.log(momentLoss);
        var testMovement = storeTest();
        var ob = getAgg();
        ob.otherA = $('#aggravatingFactor1').val();
        var relfactorObj = getRelivingFactor();
        relfactorObj.otherR = $('#relivingFactor1').val();
        var presentSinceObj = getpresentSince();
        presentSinceObj.s = $('#presentSince1').val();

        var symObj = getsymptomsAtOnset();
        symObj.s1 = $('#symptomsAtOnset1').val();

        var conObj = getconsym();
        conObj.s2 = $('#constantSymptoms1').val();
        var insymObj = getinterSymptoms();
        insymObj.s3 = $('#interSymptoms1').val();
        var symtObj = getspecSymptoms();
        var blrObj = getbladder();
        var mediObj = getmedications();
        mediObj.other = $('#medications1').val();
        var genObj = getGeneralHealth();
        genObj.GHealth = $('#GeneralHealth1').val();
        var imgObj = getimaging();
        imgObj.imaging = $('#imaging1').val();
        var recObj = getrecentsurgery();
        recObj.surgery = $('#recentsurgery1').val();
        var nigObj = getnightPain();
        nigObj.nPain = $('#nightPain1').val();
        var accObj = getaccidents();
        accObj.acc = $('#accidents1').val();
        var waitObj = getweightLoss();
        waitObj.weight = $('#weightLoss1').val();
        waitObj.other1 = $('#weightLoss2').val();
        var setObj = getsitting();
        var larObj = getlordosis();
        var lshift = getlateralshift();

        var derObj = getderangement();
        derObj['other'] = $('#derangement2').val();
        derObj['painlocation'] = $('#derangement1').val();
        var mechObj = getmechTherapy();
        mechObj['therapy'] = $('#mechTherapy1').val();

        var fun = $('#funDisabilityScore').val();
        var vas = $('#vasScore').val();
        var pre = $('#presentSymptoms').val();
        var com = $('#commencedAsResult').val();
        var pretreat = $('#prevTreatments').val();
        var motorObj = $('#motorDeficit').val();
        var sensoryObj = $('#sensoryDeficit').val();

        // fData.append('aggravatingFactor',ob);

        ob = JSON.stringify(ob);
        relfactorObj = JSON.stringify(relfactorObj);
        presentSinceObj = JSON.stringify(presentSinceObj);
        symObj = JSON.stringify(symObj);
        conObj = JSON.stringify(conObj);
        insymObj = JSON.stringify(insymObj);
        symtObj = JSON.stringify(symtObj);
        blrObj = JSON.stringify(blrObj);
        mediObj = JSON.stringify(mediObj);
        genObj = JSON.stringify(genObj);
        imgObj = JSON.stringify(imgObj);
        recObj = JSON.stringify(recObj);
        nigObj = JSON.stringify(nigObj);
        accObj = JSON.stringify(accObj);
        waitObj = JSON.stringify(waitObj);
        setObj = JSON.stringify(setObj);
        larObj = JSON.stringify(larObj);
        derObj = JSON.stringify(derObj);
        mechObj = JSON.stringify(mechObj);
        lshift = JSON.stringify(lshift);
        momentLoss = JSON.stringify(Object.assign({}, momentLoss));
        testMovement = JSON.stringify(Object.assign({}, testMovement));
        $.ajax({
            url: url + 'insertLumbarSpine.php',
            type: 'POST',
            data: {
                patientId: global_patientId,
                visitDate: global_date,
                moveMentLoss: momentLoss,
                testMovement: testMovement,
                factor: ob,
                reliving: relfactorObj,
                presentSince: presentSinceObj,
                symptomsAtOnset: symObj,
                constantSymptoms: conObj,
                interSymptoms: insymObj,
                specSymptoms: symtObj,
                bladder: blrObj,
                medications: mediObj,
                GeneralHealth: genObj,
                imaging: imgObj,
                recentsurgery: recObj,
                nightPain: nigObj,
                accidents: accObj,
                weightLoss: waitObj,
                sitting: setObj,
                lordosis: larObj,
                derangement: derObj,
                mechTherapy: mechObj,
                funDisabilityScore: fun,
                vasScore: vas,
                presentSymptoms: pre,
                commencedAsResult: com,
                prevTreatments: pretreat,
                motorDeficit: motorObj,
                sensoryDeficit: sensoryObj,
                lateralshift: lshift
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

                    if (editS == 1) {
                        if (spines.has(uSpineId)) {
                            spines.delete(uSpineId);
                            editS = 0;
                        }
                    }
                    spines.set(response.Data.lsAId, response.Data);
                    $('#fullwindowModal2').modal('hide');
                    $('#lumbarSpineForm').trigger('reset');
                    showLumbarSpine(spines);
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

var getAgg = () => {
    var ob = {};
    $.each($("input[name='aggravatingFactor']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            ob[value] = flag;
        } else {
            ob[value] = flag;
        }

    });
    return ob;
};

var getRelivingFactor = () => {
    var relfactorObj = {};
    $.each($("input[name='relivingFactor']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            relfactorObj[value] = flag;
        } else {
            relfactorObj[value] = flag;
        }

    });
    return relfactorObj;
};

var getpresentSince = () => {
    var presentSinceObj = {};
    $.each($("input[name='presentSince']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            presentSinceObj[value] = flag;
        } else {
            presentSinceObj[value] = flag;
        }
    });
    return presentSinceObj;
};

var getsymptomsAtOnset = () => {
    var symObj = {};
    $.each($("input[name='symptomsAtOnset']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            symObj[value] = flag;
        } else {
            symObj[value] = flag;
        }
    });
    return symObj;
};

var getconsym = () => {
    var conObj = {};
    $.each($("input[name='constantSymptoms']"), function() {
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

var getinterSymptoms = () => {
    var insymObj = {};
    $.each($("input[name='interSymptoms']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            insymObj[value] = flag;
        } else {
            insymObj[value] = flag;
        }
    });
    return insymObj;
};
var getspecSymptoms = () => {
    var symtObj = {};
    $.each($("input[name='specSymptoms']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            symtObj[value] = flag;
        } else {
            symtObj[value] = flag;
        }
    });
    return symtObj;
};

var getbladder = () => {
    var blrObj = {};
    $.each($("input[name='bladder']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            blrObj[value] = flag;
        } else {
            blrObj[value] = flag;
        }
    });
    return blrObj;
};
var getmedications = () => {
    var mediObj = {};
    $.each($("input[name='medications']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            mediObj[value] = flag;
        } else {
            mediObj[value] = flag;
        }
    });
    return mediObj;
};

var getGeneralHealth = () => {
    var genObj = {};
    $.each($("input[name='GeneralHealth']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            genObj[value] = flag;
        } else {
            genObj[value] = flag;
        }
    });
    return genObj;
};

var getimaging = () => {
    var imgObj = {};
    $.each($("input[name='imaging']"), function() {
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

var getrecentsurgery = () => {
    var recObj = {};
    $.each($("input[name='recentsurgery']"), function() {
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
var getnightPain = () => {
    var nigObj = {};
    $.each($("input[name='nightPain']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            nigObj[value] = flag;
        } else {
            nigObj[value] = flag;
        }
    });
    return nigObj;
};

var getaccidents = () => {
    var accObj = {};
    $.each($("input[name='accidents']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            accObj[value] = flag;
        } else {
            accObj[value] = flag;
        }
    });
    return accObj;
};

var getweightLoss = () => {
    var waitObj = {};
    $.each($("input[name='weightLoss']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            waitObj[value] = flag;
        } else {
            waitObj[value] = flag;
        }
    });
    return waitObj;
};

var getsitting = () => {
    var setObj = {};
    $.each($("input[name='sitting']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            setObj[value] = flag;
        } else {
            setObj[value] = flag;
        }
    });
    return setObj;
};

var getlordosis = () => {
    var larObj = {};
    $.each($("input[name='lordosis']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            larObj[value] = flag;
        } else {
            larObj[value] = flag;
        }
    });
    return larObj;
};

var getderangement = () => {
    var derObj = {};
    $.each($("input[name='derangement']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            derObj[value] = flag;
        } else {
            derObj[value] = flag;
        }
    });
    return derObj;
};
var getmechTherapy = () => {
    var mechObj = {};
    $.each($("input[name='mechTherapy']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            mechObj[value] = flag;
        } else {
            mechObj[value] = flag;
        }
    });
    return mechObj;
};

var getlateralshift = () => {
    var lshift = {};
    $.each($("input[name='lateralshift']"), function() {
        var flag = 0;
        var value = $(this).val();
        if (this.checked) {
            flag = 1;
            lshift[value] = flag;
        } else {
            lshift[value] = flag;
        }
    });
    return lshift;
};


function storemomentLoss() {
    var TableData = [];
    $('#momentLoss tr').each(function(row, tr) {
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

function storeTest() {
    var TableData = [];

    $('#testMovement tr').each(function(row, tr) {
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