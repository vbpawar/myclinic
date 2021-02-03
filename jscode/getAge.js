const getAge = (birthDate) => {
    var years = moment().diff(birthDate, 'years', false);
    return years;
};

const getBirthDay = (param) => {
    param = parseInt(param);
    var date = moment().subtract(param, 'y').toDate();
    var birthDate = moment(date).format('YYYY-MM-DD');
    $('#birthdate').val(birthDate);
};