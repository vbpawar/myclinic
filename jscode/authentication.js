$('#signin').on('submit', function(event) {
    event.preventDefault();
    var loginData = {
        username: $('#username').val(),
        passwrd: $('#passwrd').val()
    };
    $.ajax({
        url: url + 'authenticate.php',
        type: 'POST',
        data: loginData,
        dataType: 'json',
        async:false,
        success: function(response) {
            if (response.Responsecode == 200) {
                var page = '',user='',flag=0;
                localStorage.clear();
                if(response.Data.sidebar !=null){
                    flag = 1;
                    var count = response.Data.sidebar.length;
                    response.Data.sidebar.sort();
                    page = response.Data.sidebar[0].pagename;
                    for(var i=0;i<count;i++){
                        localStorage.setItem(response.Data.sidebar[i].accessid, JSON.stringify(response.Data.sidebar[i]));
                      // sidebar.set(response.Data.sidebar.accessid,response.Data.sidebar[i]);
                    }
                }
                if(flag==1){
                if(response.Data.logindetails != null){
                    user = response.Data.logindetails;
                     window.location.href = 'createSession.php?userId=' + user.userId + '&branchId=' + user.branchId + '&username=' + user.username + '&role=' + user.roleid + '&roleName=' + user.role+'&franchiseid='+user.franchiseid+'&page='+page;
                }
            }else{
                $('.message').show(); 
            }
            } else {
                $('.message').show();
            }
        },
        complete: function() {
            $("#wait").css("display", "none");
        }
    });
});