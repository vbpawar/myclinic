var users = new Map();
var user_details = {};
var userId_np = null;
// var global_date = moment().format('YYYY-MM-DD');
const getAllUsers = (userId) => {
    $.ajax({
        url: url + 'userSetting.php',
        type: 'POST',
        dataType: 'json',
        data: { userId: userId },
        success: function(response) {
          
            if (response.Responsecode == 200) {
               
                users.set(response.Data.userId, response.Data);
                $('#username1').html(response.Data.username);
                $('#mobile').html(response.Data.mobile);
                console.log(username1);
                   
         
            }
        }
    });
};
getAllUsers(data.userId);


