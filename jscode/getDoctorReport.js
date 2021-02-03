

const getPatientMedication = (fromDate, uptoDate, branch) => {
    $.ajax({
        url: url + 'getPatientsMedication.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate, branchId: branch },
        success: function(response) {
            $('#doctorT').dataTable().fnDestroy();
            $('#doctorD').empty();
            var tblData = '';
            
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {

                    let patient = response.Data[i];
                      tblData += '<tr><td' +patient.patientId +'></td>';
                 
                    tblData += '<td>' + patient.visitDate + '</td>';
                    tblData += '<td>' + patient.complaint + '</td>';
                    tblData += '<td>' + patient.advice + '</td>';
                    tblData += '<td>' + patient.diagnosis + '</td>';
                    tblData += '<td>' + patient.doctorId + '</td>';
                 
                }
            }
            $('#doctorD').html(tblData);

          //dropdown filter code
            $('#doctorT').dataTable({
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
                columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4] }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }
    });
};

const patientMedication = (fromDate, uptoDate) => {
  
    totaMedicationCnt = [];
    docName = [];
    patientsMedicationData = [];
    $.ajax({
        url: url + 'totalMedication.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                 
                    totaMedicationCnt.push(parseInt(response.Data[i].cnt));
                    docName.push(response.Data[i].username);
       
                }
                patientsMedicationData.push({ name: 'Total Medication', data: totaMedicationCnt });

            
        
            }
            patient_chart(patientsMedicationData,docName);
        }
    });
};


const spineReport = (fromDate, uptoDate) => {
  
    spineCnt = [];
    doctorName = [];
    patientsnData = [];
    $.ajax({
        url: url + 'doctorPerformance.php',
        type: 'POST',
        dataType: 'json',
        data: { fromDate: fromDate, uptoDate: uptoDate },
        success: function(response) {
            if (response.Responsecode == 200) {

                const count = response.medication.length;
            
                for (var i = 0; i < count; i++) {   
                    spineCnt.push(parseInt(response.cnt));
                    doctorName.push(response.username);
       
                }
             
                for (var i = 0; i < count1; i++) {
                 
                    spineCnt.push(parseInt(response.cnt));
                    doctorName.push(response.username);
       
                }
                patientsnData.push({ name: 'Total Spine', data: spineCnt });
            }
         
            spine_chart(patientsnData,doctorName);
        }
    });
};



$('#searchDoctor').on('click', function(e) {
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
        getPatientMedication(fromDate, uptoDate, branch);
        patientMedication(fromDate,uptoDate);
        spineReport(fromDate,uptoDate);
     
    }
});


getPatientMedication(data.today, data.today);

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
    Highcharts.chart('patentMedicatn', {
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
                text: 'Medication',
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
            text: 'Total Medication',
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

        //This code is for changeing the color of bar
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
      //  *********************************************** */
        series: seriesData
    });
}


function  spine_chart(seriesData, categories) {
    Highcharts.chart('totaldoctor', {
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
                text: 'Medication',
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
            text: 'Total Medication',
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

        //This code is for changeing the color of bar
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
      //  *********************************************** */
        series: seriesData
    });
}


