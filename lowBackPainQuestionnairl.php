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

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fullwindowModal">Questionnaire</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: aliceblue;">
                                    <h5 class="modal-title" id="fullwindowModalLabel"><strong>Back Pain Questionnaire</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form id="backPainForm" method="POST" class="forms-sample" enctype="multipart/form-data">
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
                                                                                <input type="checkbox" value="painIntensity-A" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain comes and goes and is very mild.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-B" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is mild and does not vary much.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-C" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain comes and goes and is moderate.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-D" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is moderate and does not vary much.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-E" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain comes and goes and is severe.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="painIntensity-F" name="painIntensity">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>The pain is severe and does not vary much.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>

                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 2 - PERSONAL CARE</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-A" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I do not have to change my way of washing or dressing in order to avoid pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-B" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I do not normally change my way of washing or dressing even though it causes some pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-C" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Washing and dressing increases the pain but I manage not to change my way of doing it.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-D" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Washing and dressing increases the pain and I find it necessary to change my way of doing it. </span>.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-E" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Bacause of the pain I am unable to do some washing and dressing without help.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="personalCare-F" name="personalCare">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Bacause of the pain I am unable to do any washing and dressing without help.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  

                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 3 - LIFTING</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-A" name="lifting" >
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can lift heavy weights without extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-B" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can lift heavy weights,but it causes extra pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-C" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Pain prevents me from lifting heavy weights off the floor.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="lifting-D" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Pain prevents me from lifting heavy weights off the floor,but I can manage if they are conveniently positioned.e.g.on a table</span>
                                                                                
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="lifting-E" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>Pain prevents me from lifting heavy weight,but I can Manage light to medium weights if they are conveniently positioned.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="lifting-F" name="lifting">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can only lift very light weights at the most.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  
                                                                    <div class="form-group  col-sm-3">
                                                                        <label for="exampleInputUsername1"><b>SECTION 4 - Walking</b></label><br>

                                                                        <div class="checkbox-fade fade-in-success " >
                                                                            <label>
                                                                                <input type="checkbox" value="walking-A" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I have no pain an Walking.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="walking-B" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I have some pain on Walking but it does not increases with distance.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="walking-C" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I cannot walk more than one mile without increasing pain.</span>
                                                                            </label><br>
                                                                            <label>
                                                                                <input type="checkbox" value="walking-D" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I cannot walk more than 1/2 mile without increasing pain.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="walking-E" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I cannot walk more than 1/4 mile without increasing pain.</span>
                                                                            </label><br>

                                                                            <label>
                                                                                <input type="checkbox" value="walking-F" name="walking">
                                                                                <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                                                <span>I can't walk at all without increasing pain.</span>
                                                                            </label><br>
                                                                        </div>                                                                          
                                                                    </div>  
                                                                 
                                                                </div>


                                                                <div class="row">
                                                               
                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 5 - SITTING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-A" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can sit in any chair as long as I like.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-B" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can sit only in my favorite chair as long as I like.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-C" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain prevents me from sitting more thsn one hour.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-D" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain prevents me from sitting more thsn 1/2 hour.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-E" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain prevents me from sitting more thsn 10 minutes.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sitting-F" name="sitting">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I avoid sitting because it increases pain straight away.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 6 - STANDING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-A" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I can stand as long as I want without pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-B" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have some pain on standing but it does not increase with time.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-C" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I cannot stand for longer than one hour without increasing pain.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-D" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I cannot stand for longer than 1/2 hour without increasing pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-E" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I cannot stand for longer than 10 minutes without increasing pain</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="standing-F" name="standing">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I avoid standing because it increases the pain immediately.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 7 - SLEEPING</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-A" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get no pain in bed.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-B" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get pain in bed but it does not prevent me from sleeping well.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-C" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Because of pain my normal night's sleep is reduced by less than 1/4.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-D" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Because of pain my normal night's sleep is reduced by less than 1/2.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-E" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Because of pain my normal night's sleep is reduced by less than 3/4.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="sleeping-F" name="sleeping">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain prevents me from sleeping at all.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>

                                                                        <div class="form-group  col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 8 - Social Life</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-A" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My social life is normal and gives me no pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-B" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My social life is normal but increases the degree of my pain.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-C" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain has no significant effect on my social life apsrt from limiting my more energetic iterests.e.g dancing. etc.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-D" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain has restricted my social life,and I do not go out very often.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-E" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain has restricted my social life to my home.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="socialLife-F" name="socialLife">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I have hardly any social life because of the pain.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>
                                                                       
                                                                </div>

                                                                <div class="row">
                                                                   
                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 9 - TRAVEL</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-A" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get no pain while traveling.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-B" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get some pain while traveling,but none of my usual forms of travel make it any worse.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-C" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get extra pain while traveling,but it does not compets me to seek alternative forms of travel.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-D" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>I get extra pain while traveling,which compets me to seek alternative forms of travel.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-E" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain restricts all forms of travel.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="travel-F" name="travel">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>Pain prevents all forms of travel except that done lying down.</span>
                                                                                </label><br>
                                                                            </div>                                                                          
                                                                        </div>
                                                                      

                                                                        <div class="form-group forms-sample col-sm-3">
                                                                            <label for="exampleInputUsername1"><b>SECTION 10 - CHANGING DEGREE OF PAIN</b></label><br>
    
                                                                            <div class="checkbox-fade fade-in-success " >
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-A" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain is rapidly getting better.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-B" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain fluctuates but overall is definitely getting better.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-C" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain seems to be getting better but improvement is slow at present.</span>
                                                                                </label><br>
    
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-D" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain is neither getting better nor worse.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-E" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain is gradually worsening.</span>
                                                                                </label><br>
                                                                                <label>
                                                                                    <input type="checkbox" value="pain-F" name="changingDegreeOfPain">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                                                    <span>My pain is rapidly worsening.</span>
                                                                                </label><br>
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
                <script src="jscode/lowBackPain.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
 
</body>

</html>