<form class="forms-sample" id="feedbackform" method="POST" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">

                                                        <div class="card-body">
                                                            <div class="card-body form-group">

                                                                <h5><center><b><u>FEEDBACK FORM</u></b></center></h5>

                                                                <p style="font-size: 17px; margin-left:10px">
                                                                Thank you for being a part of our practice. So that we may better serve you in future appointments, we ask that you take a few minutes to fill out this survey, which is 100% confidential.<br>
                                                                <div class="row">
                                                                   <div class="col-md-2"></div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                            <label for="">Name:</label>
                                                                            <input type="text" class="form-control" id="feedbackname">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                            <label for="">Age:</label>
                                                                            <input type="text" class="form-control" id="fage">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                   </div>
                                                                   <div class="row">
                                                                   <div class="col-md-2"></div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                            <label for="">Phone:</label>
                                                                            <input type="text" class="form-control" id="fphone">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                            <label for="">Place:</label>
                                                                            <input type="text" class="form-control" id="fplace">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                   </div>
                                                               

                                                                   <center><h4><caption>(Kindly mark the appropriate columns)</caption></h4></center>
                                                                   <div class="form-group row">
                                                            <table class="table table-bordered" id="fform">
                                                              
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">CRITERIA</th>
                                                                    <th scope="col">1 DOES NOT APPLY</th>
                                                                    <th scope="col">2 POOR</th>
                                                                    <th scope="col">3 FAIR</th>
                                                                    <th scope="col">4 GOOD</th>
                                                                    <th scope="col">5 EXCELLENT</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody >
                                                                
                                                                  <tr>
                                                                    <th scope="row">AMBIENCE</th>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                  </tr>
                                                                 
                                                                  <tr>
                                                                    <th scope="row">RECEPTION HOSPITALITY</th>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">PHYSIOTHERAPIST</th>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">ASSESSMENT & COUNSELLING</th>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">ACCESSIBILITY</th>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                    <td><input type="number" class="form-control"></td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              <div class="row col-sm-4">
                                                                <strong> Where did you find us?</strong>
                                                                   <input type="text" class="form-control" id="findus">
                                                                   </div>
                                                                   <div class="row col-sm-4">
                                                                  <strong> Overall Experience</strong>
                                                                   <input type="text" class="form-control" id="oexperience">
                                                                   </div>
                                                                   <div class="row col-sm-4">
                                                                  <strong> Any Other Suggestions</strong>
                                                                   <input type="text" class="form-control" id="fsuggestion">
                                                                   </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
      
                            </div>
                                   
                                    <button class="btn btn-secondary" onclick="downloadfeedbackForm();"><i class="fa fa-download"></i>Download Feedback form</button>
                                    <button type="button" class="btn btn-primary" value="submit" onClick="feedbackform()">Save changes</button>
                                </div>
                                </form>