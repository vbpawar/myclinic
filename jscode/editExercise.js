var loadexeDetails = details => {
    console.log(details);
    $('#title1').val(details.title);
    $('#details1').val(details.details);

    var src = "upload/exercise/" + details.id + ".jpg";
    $('#userJpg').attr("src", src);
    $('#userPic').attr("src", src);
};
loadexeDetails(exercise_details);