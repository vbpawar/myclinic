var tests = new Map();
var result_details = {};
var  resultId_np = null;
// var global_date = moment().format('YYYY-MM-DD');
const getResults = () => {
    $.ajax({
          url:"apis/getAllTestResult.php",
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    tests.set(response.Data[i].labId , response.Data[i]);
                }

                listResults(tests);
            }
        }
    });
};

const listResults = tests => {
    $('#ResultTable').dataTable().fnDestroy();
    $('#resultData').empty();
    var tblData = '',
    badge1;
    for (let k of tests.keys()) {
        let test = tests.get(k);
        // badge = '';
        // if (test.isActive == 1) {
        //     badge1 = '<td><span class="badge badge-success">active</span></td>';
        // } else {
        //     badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        // }
        // tblData += '<tr><td>' +test.labId + '</td>';
        tblData += '<tr><td>' + test.firstName+' '+test.surName + '</td>';
        tblData += '<td>' + test.visitDate + '</td>';
        tblData += '<td>' + test.TestName + '</td>';
        // tblData += '<td>' + test.Subtype + '</td>'; 
        tblData += '<td>' + test.doneBy + '</td>';
        tblData += '<td>' + test.result + '</td></tr>';
        // tblData += badge1;
        // tblData += '<td><div class="table-actions" style="text-align: left;">';
        // tblData += '<a href="#" onclick="editTest(' + (k) + ')" title="Edit Test details"><i class="ik ik-edit text-blue"></i></a>';
        // tblData += '<a href="#" class="ik edit"  onclick="inactivateTest(' + (k) + ')" title="Active/inactive Test"><i class="ik ik-trash text-danger"></i></a>';
        // tblData += '</div></td></<td>';
    }
    $('#resultData').html(tblData);
    $('#ResultTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getResults();

// const editTest = (resultId) => {
//     resultId = resultId.toString();
//     result_details = tests.get(resultId);
//     resultId_np= resultId;
//     $('#newTest').hide();

//     $('#editTestNew').load('edit_lab_test.php');


// };
// var inactivateTest = resultId => {
//     resultId = resultId.toString();
//     let test = tests.get(resultId);
//     var msg = '',
//         btn = '',
//         msg1 = '';
//     if (test.isActive == 1) {
//         test.isActive = 0;
//         msg = 'Do you really want to in activate this Test?';
//         btn = 'Deactivate Now';
//         msg1 = 'Test Deactvated';
//     } else {
//         test.isActive = 1;
//         msg = 'Do you really want to  activate this Test?';
//         btn = 'Activate Now';
//         msg1 = 'Test Activated';
//     }
//     swal({
//             title: "Are you sure?",
//             text: msg,
//             icon: "warning",
//             buttons: ["Cancel", btn],
//             dangerMode: true,
//         })
//         .then((willDelete) => {
//             if (willDelete) {
//                 $.ajax({
//                     url: url + 'LabTestActivation.php',
//                     type: 'POST',
//                     data: {resultId: resultId},
//                     dataType: 'json',
//                     success: function(response) {
//                         if (response.Responsecode == 200) {
//                             tests.set(resultId, test);
//                             listResults(tests);
//                             swal({
//                                 text: msg1,
//                                 icon: "success"
//                             });

//                         }
//                     }
//                 });
//             }
//         });
// };

// function gobackTest(){
//     $('#newResult').show();
//     $('#editResultNew').empty();
// }
