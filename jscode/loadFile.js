var loadFile = function(event) {
    var output = document.getElementById('userJpg');
    output.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('userPic').src = URL.createObjectURL(event.target.files[0]);
};

var loadpic = function(event) {
    var output = document.getElementById('reffredJpg');
    output.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('imgProfile').src = URL.createObjectURL(event.target.files[0]);
};