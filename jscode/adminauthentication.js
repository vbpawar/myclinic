$('#signin').on('submit', function(event) {
    event.preventDefault();
    var loginData = {
        username: $('#username').val(),
        password: $('#passwrd').val()
    };
    $.ajax({
        url: url + 'adminauthentication.php',
        type: 'POST',
        data: loginData,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                console.log(response);
               window.location.href = 'adminsession.php?licensorid=' + response.Data.licensorid + '&username=' + response.Data.firmname;
            } else {
                $('.message').show();
            }
        },
        complete: function() {
            $("#wait").css("display", "none");
        }
    });
});