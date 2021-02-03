<style>
    .b{
        font-weight: bold;
    }
</style>
<div class="modal fade full-window-modal" id="backPain" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: aliceblue;">
                <h5 class="modal-title" id="fullwindowModalLabel"><strong><u>Back Pain Questionnaire</u></strong></h5>
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
                                                <label for="exampleInputUsername1"><b>SECTION 1 - PAIN INTESITY</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success">
                                                    <label>
                                                        <input type="radio" value="1" name="painIntensity" id="painIntensity" class="form-control">
                                                        <span class="cr">
                                                      <i class="cr-icon ik ik-check txt-success"></i>
                                                        </span>
                                                        <span>The pain comes and goes and is very mild.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="painIntensity" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>The pain is mild and does not vary much.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="painIntensity" >
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>The pain comes and goes and is moderate.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="painIntensity">
                                                        <span class="cr">
                                                                                     <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>The pain is moderate and does not vary much.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="painIntensity">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>The pain comes and goes and is severe.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="painIntensity">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>The pain is severe and does not vary much.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 2 - PERSONAL CARE</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I do not have to change my way of washing or dressing in order to avoid pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I do not normally change my way of washing or dressing even though it causes some pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Washing and dressing increases the pain but I manage not to change my way of doing it.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="4" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Washing and dressing increases the pain and I find it necessary to change my way of doing it. </span>.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Bacause of the pain I am unable to do some washing and dressing without help.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="personalCare" class="form-control">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Bacause of the pain I am unable to do any washing and dressing without help.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 3 - LIFTING</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I can lift heavy weights without extra pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I can lift heavy weights,but it causes extra pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Pain prevents me from lifting heavy weights off the floor.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Pain prevents me from lifting heavy weights off the floor,but I can manage if they are conveniently positioned.e.g.on a table</span>

                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="5" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>Pain prevents me from lifting heavy weight,but I can Manage light to medium weights if they are conveniently positioned.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="lifting">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I can only lift very light weights at the most.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 4 - Walking</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I have no pain an Walking.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I have some pain on Walking but it does not increases with distance.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I cannot walk more than one mile without increasing pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="4" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I cannot walk more than 1/2 mile without increasing pain.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="5" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I cannot walk more than 1/4 mile without increasing pain.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="6" name="walking">
                                                        <span class="cr">
                                                                                    <i class="cr-icon ik ik-check txt-success"></i>
                                                                                </span>
                                                        <span>I can't walk at all without increasing pain.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group forms-sample col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 5 - SITTING</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I can sit in any chair as long as I like.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I can sit only in my favorite chair as long as I like.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain prevents me from sitting more thsn one hour.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain prevents me from sitting more thsn 1/2 hour.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain prevents me from sitting more thsn 10 minutes.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="sitting1">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I avoid sitting because it increases pain straight away.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 6 - STANDING</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I can stand as long as I want without pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I have some pain on standing but it does not increase with time.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I cannot stand for longer than one hour without increasing pain.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I cannot stand for longer than 1/2 hour without increasing pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I cannot stand for longer than 10 minutes without increasing pain</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="standing">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I avoid standing because it increases the pain immediately.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 7 - SLEEPING</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get no pain in bed.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get pain in bed but it does not prevent me from sleeping well.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Because of pain my normal night's sleep is reduced by less than 1/4.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Because of pain my normal night's sleep is reduced by less than 1/2.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Because of pain my normal night's sleep is reduced by less than 3/4.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="sleeping">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain prevents me from sleeping at all.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group  col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 8 - Social Life</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My social life is normal and gives me no pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My social life is normal but increases the degree of my pain.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain has no significant effect on my social life apsrt from limiting my more energetic iterests.e.g dancing. etc.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain has restricted my social life,and I do not go out very often.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain has restricted my social life to my home.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="socialLife">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I have hardly any social life because of the pain.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group forms-sample col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 9 - TRAVEL</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="travel">
                                                        <span class="cr">
                                                           <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get no pain while traveling.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="travel">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get some pain while traveling,but none of my usual forms of travel make it any worse.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="travel">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get extra pain while traveling,but it does not compets me to seek alternative forms of travel.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="travel">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>I get extra pain while traveling,which compets me to seek alternative forms of travel.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="travel">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain restricts all forms of travel.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="travel">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>Pain prevents all forms of travel except that done lying down.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="form-group forms-sample col-sm-3">
                                                <label for="exampleInputUsername1"><b>SECTION 10 - CHANGING DEGREE OF PAIN</b></label>
                                                <br>

                                                <div class="checkbox-fade fade-in-success ">
                                                    <label>
                                                        <input type="radio" value="1" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain is rapidly getting better.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="2" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain fluctuates but overall is definitely getting better.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="3" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain seems to be getting better but improvement is slow at present.</span>
                                                    </label>
                                                    <br>

                                                    <label>
                                                        <input type="radio" value="4" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain is neither getting better nor worse.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="5" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                                                        <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain is gradually worsening.</span>
                                                    </label>
                                                    <br>
                                                    <label>
                                                        <input type="radio" value="6" name="changingDegreeOfPain">
                                                        <span class="cr">
                                                         <i class="cr-icon ik ik-check txt-success"></i>
                                                                                    </span>
                                                        <span>My pain is rapidly worsening.</span>
                                                    </label>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="form-group forms-sample  col-sm-3" style="border: 1px solid;">
                                            
                                                <span class="b" style="font-size: 15px;">0%-20% : Minimal disability</span><br>
                                                <span class="b" style="font-size: 15px;">21%-40% : Moderate disability</span><br>
                                                <span  class="b" style="font-size: 15px;">41%-60% : Severe disability</span><br>
                                                <span class="b" style="font-size: 15px;">61%-80% : Crippling back pain</span></br>
                                                <span class="b" style="font-size: 15px;">81%-100% : These patients are either bed-bound or have an exaggeration of their symptoms.</span>
                                            </div>
                                            <div class="form-group forms-sample  col-sm-3">
                                                <h4><strong id="per"></strong></h4>
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
<script src="jscode/lowBackPain.js"></script>