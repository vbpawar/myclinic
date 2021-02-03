$('#takeFeedbackForm').on('submit', function(e) {
    e.preventDefault();
    var feedback = document.getElementById('feedbacknew').value;
    $.ajax({
        url: url + 'insertFeedback.php',
        type: 'POST',
        data: {
            callId: up_callId,
            feedback: feedback,
            userId: data.userId,
            suserid:data.userId,
            susername:data.username
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
                $('#takeFeedback').modal('hide');
                $('#takeFeedbackForm').trigger('reset');
                followupes.set(response.Data.callFollowupsId, response.Data);
                listFollowup(followupes);
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
});