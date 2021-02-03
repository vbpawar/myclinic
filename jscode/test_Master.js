var tests = new Map();
var test_details = {};

var getAllTests = () => {
    $.ajax({
        url: url + 'getAllTest.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    tests.set(response.Data[i].testId, response.Data[i]);
                }
             
                listTests(tests);
            }
        }
    });
};

var listTests = tests => {
    $('#testTable').dataTable().fnDestroy();
    $('#testRecord').empty();
    var tblData = '';
    for (let k of tests.keys()) {
        let test = tests.get(k);
        tblData += '<td>' + test.testId + '</td>';
        tblData += '<td>' + test.testName + '</td>';
        tblData += '<td>' + test.testDetails + '</td>';
        tblData += '<td>' + test.fees + '</td>';
        tblData += '<td>' + test.type + '</td>';
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editTest(' + (k) + ')" title="Edit test details"><i class="fas fa-user-injured" style="color:red"></i></a>';
    
        tblData += '</div></td></tr>';
    }
    $('#testRecord').html(tblData);
    $('#testTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4,5,6] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllTests();



