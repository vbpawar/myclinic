function getDate(date) {
    var output = '-';
    if (date == null) {
        return output;
    } else {
        var d = new Date(date);
        output = d.toDateString(); // outputs to "Thu May 28 2015"
        //output = d.toGMTString(); //outputs to "Thu, 28 May 2015 22:10:21 GMT"
    }
    return output;
}