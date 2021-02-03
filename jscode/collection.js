var category = [];
var consultData = [];
var Tamt = [];
var Ramt = [];
var newR = [];
var bPatient = [];
var pTamt = [];
var packageT = [];
var pRamt = [];
var consultP = [];
var penamt = [];
var GropusOfServices = new Map();
var totalsum = new Map();
const getCollection = (fromDate, uptoDate, branch) => {
    $.ajax({
        url: url + 'getCollection.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branch },
        success: function(response) {
            console.log(response);
            $('#collectionT').dataTable().fnDestroy();
            $('#collectionD').empty();
            var tblData = '',
                badge = '',
                amtO = 0,
                amtR = 0,
                amtT = 0,
                packageCollection = 0,
                amtP = 0,pendingcollection=0;
                var arr = [];
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                GropusOfServices.clear();
                totalsum.clear();
                for (var i = 0; i < count; i++) {
                    let collect = response.Data[i];
                   
                    //for calculation of pending
                    if (GropusOfServices.has(collect.recieptId)) {
                        var arr = GropusOfServices.get(parseInt(collect.recieptId));
                        arr.push(parseFloat(collect.pending));
                    } else {
                        var arr = [];
                        arr.push(parseFloat(collect.pending));
                        GropusOfServices.set(parseInt(collect.recieptId), arr);
                    }
                    //calculation for total
                    
                    if (totalsum.has(collect.recieptId)) {
                        var arr = totalsum.get(parseInt(collect.recieptId));
                        arr.push(parseFloat(collect.total));
                    } else {
                        var arr = [];
                        arr.push(parseFloat(collect.total));
                        totalsum.set(parseInt(collect.recieptId), arr);
                    }
                    //end of logic
                    if (collect.isPackage == 0) {
                        badge = 'OPD';
                    } else {
                        badge = 'Package';
                        packageCollection = packageCollection + parseFloat(collect.amount);
                    }
                    amtO = amtO + parseFloat(collect.amount);
                    amtR = amtR + parseFloat(collect.received);
                    amtP = amtP + parseFloat(collect.pending);
                   
                    tblData += '<tr><td>' + collect.recieptId + ' </td><td>' + collect.createdAt + ' </td><td>' + collect.firstName + ' ' + collect.surname + '</td>';
                    tblData += '<td>' + collect.username + '</td>';
                    tblData += '<td>' + collect.discountType + '</td>';
                    tblData += '<td>' + badge + '</td>';
                    tblData += '<td>' + parseFloat(collect.originalAmt).toLocaleString('en-IN', { style: 'currency', currency: 'INR' }) + '</td>';
                    tblData += '<td>' + parseFloat(collect.amount).toLocaleString('en-IN', { style: 'currency', currency: 'INR' }) + '</td>';
                    tblData += '<td>' + parseFloat(collect.pending).toLocaleString('en-IN', { style: 'currency', currency: 'INR' }) + '</td>';
                    tblData += '<td>' + collect.paymentMode + '</td>';
                    tblData += '<td>' + collect.receivedBy + '</td>';
                    tblData += '<td>' + collect.visitDate + '</td>';
                    tblData += '<td><div class="table-actions" style="text-align: left;">';
                    tblData += '<a href="#" onclick="printReciept(' + (collect.paymentId) + ')" title="print reciept"><i class="fa fa-download text-blue"></i></a>';
                    tblData += '</div></td></tr>';
                }
                
            }
            totalsum.forEach((value, key) => {
                amtT = amtT + parseFloat(value);
            });
            
            GropusOfServices.forEach((value, key) => {
                pendingcollection = pendingcollection + parseFloat(value);
            });
            $('#collectionD').html(tblData);
            $('#amtO').html(amtO.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#PAamt').html(packageCollection.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#Ramount').html(amtO.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#Famount').html(amtT.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#Pamount').html(pendingcollection.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#pAmt').html(pendingcollection.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }));
            $('#collectionT').dataTable({
                // initComplete: function() {
                //     this.api().columns().every(function() {
                //         var column = this;
                //         var select = $('<select><option value=""></option></select>')
                //             .appendTo($(column.header()).empty())
                //             .on('change', function() {
                //                 var val = $.fn.dataTable.util.escapeRegex(
                //                     $(this).val()
                //                 );

                //                 column
                //                     .search(val ? '^' + val + '$' : '', true, false)
                //                     .draw();
                //             });

                //         column.data().unique().sort().each(function(d, j) {
                //             select.append('<option value="' + d + '">' + d + '</option>');
                //         });
                //     });
                // },
                searching: true,
                retrieve: true,
                bPaginate: $('tbody tr').length > 10,
                order: [],
                columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }
    });
};
const getConsultaion = (fromDate, uptoDate) => {
    Tamt = [];
    Ramt = [];
    newR = [];
    category = [];
    bPatient = [];
    penamt = [];
    consultData = [];
    $.ajax({
        url: url + 'getConsultation.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    category.push(response.Data[i].paymentDate);
                    Tamt.push(parseFloat(response.Data[i].total));
                    Ramt.push(parseFloat(response.Data[i].amount));
                    newR.push(parseInt(response.Data[i].newR));
                    bPatient.push(parseInt(response.Data[i].billedP));
                    penamt.push(parseInt(response.Data[i].pending));
                }
                consultData.push({ name: 'New Registration', data: newR });
                consultData.push({ name: 'Billed Patient', data: bPatient });
                consultData.push({ name: 'Total Amount', data: Tamt });
                consultData.push({ name: 'Recieved Amount', data: Ramt });
                consultData.push({ name: 'Pending Amount', data: penamt });
            }
            chart_consult(consultData, category);
        }
    });
};
const getPackageCollection = (fromDate, uptoDate) => {
    pTamt = [];
    packageT = [];
    pRamt = [];
    consultP = [];
    $.ajax({
        url: url + 'getPackageCollection.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    packageT.push(response.Data[i].paymentDate);
                    pTamt.push(parseFloat(response.Data[i].total));
                    pRamt.push(parseFloat(response.Data[i].amount));
                }
                consultP.push({ name: 'Total Amount', data: pTamt });
                consultP.push({ name: 'Recieved Amount', data: pRamt });
            }
            chart_package(consultP, packageT);
        }
    });
};
// getPackageCollection(data.today, data.today);
// getConsultaion(data.today, data.today);
$('#searchCollection').on('click', function(e) {
    e.preventDefault();
    $("#callRegister").validate({
        ignore: [],
        rules: {
            uptoDate: {
                required: true,
            },
            fromDate: {
                required: true
            },
        },
        messages: {
            fromDate: {
                required: "Select from Date"
            },
            uptoDate: {
                required: "Select upto Date"
            },
        }
    });
    var returnVal = $("#callRegister").valid();
    if (returnVal) {
        var branch = null;
        var fromDate = moment($('#fromDate').val()).format('YYYY-MM-DD');
        var uptoDate = moment($('#uptoDate').val()).format('YYYY-MM-DD');
        if ($('#branch').val() != '') {
            branch = $('#branch').val();
        }else{
            branch = data.branchId;
        }
        getCollection(fromDate, uptoDate, branch);
        // getConsultaion(fromDate, uptoDate);
        // getPackageCollection(fromDate, uptoDate);
    }
});

function printReciept(paymentId) {
    // var link = 'payment-reciept.php?paymentId=' + paymentId;
    // window.open(link, '_blank');
    $('<form action="payment-reciept.php" method="POST" target="_blank"><input type="hidden" name="ppaymentId" value="' + paymentId + '" /></form>').appendTo('body').submit();
}
getCollection(data.today, data.today,data.branchId);

function mapBranches(role,franchiseid,branchid) {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        let m =  branch.get(k);
        if(role == 9 || role == 5){
            dropdownList += '<option value="' + k + '"><b>'+ m.franchisename+'</b>-' + m.branchName+ '</option>';
        }else if(role == 6 || role == 8){
            if(franchiseid == m.franchiseid){
            dropdownList += '<option value="' + k + '">'+ m.branchName+ '</option>';
            }
        }else{
            if(branchid == m.branchId){
            dropdownList += '<option value="' + k + '">' + m.branchName+ '</option>';
            }
        }
    }
    $('#branch').html(dropdownList);
}
$(document).ready(function() {
    mapBranches(data.role,data.franchiseid,data.branchId);
    $("#branch").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
});

function chart_consult(seriesData, categories) {
    Highcharts.chart('high', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'OPD Payment'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: seriesData
    });
}

function chart_package(seriesData, categories) {
    Highcharts.chart('package', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Package Collection'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: seriesData
    });
}