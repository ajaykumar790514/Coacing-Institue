<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RS INSTITUTE ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>themes/admin_panel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
#otpdiv{

display: none;
}
#verifyotp{

display: none;
}
#resend_otp{
display: none;
font-size: 1.2rem;
}
#resend_otp:hover{

text-decoration:underline;

}
.email
{
    display: none;
}
    </style>
</head>

<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row mt-5">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" id="login">
                    <div class="panel-heading">
                        <img src="<?=base_url();?>images/logo/rslogo.png" height="60px" alt="">
                        <h3 class="panel-title" style="margin-top: 10px;text-align:center">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?=base_url()?>admin/check_login" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                <div class="forgot-password">
                                   <a href="#" id="createnew" style="float:right;margin-top:1rem">Forgot Pasword</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <!-- Forgot Pas -->
                <div class="login-panel panel panel-default email" id="email">
                    <div class="panel-heading">
                        <img src="<?=base_url();?>images/logo/rslogo.png" height="60px" alt="">
                        <h3 class="panel-title" style="margin-top: 10px;text-align:center">Forgot Password</h3>
                    </div>
                    <div id="message2" style="text-align:center;margin-top:1rem"></div>
                    <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter your email address" name="email" id="create_email" type="email" onkeyup='validate(this)' autofocus>
                                    <span class="error text-danger"></span>
                                </div>
                                <input type="button" id="emailbtn" class="btn btn-lg btn-success btn-block" value="Send OTP">
                                <div class="forgot-password">
                                   <a href="#" id="loginbtn" style="float:right;margin-top:1rem">Back</a>
                                </div>
                            </fieldset>
                    </div>
                </div>


                 <!-- Forgot Pas -->
                 <div class="login-panel panel panel-default otp" id="otp" style="display:none">
                    <div class="panel-heading">
                        <img src="<?=base_url();?>images/logo/rslogo.png" height="60px" alt="">
                        <h3 class="panel-title" style="margin-top: 10px;text-align:center">Forgot Password</h3>
                    </div>
                    <div id="message3" style="text-align:center;margin-top:1rem"></div>
                    <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter OTP" name="email-otp" id="create_otp" type="number"  autofocus>
                                    <span class="error text-danger"></span>
                                    <br>
                                    <div class="countdown"></div>
                                            <a href="#" id="resend_otp" class="text-primary" type="button">Resend</a>
                                </div>
                                <input type="button" id="otpbtn" class="btn btn-lg btn-success btn-block" value="Next">
                                <div class="forgot-password">
                                   <a href="#" id="loginbtn" style="float:right;margin-top:1rem">Back</a>
                                </div>
                            </fieldset>
                    </div>
                </div>
                
                <div class="login-panel panel panel-default final" id="final" style="display:none">
                    <div class="panel-heading">
                        <img src="<?=base_url();?>images/logo/rslogo.png" height="60px" alt="">
                        <h3 class="panel-title" style="margin-top: 10px;text-align:center">Forgot Password</h3>
                    </div>
                    <div id="message4" style="text-align:center;margin-top:1rem"></div>
                    <div class="panel-body">
                            <fieldset>
                                <input type="hidden" id="account_email" class="account_email">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="email-password" id="email-password" type="password"  autofocus>
                                    <span class="error text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Confirm Password" name="email-cpassword" id="email-cpassword" type="password"  autofocus>
                                    <span class="error text-danger"></span>
                                </div>
                                <input type="button" id="finalbtn" onclick="submit_form()"  class="btn btn-lg btn-success btn-block" value="Submit">
                                <div class="forgot-password">
                                   <a href="#" id="loginbtn" style="float:right;margin-top:1rem">Back</a>
                                </div>
                            </fieldset>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url()?>themes/admin_panel/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>themes/admin_panel/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>themes/admin_panel/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>themes/admin_panel/dist/js/sb-admin-2.js"></script>
    <script>
    function validate(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(email.value)) {
            $(".success").html("Valid").fadeIn();
            window.setTimeout(function() {
                $(".success").fadeOut();
            }, 5000);
        } else {
            $(".error").html("Please enter a valid email address").fadeIn();
            window.setTimeout(function() {
                $(".error").fadeOut();
            }, 1000);
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#createnew').click(function() {
            $('#login').hide();
            $('.email').show(); // Toggle the visibility of the div
        });
        $('#loginbtn').click(function() {
            $('#login').show();
            $('.email').hide(); // Toggle the visibility of the div
        })
    });


       // Opt area BY AJAY KUMAR
 $(document).ready(function(){
function send_otp(email){
if(email==''){
showMessage('Please Enter your email address', 'error');

}else{
    $.ajax({
url:"<?=base_url();?>Admin/email_otp",
type:"POST",
data:{email:email},
success:function(data)
{
    console.log(data);
     data = JSON.parse(data);
    
    if (data.res=='success') {
    showMessage('OTP send you email address', 'success');
    timer();
    $("#account_email").val(email);
    $(".otp").show();
    $(".email").hide();
    $("#login").hide();
   }
   
   if(data.res=='error')
   {
    showMessage(data.msg, 'error');
    $(".email").show();
    $("#login").hide();
   }
}
});
}
};

// send otp
$('#emailbtn').click(function(){

var email = $('#create_email').val();
send_otp(email);
});
//resend otp function
$('#resend_otp').click(function(){

var email = $('#create_email').val();

send_otp(email);
$(this).hide();
});
//end of resend otp function

});
//start of timer function

function timer(){

var timer2 = "00:31";
var interval = setInterval(function() {


var timer = timer2.split(':');
//by parsing integer, I avoid all extra string processing
var minutes = parseInt(timer[0], 10);
var seconds = parseInt(timer[1], 10);
--seconds;
minutes = (seconds < 0) ? --minutes : minutes;

seconds = (seconds < 0) ? 59 : seconds;
seconds = (seconds < 10) ? '0' + seconds : seconds;
//minutes = (minutes < 10) ?  minutes : minutes;
$('.countdown').html("Resend otp in:  <b class='text-primary'>"+ minutes + ':' + seconds + " seconds </b>");
//if (minutes < 0) clearInterval(interval);
if ((seconds <= 0) && (minutes <= 0)){
clearInterval(interval);
$('.countdown').html('');
$('#resend_otp').css("display","block");
} 
timer2 = minutes + ':' + seconds;
}, 1000);

}

$(document).ready(function(){
              // check otp
              
        $("#otpbtn").on('click',function(){
           var otp = $('#create_otp').val();
          if(otp==''){
          showMessage('Please Enter Otp', 'error');
          }else{
          $.ajax({
          url:"<?=base_url();?>Admin/check_otp",
          type:"POST",
          data:{otp:otp},
          success:function(data)
          {

             if(data==1)
             {
                $(".final").show();
                $(".otp").hide();
             }else
             {
               
                showMessage('OTP not Correct', 'error');
             }
         }
      });
      }
      })
    });

function submit_form(){
var flag = 0;   
var email = $("#account_email").val();
var password = $("#email-password").val();
var cpassword = $("#email-cpassword").val();
if (email == '' || email == undefined) {
$('#email').css('border', '1px solid red');
flag = 1;
showMessage('Checkbox check.', 'error');
return;
}
 if (password == '' || password == undefined) {
$('.password').css('border', '1px solid red');
 flag = 1;
showMessage('Mobile  cannot be blank.', 'error');
return;
 }
 if (cpassword == '' || cpassword == undefined) {
$('.cpassword').css('border', '1px solid red');
 flag = 1;
showMessage('Mobile  cannot be blank.', 'error');
return;
 }
if (flag == 0) {
$.ajax({
url:"<?=base_url();?>Admin/FinalForgot",
type:"POST",
data:{email:email,password:password,cpassword:cpassword},
success:function(data)
{
    console.log(data);
     data = JSON.parse(data);
    
    if (data.res=='success') {
    showMessage(data.msg, 'success');
    $(".email").hide();
    $("#login").hide();
    $(".otp").hide();
    window.setTimeout(function() {
    location.reload();
}, 1000);
   }
   
   if(data.res=='error')
   {
    showMessage(data.msg, 'error');
    $(".email").hide();
    $("#login").hide();
    $(".otp").hide();
   }
}
});
}
};
</script>
<script>
     function showMessage(message, type) {
        var messageDiv2 = $('#message2');
            messageDiv2.html('<div class="' + (type === 'success' ? 'text-success' : 'text-danger') + '">' + message + '</div>').show();
            setTimeout(function() {
                messageDiv2.fadeOut();
            }, 5000);

      var messageDiv3 = $('#message3');
            messageDiv3.html('<div class="' + (type === 'success' ? 'text-success' : 'text-danger') + '">' + message + '</div>').show();
            setTimeout(function() {
                messageDiv3.fadeOut();
            }, 5000);

            var messageDiv4 = $('#message4');
            messageDiv4.html('<div class="' + (type === 'success' ? 'text-success' : 'text-danger') + '">' + message + '</div>').show();
            setTimeout(function() {
                messageDiv4.fadeOut();
            }, 5000);
        }
</script>
</body>

</html>
