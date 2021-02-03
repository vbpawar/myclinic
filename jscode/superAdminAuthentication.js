$('#signin').on('submit', function(event) {
    event.preventDefault();
    var loginData = {
        username: $('#username').val(),
        password: $('#passwrd').val()
    };
    $.ajax({
        url: url + 'superAdminAuthentictn.php',
        type: 'POST',
        data: loginData,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                console.log(response);
               window.location.href = 'createSuperAdminSession.php?franchiseid=' + response.Data.franchiseid + '&username=' + response.Data.contactperson;
            } else {
                $('.message').show();
            }
        },
        complete: function() {
            $("#wait").css("display", "none");
        }
    });
});