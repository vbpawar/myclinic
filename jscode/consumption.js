var transactions = new Map();
var exchangeT = new Map();
var detailId_u = null;

function loadConsumption(details) {
    $('#pNamee').html(details.title);
    $('#pCoste').html(details.packageCost);
    $('#purchaseDatee').html(details.purchaseDate);
    loadTransactions(details.pId);
    exchange(details.pId);
}
loadConsumption(packageDetail);

function loadTransactions(pId) {
    $.ajax({
        url: url + 'getPackageTransactions.php',
        type: 'POST',
        data: { pId: pId },
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                var n = response.Data.length;
                for (var i = 0; i < n; i++) {
                    transactions.set(response.Data[i].DetailId, response.Data[i]);
                }
            }
            listTransactions(transactions);
        }
    });
}

function exchange(pId) {
    $.ajax({
        url: url + 'getExchangeTransactions.php',
        type: 'POST',
        data: { pId: pId },
        dataType: 'json',
        success: function(response) {
            exchangeT.clear();
            if (response.Data != null) {
                var n = response.Data.length;
                for (var i = 0; i < n; i++) {
                    exchangeT.set(response.Data[i].transactionId, response.Data[i]);

                }
            }
            exchange_list(exchangeT);
        }
    });
}

function exchange_list(exchangeT) {
    $('#exchangeT').dataTable().fnDestroy();
    $('#exchangeData').empty();
    var tbldata = '';
    exchangeT.forEach(element => {
        tbldata += '<tr><td>' + element.testName + '</td><td>' + element.transactionType + '</td>';
        tbldata += '<td>' + element.username + '</td>';
        tbldata += '<td>' + element.created_at + '</td>';
        tbldata += '<td style="width:5%;"><button type="button" class="btn btn-icon btn-danger" onclick="deleteQuota(' + element.transactionId + ')" title="Click to revert transaction"><i class="ik ik-minus"></i></button></td></tr>';
    });
    $('#exchangeData').html(tbldata);
    $('#exchangeT').dataTable();
}

function listTransactions(transactions) {
    $('#packageTest').dataTable().fnDestroy();
    $('#packageTestData').empty();
    var tbldata = '',
        consume = 0,
        str = '';
    transactions.forEach(element => {
        consume = (parseInt(element.originalQuota) - parseInt(element.consumed));
        if (consume >= 1) {
            str = '<td style="width:5%;"><button type="button" class="btn btn-icon btn-danger" onclick="consumeNow(' + element.DetailId + ')" title="Click to consume"><i class="ik ik-minus"></i></button></td>';
        } else {
            str = '<td></td>';
        }
        tbldata += '<tr><td>' + element.testName + '</td>';
        tbldata += '<td>' + element.originalQuota + '</td>';
        tbldata += '<td>' + (parseInt(element.originalQuota) - parseInt(element.consumed)) + '</td>';
        tbldata += '<td>' + element.consumed + '</td>';
        tbldata += '<td>' + element.lastUsed + '</td>';
        tbldata += str;
        tbldata += '<td style="width:5%;"><button type="button" class="btn btn-icon btn-success" onclick="creditQuota(' + element.DetailId + ')" title="Click to Credit Quota"><i class="ik ik-plus"></i></button></td></tr>';
    });
    $('#packageTestData').html(tbldata);
    $('#packageTest').dataTable();
}

function consumeNow(detailId) {
    detailId = detailId.toString();
    if (transactions.has(detailId)) {
        let transaction = transactions.get(detailId);
        let consume = parseInt(transaction.consumed);
        $.ajax({
            url: url + 'consumeTransaction.php',
            type: 'POST',
            data: { detailId: detailId, userId: data.userId },
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    consume = consume + 1;
                    transaction.consumed = consume;
                    transactions.set(detailId, transaction);
                    if (response.Data != null) {
                        exchangeT.set(response.Data.transactionId, response.Data);
                        exchange_list(exchangeT);
                    }
                }
                listTransactions(transactions);
            }
        });
    }
}

function fromBack() {
    $('.load-pack').empty();
    $('.s').show();
}

function creditQuota(detailId) {
    detailId = detailId.toString();
    detailId_u = detailId;
    if (transactions.has(detailId)) {
        $('#creditQuota').modal('show');
    }
}

function deleteQuota(transactionId) {
    transactionId = transactionId.toString();
    if (exchangeT.has(transactionId)) {
        let tran = exchangeT.get(transactionId);
        $.ajax({
            url: url + 'revertTransaction.php',
            type: 'POST',
            data: {
                detailId: tran.detailId,
                typeCount: tran.typeCount,
                transactionId: transactionId
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
                    exchangeT.delete(transactionId);
                    exchange_list(exchangeT);
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
    }
}