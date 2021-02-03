var instruction = new Map();
var instruction_details = {};
var instructionId_ap = null;

const getAllInstructionn = () => {
    $.ajax({
        url: url + 'getAllInstruction.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    instruction.set(response.Data[i].instructionId, response.Data[i]);
                }
                listInstr(instruction);
            }
        }
    });
};

const listInstr = instruction => {
    $('#istrtnTable').dataTable().fnDestroy();
    $('#instData').empty();
    var tblData = '';
    for (let k of instruction.keys()) {
        let inst = instruction.get(k);
        badge = '';
        if (inst.isActive == 1 || inst.isActive == '1') {
            badge = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge = '<td><span class="badge badge-warning">inactive</span></td>';
        }
        tblData += '<tr><td>' + inst.instruction + '</td>';
        tblData += '<td>' + inst.hindi + '</td>';
        tblData += '<td>' + inst.marathi + '</td>';
        tblData += badge;
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editInstruction(' + (k) + ')" title="Edit Instruction details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateInstruction(' + (k) + ')" title="Active/inactive Instruction"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#instData').html(tblData);
    $('#istrtnTable').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
};
getAllInstructionn();

const editInstruction = (instructionId) => {
    instructionId = instructionId.toString();
    instruction_details = instruction.get(instructionId);
    instructionId_ap = instructionId;
    $('#itData').hide();
    $('#instrNew').load('edit_InstructionMaster.php');

};


var inactivateInstruction = instructionId => {
    instructionId = instructionId.toString();
    let inst = instruction.get(instructionId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (inst.isActive == 1) {
        inst.isActive = 0;
        msg = 'Do you really want to in activate this instruction?';
        btn = 'Deactivate Now';
        msg1 = 'Instruction Deactivated';
    } else {
        inst.isActive = 1;
        msg = 'Do you really want to  activate this instruction?';
        btn = 'Activate Now';
        msg1 = 'Instruction Activated';
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
                    url: url + 'instructionActivation.php',
                    type: 'POST',
                    data: { instructionId: instructionId,suserid:data.userId,
                        susername:data.username },
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            instruction.set(instructionId, inst);
                            listInstr(instruction);
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

function gobackInstruction() {
    $('#itData').show();
    $('#instrNew').empty();
}