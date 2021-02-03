function packagedropdownsecond() {
    var dropDownList = '<option></option>';
    packageList.forEach((value, key) => {
        dropDownList += "<option value=" + key + ">" + value.title + "</option>";
    });
    $('#packageIds').html(dropDownList);
    $('#packageIds').select2({
        placeholder: 'Select Package from list',
        allowClear: true,
        dropdownParent: $('#opd-payment-generate')
    });
}
packagedropdownsecond();

function payment(packageId) {
    let package = packageList.get(packageId);
    if (packageList.has(packageId)) {
        tAmt = parseFloat(package.cost);
        var rowhtml = '',
            rowid = 0;
        if (package.packagedetails != null) {
            var count = package.packagedetails.length;
            for (var i = 0; i < count; i++) {
                rowid += 1;
                rowhtml += '<tr id="row' + rowid + '">';
                rowhtml += '<td style="display:none;">' + package.packagedetails[i].testId + '</td>';
                rowhtml += '<td>';
                rowhtml += package.packagedetails[i].testName;
                rowhtml += '</td>';
                rowhtml += '<td>';
                rowhtml += package.packagedetails[i].quota;
                rowhtml += '</td>';
                rowhtml += '<td>';
                rowhtml += '<button type="button" class="btn btn-icon btn-danger"><i class="ik ik-minus"></i></button>';
                rowhtml += '</td>';
                rowhtml += '</tr>';
            }
        }
        originalAmt = tAmt;
        $("#presTableBody").html(rowhtml);
        $('#fTotal').html(tAmt.toLocaleString());
        $('#tAmt').val(tAmt);
    }
}