var loadPatientDetails = details => {
    console.log(details);
    $('#uname').html(details.firstName + ' ' + details.surname);
    $('#uemailId').html(details.email);
    $('#uphone').html(details.mobile1);
    $('#uadd').html(details.address + ' ' + details.cityName);
    $('#ucity').html(details.cityName);
    $('#uage').html(getAge(details.birthDate));
    $('#ugender').html(details.gender);

    $('#firstName').val(details.firstName);
    $('#middleName').val(details.middleName);
    $('#surname').val(details.surname);
    $('#maritalstatus').val(details.maritalstatus).trigger('change');
    $('#religion').val(details.religion).trigger('change');
    $('#remarks1').val(details.remarks);

    $('#country1').val(details.country).trigger('change');

    $('#pincode').val(details.pincode);
    $('#address1').val(details.address);
    $('#state1').val(details.state).trigger('change');
    $('#lastVisitDate').val(details.lastVisitDate);
    $('#nextVisitDate').val(details.nextVisitDate);
    $('#city1').val(details.city).trigger('change');
    $('#firstVisitDate').val(details.firstVisitDate);

    if (details.alcohol == 1)
        $('#alcohol').attr("checked", true);
    if (details.tobacco == 1)
        $('#tobacco').attr("checked", true);
    if (details.diabetes == 1)
        $('#diabetes').attr("checked", true);
    if (details.smoking == 1)
        $('#smoking').attr("checked", true);
    if (details.HTN == 1)
        $('#HTN').attr("checked", true);
    if (details.cholestrol == 1)
        $('#cholestrol').attr("checked", true);

    if (details.hardDrink == 1)
        $('#hardDrink').attr("checked", true);

    $('#mobile1').val(details.mobile1);
    $('#email').val(details.email);
    $('#landline').val(details.landline);
    $('#gender').val(details.gender).trigger('change');
    $('#birthDate').val(details.birthDate);

    $('#height').val(details.height);
    $('#weight').val(details.weight);
    $('#occupation').val(details.occupation);
    $('#referredbye').val(details.referredby).trigger('change');
    $('#economicStrata').val(details.economicStrata);
    $('#patientId').val(details.patientId);
    //for open profile pictire in edit mode
    var src = "upload/patients/" + details.patientId + ".jpg";
    $('#userJpg').attr("src", src);
    $('#userPic').attr("src", src);
};

loadPatientDetails(patient_details);
getPatientAppointments(patient_details.patientId);