<style>
@media only screen   and (min-device-width : 768px)   and (max-device-width : 1024px) {
    .exercise{
        width:100px;
    }
    .img{
        width:180px;    
    }
    .exrow{
        width:180px;
    }
    .exesteps{
        width:100px;
    }
    }
    /* @media only screen   and (min-device-width : 1030px)   and (max-device-width : 1224px){
     .exercise{
        width:100px;
    }
    .img{
        width:180px;    
    }
    .exrow{
        width:180px;
    }
    .exesteps{
        width:100px;
    }   
    } */
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="addExercise()" title="Add Exercise"><i class="ik ik-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="exerciseTable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Exercise</th>
                                <th>#</th>
                                <th>Details</th>
                                <th>Steps</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="exerciseData">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5" style="margin-top: 38px;">
                <button type="button" class="btn  btn-success" onclick="saveExercise()">Save</button>
                <button type="button" class="btn  btn-default">Cancel</button>
            </div>
        </div>
    </div>
</div>