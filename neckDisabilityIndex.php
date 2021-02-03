<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    .error{
        color:red;
    }
   
    @media only screen and (max-width: 600px) {
        .check {
            margin-top: 8px;
        }
        .stand{
            margin-left: -40px; 
        }
        .walk{
            margin-left: 20px;
        }
    }
    

</style>
<body>

    <div class="wrapper">

        <div class="page-wrap">

            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Modals</h3>
                                </div>
                                <div class="card-body template-demo">

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fullwindowModal">Neck Disability Index</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: aliceblue;">
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>Neck Disability Index</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                     <form id="neckForm" method="POST" class="forms-sample" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                   
                                                    <div class="card-body">
                                                       
                                                            <div class="row">
                                                                
                                                                    <div class="form-group forms-sample  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 1 - PAIN INTESITY</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-1" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I have no pain at the moment.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-2" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is very mild at the moment.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox"  value="painIntensity-3" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is moderate at the moment.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-4" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is fairly severe at the moment.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox"  value="painIntensity-5" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is very severe at the moment..</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox"  value="painIntensity-6" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is the worst imaginable at the moment.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>

                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 2 - PERSONAL CARE</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-1" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can look after myself normally without causing extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-2" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can look after myself normally,but it causes extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-3" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>It is painful to look after myself,and I am slow and careful.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-4" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I need some help but manage most of my personal care.</span>.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-5" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I need help every day in most aspects of self-care.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-6" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I do not get dressed.I wash with difficulty and stay in bed.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  

                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 3 - LIFTING</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-1" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can lift heavy weights without causing extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-2" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can lift heavy weights,but it gives me extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-3" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Pain prevents me from lifting heavy weights off the floor but I can 
                                                                                manage if items are conveniently positioned.ie.on a table.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="lifting-4" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Pain prevents me from lifting heavy weights,but I can light</span>
                                                                               <span  > weights if they are conveniently positioned.</span>
                                                                                
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="lifting-5" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can lift only very light weights.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-6" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I cannot lift or carry anything at all.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  
                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 4 - Work</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="work-1" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can do as much work as i want.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="work-2" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can only do my usual work,but no more.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="work-3" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can do most of my usual work,but no more.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="work-4" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can't do my usual work.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="work-5" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can hardly do any work at all.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="work-6" name="work">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can't do any work at all.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  
                                                                 
                                                                </div>


                                                                <div class="row">
                                                               
                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 5 - HEADACHES</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-1" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have no headaches at all.A21</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-2" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have slight headaches that come infrequently.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-3" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have moderate headaches that come infrequently.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-4" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have moderate headaches that come frequently.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-5" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have servere headaches that come frequently.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="headaches-6" name="headaches">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have headaches almost all the time.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 6 - CONCENTRATION</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-1" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can concentrate fully without difficulty.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-2" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can concentrate fully slight difficulty.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-3" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have a fair degree of difficulty concentrating.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-4" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have a lot of difficulty concentrating.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-5" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have a great deal of difficulty concentrating.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="concentration-6" name="concentration">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't concentrating at all.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 7 - SLEEPING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-1" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have no trouble sleeping.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-2" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My sleep is slightly disturbed for less than 1 hour.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-3" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My sleep is mildly disturbed for upto 1-2 hour.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-4" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My sleep is moderately disturbed for upto 2-3 hour.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-5" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My sleep is greatly disturbed for upto 3-5 hour.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-6" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My sleep is completely disturbed for upto 5-7 hour.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 8 - DRIVING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-1" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can drive my car without neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-2" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can drive as long as I want with slight neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-3" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can drive as long as I want with moderate neck pain.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-4" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't drive as long as I want because of moderate neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-5" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can hardly drive at all because of severe neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="driving-6" name="driving">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't drive my care at all because of neck pain.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>
                                                                       
                                                                </div>

                                                                <div class="row">
                                                                   
                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 9 - READING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-1" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can read as much as I want with no neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-2" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can read as much as I want with slight neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-3" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can read as much as I want with moderate neck pain.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-4" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't read as much as I want because of severe neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-5" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't read as much as I want because of severe neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="reading-6" name="reading">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't read at all.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>
                                                                      

                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 10 - RECREATION</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-1"  name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have no neck pain during all recreational activities.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-2" name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have some neck pain with all recreational activities.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-3" name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have some neck pain with a few recreational activities.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-4" name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have neck pain with most recreational activities.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-5" name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can hardly do recreational activities due to neck pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="recreation-6" name="recreation">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can't do any recreational activities due to neck pain.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>
                                                                 </div>
                                                                
                                                         </div>
                                                         </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
                                                        </div>
                                                       
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.min.js"></script>
    <script src="jscode/apis.js"></script>
        <script src="js/jquery.validate.js"></script>
 
        <script src="jscode/neckDisability.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
  
</body>

</html>