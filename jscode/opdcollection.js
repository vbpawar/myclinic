var fromDate = null,
    uptoDate = null;
var donut = [],
    discount = [];
const donutresult = (fromDate, uptoDate) => {
    donut = [];
    $.ajax({
        url: url + 'serviceWise.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    let obj = {
                        name: response.Data[i].feesType,
                        y: parseInt(response.Data[i].test)
                    };
                    donut.push(obj);
                }
            }
            chartdonut(donut);
        }
    });
};
const invoiceResult = (fromDate, uptoDate) => {
    discount = [];
    $.ajax({
        url: url + 'collection_discountWise.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                if (response.Discount != null) {
                    const count = response.Discount.length;
                    for (var i = 0; i < count; i++) {
                        let obj = {
                            name: response.Discount[i].ditype,
                            y: parseInt(response.Discount[i].discount)
                        };
                        discount.push(obj);
                    }
                }
            }
            opdinvoice(discount);
        }
    });
};
donutresult(fromDate, uptoDate);
// invoiceResult(fromDate, uptoDate);
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
        }
        collectionopd(fromDate, uptoDate, branch);
        // donutresult(fromDate, uptoDate);
    }
});

function mapBranches() {
    var dropdownList = '<option></option>';
    for (let k of branch.keys()) {
        dropdownList += '<option value="' + k + '">' + branch.get(k) + '</option>';
    }
    $('#branch').html(dropdownList);
}
$(document).ready(function() {
    mapBranches();
    $("#branch").select2({
        placeholder: 'Select branch',
        allowClear: true
    });
});

function chartdonut(donut) {
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('donut', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Service wise(%) Sales'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Total Amount',
            data: donut
        }]
    });
}

function opdinvoice(discount) {
    Highcharts.chart('opd', {
        title: {
            text: 'Combination chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'black'
                }
            }]
        },
        series: [{
                type: 'column',
                name: 'Jane',
                data: [3, 2, 8, 3, 4]
            }, {
                type: 'column',
                name: 'John',
                data: [2, 3, 5, 7, 6]
            }, {
                type: 'column',
                name: 'Joe',
                data: [4, 3]
            },
            {
                type: 'pie',
                name: 'Total discount',
                data: discount,
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }
        ]
    });

}