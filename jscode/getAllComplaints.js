var complaint = new Map();
var complaint_details = {};
var  complaintId_ap = null;

const getAllComplaints = () => {
    $.ajax({
        url: url + 'get_Complaints.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    complaint.set(response.Data[i].complaintId, response.Data[i]);
                }
         
                listcomplaint(complaint);
            }
        }
    });
};

const listcomplaint = complaint => {
    $('#comTable').dataTable().fnDestroy();
    $('#complaintData').empty();
    var tblData = '';
    for (let k of complaint.keys()) {
        let compl = complaint.get(k);
        badge = '';
        if (compl.isActive == 1) {
            badge1 = '<td><span class="badge badge-success">active</span></td>';
        } else {
            badge1 = '<td><span class="badge badge-warning">inactive</span></td>';
        }
    
        tblData += '<tr><td>' + compl.complaintId + '</td>';
        tblData += '<td>' + compl.complaint + '</td>';
        tblData += badge1;
 
      
        tblData += '<td><div class="table-actions" style="text-align: left;">';
        tblData += '<a href="#" onclick="editComplaints(' + (k) + ')" title="Edit complaints details"><i class="ik ik-edit text-blue"></i></a>';
        tblData += '<a href="#" class="ik edit"  onclick="inactivateComplaint(' + (k) + ')" title="Active/inactive Complaint"><i class="ik ik-trash text-danger"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('#complaintData').html(tblData);
    $('#comTable').dataTable({
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
getAllComplaints();

const editComplaints = (complaintId) => {
    complaintId = complaintId.toString();
    complaint_details = complaint.get(complaintId);
    complaintId_ap= complaintId;
    console.log(complaintId_ap);
    $('#complaintsData').hide();
    $('#complaintNew').load('edit_Complaint_Master.php');

};

var inactivateComplaint = complaintId => {
    complaintId = complaintId.toString();
    let compl = complaint.get(complaintId);
    var msg = '',
        btn = '',
        msg1 = '';
    if (compl.isActive == 1) {
        compl.isActive = 0;
        msg = 'Do you really want to in activate this Complaint?';
        btn = 'Deactivate Now';
        msg1 = 'Complaint Deactivated';
    } else {
        compl.isActive = 1;
        msg = 'Do you really want to  activate this Complaint?';
        btn = 'Activate Now';
        msg1 = 'Complaint Activated';
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
                    url: url + 'complaintActivation.php',
                    type: 'POST',
                    data: {complaintId: complaintId,suserid:data.userId,
                   susername:data.username},
                    dataType: 'json',
                    success: function(response) {
                        if (response.Responsecode == 200) {
                            complaint.set(complaintId, compl);
                            listcomplaint(complaint);
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
function gobackComp(){
    $('#complaintsData').show();
    $('#complaintNew').empty();
}