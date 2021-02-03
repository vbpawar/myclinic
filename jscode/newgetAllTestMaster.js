var testes = new Map();
var test_details = {};
var testId_ap = null;

const getAllTestDetails = () => {
    $.ajax({
        url: url + 'getDiaTestMaster.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    testes.set(response.Data[i].testId, response.Data[i]);
                }
         
                listTest(testes);
            }
        }
    });
};

const listTest = testes => {
    $('#diaTestTable').dataTable().fnDestroy();
    $('#diaTestData').empty();
    var tblData = '';
    for (let k of testes.keys()) {
        let test = testes.get(k);
        badge = '';
        if (test.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + test.testName + '</td>';
        tblData += '<td>' + test.testDetails + '</td>';
        tblData += '<td>' + test.fees  + '</td>';
        // tblData += '<td>' + test.type  + '</td>';
        tblData += badge1;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editTest(' + (k) + ')" title="Edit Test details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateTest(' + (k) + ')" title="Active/inactive Procedure"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#diaTestData').html(tblData);
    $('#diaTestTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllTestDetails();

var editTest = (testId) => {
    testId = testId.toString();
    test_details = testes.get(testId);
    testId_ap=testId;
    console.log(testId_ap);
     $('#testDiagnosisData').hide();
     $('#TestNew').load('edit_daiTestMaster.php');
 
};
function gobackTest(){
    $('#testDiagnosisData').show();
    $('#TestNew').empty();
}

var inactivateTest = testId => {
    testId = testId.toString();
    let test = testes.get(testId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (test.isActive == 1) {
        test.isActive = 0;
        msg = 'Do you really want to in activate this Test?';
        btn = 'Deactivate Now';
        msg1 = 'Test Deactivated';
    } else {
        test.isActive = 1;
        msg = 'Do you really want to  activate this Test?';
        btn = 'Activate Now';
        msg1 = 'Test Activated';
    }
    swal({
            title: "Are you sure?",
            text: msg,
            icon: "warning",
            buttons: ["Cancel", btn],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'testActivation.php',
                    type: 'POST',
                    data: {testId: testId,suserid:data.userId,susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            testes.set(testId, test);
                            listTest(testes);
                            swal({
                                text: msg1,
                                icon: "success"
                            });

                        }
                    }
                });
            }
        });
};