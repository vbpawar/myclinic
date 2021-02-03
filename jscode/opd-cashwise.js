function collectionByCard(collection, categories) {
    Highcharts.chart('cashcard', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'OPD collection month wise'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Price'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: collection
    });
}

function collectionBypack(collection, categories) {
    Highcharts.chart('packcards', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Package collection month wise'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Price'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: collection
    });
}

function collectionbypackagewise(donut) {
    // Build the chart
    Highcharts.chart('packwise', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Package wise(%) Sales'
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
            name: 'Packages sold',
            data: donut
        }]
    });
}

const collectionopd = (fromDate, uptoDate, branch) => {
    var opdcollection = [];
    var cat = [];
    var pcat = [];
    var pcollection = [];
    var packdetails = [];
    $.ajax({
        url: url + 'collectionbyopd.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branch: branch },
        success: function(response) {
            if (response.Responsecode == 200) {
                let first = [],
                    second = [],
                    third = [];
                let fourth = [],
                    fifth = [],
                    sixst = [];
                const opd = response.Data.OPD;
                const pack = response.Data.Package;
                const packwise = response.Data.packagewise;
                if (opd != null) {
                    let count = opd.length;
                    for (var i = 0; i < count; i++) {
                        cat.push(opd[i].createdAt);
                        first.push(parseInt(opd[i].pending));
                        second.push(parseInt(opd[i].received));
                        third.push(parseInt(opd[i].total));
                    }
                    opdcollection.push({ name: 'Pending Amount', data: first });
                    opdcollection.push({ name: 'Recieved Amount', data: second });
                    opdcollection.push({ name: 'Total Amount', data: third });
                }
                if (pack != null) {
                    let count = pack.length;
                    for (let i = 0; i < count; i++) {
                        pcat.push(pack[i].createdAt);
                        fourth.push(parseInt(pack[i].pending));
                        fifth.push(parseInt(pack[i].received));
                        sixst.push(parseInt(pack[i].total));
                    }
                    pcollection.push({ name: 'Pending Amount', data: fourth });
                    pcollection.push({ name: 'Recieved Amount', data: fifth });
                    pcollection.push({ name: 'Total Amount', data: sixst });
                }
                if (packwise != null) {
                    let count = packwise.length;
                    for (let i = 0; i < count; i++) {
                        let obj = {
                            name: packwise[i].title,
                            y: parseInt(packwise[i].package)
                        };
                        packdetails.push(obj);
                    }
                }
            }
            collectionByCard(opdcollection, cat);
            collectionBypack(pcollection, pcat);
            collectionbypackagewise(packdetails);
        }
    });
};
collectionopd(data.today, data.today, 0);