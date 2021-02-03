

const getPatients = (fromDate, uptoDate, branch) => {
    $.ajax({
        url: url + 'getPatientsforAdmin.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branch },
        success: function(response) {
            $('#getpatientT').dataTable().fnDestroy();
            $('#getpatientD').empty();
            var tblData = '';
            
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {

                    let patient = response.Data[i];
                    tblData += '<tr><td style="display:none"><img src="upload/patients/' + patient.patientId + '.jpg" class="table-user-thumb" alt="Upload"></td>';
                    tblData += '<td>' + patient.firstName + ' ' + patient.surname + '</td>';
                    tblData += '<td>' + patient.mobile1 + '</td>';
                    tblData += '<td>' + patient.cityName + '</tdstate>';
                    tblData += '<td>' + patient.stateName+ '</td>';
                    tblData += '<td>' + patient.countryName+ '</td>';
                    tblData += '<td>' + patient.firstVisitDate+ '</td>';
                    tblData += '<td>' + patient.lastVisitDate + '</td>';
                    tblData += '<td>' + patient.nextVisitDate + '</td>';

                    tblData += '<td>' + patient.createdAt +''
    
                    tblData += '</td></tr>';
                }
            }
            $('#getpatientD').html(tblData);
          
            $('#getpatientT').dataTable({
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    });
                },
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
const patientRef = (fromDate, uptoDate) => {
  
    patientRefCnt = [];
    refName = [];
    patientsData = [];
    $.ajax({
        url: url + 'patientsRefCnt.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                 
                    patientRefCnt.push(parseInt(response.Data[i].cnt));
                    refName.push(response.Data[i].doctorName);
       
                }
                patientsData.push({ name: 'Referance', data: patientRefCnt });

            
        
            }
            patient_chart(patientsData,refName);
        }
    });
};


const totalPatients = (fromDate, uptoDate) => {
  
    totaPatientCnt = [];
    refName = [];
    totalPatient = [];

    $.ajax({
        url: url + 'totalPatientCnt.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                 
                    totaPatientCnt.push(parseInt(response.Data[i].pCnt));
                    // refName.push("Total Count");
       
                }
                totalPatient.push({ name: 'Total Patients', data: totaPatientCnt });

            
        
            }
            total_patient_chart(totalPatient);
        }
    });
};
$('#searchPatients').on('click', function(e) {
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
        getPatients(fromDate, uptoDate, branch);
        patientRef(fromDate, uptoDate);
        totalPatients(fromDate, uptoDate);
    }
});

function printReciept(paymentId) {
    // var link = 'payment-reciept.php?paymentId=' + paymentId;
    // window.open(link, '_blank');
  //  $('<form action="payment-reciept.php" method="POST" target="_blank"><input type="hidden" name="ppaymentId" value="' + paymentId + '" /></form>').appendTo('body').submit();
}
getPatients(data.today, data.today);

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




function  patient_chart(seriesData, categories) {
    Highcharts.chart('patentsRef', {
        chart: {
            type: 'column',
        
            polar: true,
            //type: 'line'
            
        },
        legend: {
           enabled: true,
        },
        title: {
            text: '',
            style: {
                color: '#009e73',
                font: 'bold 20px Verdana, serif',
            }
        },
        xAxis: { 
            categories: categories,
            crosshair: true,
            labels: {
                style: {
                    color: '#00664b',
                    font: 'bold 12px Verdana, serif',
                }
            },
            title: {
                text: 'Pateints references',
                style: {
                    color: '#00664b',
                    font: 'bold 12px Verdana, serif',    
                }
            }  
        },
        yAxis: {
            allowDecimals: true,
        min: 0,
        labels: {
            style: {
                color: '#00664b',
                font: 'bold 12px Verdana, serif',
            }
        },
        title: {
            text: 'Number of Reference',
            style: {
                color: '#00664b',
                font: 'bold 12px Verdana, serif',
            }
        }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.x}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.5,
                borderWidth: 0   
            } 
        },

        // This code is for changeing the color of bar
        plotOptions: {
            series: {
                colors: [     
                    '#76448A',
                    '#2874A6',
                    '#9C640C', 
                       ],
                colorByPoint: true,
                dataLabels: {
                    enabled: true,
                    color:'#2874A6',
                },
                dataSorting: {
                    enabled: true
                },
            }
        },
        //*********************************************** */
        series: seriesData
    });
}


function  total_patient_chart(seriesData, categories) {
    Highcharts.chart('totalPatient', {
        chart: {
            type: 'column',
            polar: true,
            //type: 'line'
        
            
        },
        legend: {
           enabled: false,
        },
        title: {
            text: '',
            style: {
                color: '#009e73',
                font: 'bold 20px Verdana, serif',
            }
        },
        xAxis: { 
            categories: categories,
            crosshair: true,
            labels: {
                style: {
                    color: '#00664b',
                    font: 'bold 12px Verdana, serif',
                }
            },
            title: {
                text: 'Total patients',
                style: {
                    color: '#00664b',
                    font: 'bold 12px Verdana, serif',    
                }
            }  
        },
        yAxis: {
            allowDecimals: true,
        min: 0,
        labels: {
            style: {
                color: '#00664b',
                font: 'bold 12px Verdana, serif',
            }
        },
        title: {
            text: 'Number of Patients',
            style: {
                color: '#00664b',
                font: 'bold 12px Verdana, serif',
            }
        }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.x}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.5,
                borderWidth: 0   
            } 
        },

        // This code is for changeing the color of bar
        plotOptions: {
            series: {
              
                colors: [     
                    '#e600e6',
                    '#2874A6',
                    '#9C640C', 
                       ],
                colorByPoint: true,
                dataLabels: {
                    enabled: true,
                    color:'#2874A6',
                },
                dataSorting: {
                    enabled: true
                },
            }
        },
        //*********************************************** */
        series: seriesData  
    });
}
