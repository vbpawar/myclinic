<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href=" favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href=" plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href=" plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href=" plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href=" plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href=" dist/css/theme.min.css">
    <script src=" src/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href=" plugins/datedropper/datedropper.min.css">

</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <form class="form-group" id="sample">
        <div class="row">
            <div class="col-sm-4">
                <label for=""><strong>Amount 1</strong></label>
                <input type="text" placeholder="" class="form-control" name="fieldID2" id="fieldID2">
            </div>
            <div class="col-sm-4">
                <label for=""><strong>Amount 2</strong></label>
                <input type="text" placeholder="" class="form-control" name="fieldID1" id="fieldID1">
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="s"><i class="ik ik-pocket"></i>Save</button>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-8">                                          
                   
                    <button type="button" class="btn btn-slategrey"><i class="ik ik-pocket"></i>Cancel</button>
                
            </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </form>

    <div class="row">
        <div class="col-sm-4">
            <form id="myform">
                <label for="password">Password</label>
                <input id="password" name="password" />
                <br/>
                <label for="password_again">Again</label>
                <input class="left" id="password_again" name="password_again" />
                <br>
                <input type="submit" value="Validate!">
                </form>
                <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
                <script>
                // just for the demos, avoids form submit
                jQuery.validator.setDefaults({
                  debug: true,
                  success: "valid"
                });
                $( "#myform" ).validate({
                  rules: {
                    password: "required",
                    password_again: {
                      equalTo: "#password"

                      
                    }
                  }
                });
                </script>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
    </div>


</body>
<script src="js/jquery.validate.js"></script>

<script>
    
// $.validator.addMethod('le', function(value, element, param) {
//       return this.optional(element) || value <= $(param).val();
// }, 'Invalid value');
// $.validator.addMethod('ge', function(value, element, param) {

//       return this.optional(element) || value >= $(param).val();

// }, 'Invalid value');

// $('#s').on('click',function(e){
//     console.log(e);
//     e.preventDefault();
//     $('#sample').validate({rules: {
//             fieldName1: {le: '#fieldID2'},
//             fieldName2: {ge: '#fieldID1'},
      
//       },
//       messages: {
//             fieldName1: {le: 'Must be less than or equal to field 2'},
//             fieldName2: {ge: 'Must be greater than or equal to field 1'},

//       }
// });
// });


$('#s').on('click',function(e){
    console.log(e);
    e.preventDefault();
$.validator.addMethod('lessThanEqual', function(value, element, param) {
    if (this.optional(element)) return true;
    var i = parseInt(value);
    var j = parseInt($(param).val());
    return i <= j;
}, "The value {0} must be less than {1}");
});

// $('#sample').on('submit',function(e){
//     console.log('e');
// $.validator.addMethod( "greaterThan", function ( value, element, param ) {
//     var target = $( param );

//     if ( this.settings.onfocusout && target.not( ".validate-greaterThan-blur" ).length ) {
//         target.addClass( "validate-greaterThan-blur" ).on( "blur.validate-greaterThan", function () {
//             $(element).valid();
//         });
//     }

//     return value > target.val();
// }, "Please enter a greater value.");
// }

</script>
</html>