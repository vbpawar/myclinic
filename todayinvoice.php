<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Data Tables | ThemeKit - Admin Template</title>
        <meta name="description" content="">

        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href=" favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href=" plugins/select2/dist/css/select2.min.css">


        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href=" plugins/bootstrap/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css"> -->
        <link rel="stylesheet" href=" plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href=" plugins/icon-kit/dist/css/iconkit.min.css">
        <!-- <link rel="stylesheet" href=" plugins/perfect-scrollbar/css/perfect-scrollbar.css"> -->
        <link rel="stylesheet" href=" plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href=" dist/css/theme.min.css">
        <script src=" src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">       
            <div class="">            
                <div class="main-content">
                    <div class="container-fluid" >

                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 50px;">                       
                                <div class="card">
                                  
                                    <div class="card-body" style="background: aliceblue;">
                                        <div class="dt-responsive">
                                            <div class="row">
                                                <div class="col-sm-6">                                                 
                                            <table id="scr-vtr-dynamic"
                                                   class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Bill Id</th>
                                                    <th>Doctor</th>
                                                    <th>Bill Particular</th>
                                                    <th>Total</th>
                                                    <th>Pending</th>                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012/03/29</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>Brielle Williamson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2012/12/02</td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012/08/06</td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Tokyo</td>
                                                    <td>55</td>
                                                    <td>2010/10/14</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>Colleen Hurst</td>
                                                    <td>Javascript Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>39</td>
                                                    <td>2009/09/15</td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>Sonya Frost</td>
                                                    <td>Software Engineer</td>
                                                    <td>Edinburgh</td>
                                                    <td>23</td>
                                                    <td>2008/12/13</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>Jena Gaines</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>30</td>
                                                    <td>2008/12/19</td>                                                   
                                                </tr>                                               
                                                <tr>
                                                    <td>Bradley Greer</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2012/10/13</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>Dai Rios</td>
                                                    <td>Personnel Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>35</td>
                                                    <td>2012/09/26</td>                                                  
                                                </tr>
                                            </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Bill Id</th>
                                                    <th>Doctor</th>
                                                    <th>Bill Particular</th>
                                                    <th>Total</th>
                                                    <th>Pending</th>                                                 
                                                </tr>
                                                </tfoot>
                                            </table>                                              
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-2"> 
                                                <h6><strong>For:</strong></h6>
                                            </div> 
                                            <div class="col-sm-4"> 
                                                <h6><strong>DR. RITUPARNA SHINDE</strong></h6>
                                            </div> 
                                            <div class="col-sm-6"></div>
                                            </div>
                                          
                                            <div class="row">
                                                <div class="col-sm-6"> 
                                                    <label for="total"><strong>Total :</strong></label>
                                                </div> 
                                                <div class="col-sm-4"> 
                                                    <label for="received"><strong>Received :</strong></label>
                                                </div> 

                                                <div class="col-sm-2"></div>
                                                
                                            </div>

                                                <div class="row">
                                                       <!-- <div class="col-sm-3"></div> -->
                                                    <div class="col-sm-6"> 
                                                        <div class="form-group" style="text-align: center;">
                                                          
                                                            <select class="form-control select2">
                                                                <option value="cheese">Cheese</option>
                                                                <option value="tomatoes">Tomatoes</option>
                                                                <option value="mozarella">Mozzarella</option>
                                                                <option value="mushrooms">Mushrooms</option>
                                                                <option value="pepperoni">Pepperoni</option>
                                                                <option value="onions">Onions</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                              <div class="col-sm-6"></div>
                                                </div>

                                            <table id="scr-vtr-dynamic"
                                                   class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Bill Id</th>
                                                    <th>Doctor</th>
                                                    <th>Bill Particular</th>
                                                    <th>Total</th>
                                                    <th>Pending</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012/03/29</td>                                                    
                                                </tr>                                                
                                                <tr>
                                                    <td>Jena Gaines</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>30</td>
                                                    <td>2008/12/19</td>                                                   
                                                </tr>                                                
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Bill Id</th>
                                                <th>Doctor</th>
                                                <th>Bill Particular</th>
                                                <th>Total</th>
                                                <th>Pending</th>
                                              
                                            </tr>
                                            </tfoot>
                                        </table>
                                           
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for=""><strong>Discount</strong></label> 
                                                <input type="text" placeholder=""
                                                class="form-control" name="g"
                                                id="g">
                                        </div> 
                                        <div class="col-sm-4 mt-15"> 
                                            <label for="total"><strong>Total:</strong></label>
                                        </div> 
                                        <div class="col-sm-4"></div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-sm-4 form-group">
                                                <label for=""><strong>Discount %</strong></label> 
                                                <input type="text" placeholder=""
                                                class="form-control" name="g"
                                                id="g">
                                        </div> 
                                        <div class="col-sm-8 template-demo">
                                          
                                                <button type="button" class="btn btn-primary "
                                                    data-dismiss="modal"><i class="ik ik-pocket"></i>Make Payment</button>
                                                <button type="button" class="btn btn-primary"><i class="ik ik-pocket"></i>Accept Payment</button>
                                            
                                        </div>
                                       
                                    </div>
                                       
                                    </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src=" src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <!-- <script src=" plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src=" plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src=" plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script> -->
        <!-- <script src=" plugins/screenfull/dist/screenfull.js"></script> -->
        <script src=" plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <!-- <script src=" plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> -->
        <script src=" dist/js/theme.min.js"></script>
        <script src=" js/datatables.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>

 
    </body>
</html>
