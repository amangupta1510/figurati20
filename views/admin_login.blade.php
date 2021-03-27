<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>Figurati20</title>
<meta name="description" content="Figurati20,fig20 ,Figurati beer, fig20 admin panel,best beer in india"/> 
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/util.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main.css')}}" rel="stylesheet" />
    <link href="{{asset('fonts/icon-font.min.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body oncontextmenu="return false">
   <div id="notice" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
<h5 id="noti1"></h5>
         </div>
  <div class="modal-footer">
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Close
            </button>
          </div>
      </div>
    </div>
  </div>
</div></div> 
     <!-- Modal -->
  <div class="modal fade" id="forgotpass" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password.</h4>
        </div>
        <div class="modal-body">
        <p id="forgot-error" class="forgot-error text-center alert alert-danger" style="display: none;"></p>
        <p id="forgot-success" class=" text-center alert alert-success" style="display: none;">Password Updated Successfully...</p>
         <div class="container" id="container">
    <div class="form-container sign-up-container">
       <form id="form_email" class="form-horizontal" role="modal">
        @csrf
        <span>please enter your Username here.</span>
        <input type="text" id="username" placeholder="Registered Username"  name="username" maxlength="255"  required>
        <button type="submit" id="send_otp">Send OTP</button>
      </form>
       <form id="form_changepass" class="form-horizontal" role="modal" style="display: none;">
        @csrf
        <span>please enter you OTP(emailed) and New password here.</span>
        <input type="hidden" id="forgot_username" name="username" required="">
        <input type="number" placeholder="OTP"  name="otp" class="forgot_otp" required="">
         <input type="password" placeholder="New Password" id="forgot_pass"  name="new_password" required="">
           <p id="forgotpserror"></p>
          <input type="password" placeholder="Confirm Password" id="forgot_con_pass" name="con_password" required="">
       
        <button type="submit" id="changeattemt" disabled="">Verify and Update</button>
        <div class="container-login100-form-btn m-t-4">
                          <a onclick="cancel()"><b>Cancel</b></a>
                    </div>
      </form>
    </div>
   
   
      </div>
        </div>
      </div>
      
    </div>
  </div>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('wp-content/image/beer-background.jpg') }}');">
            <div  class="wrap-login100 p-t-15 p-l-8">
                 <img src="{{ asset('admin_css/images/logo.png') }}" width="95%">
                <span class="login100-form-title p-b-0 p-t-30" style="font-family: Ubuntu-Bold;color: rgba(10, 10, 10, 0.8);">
                    Admin Login
                </span>
                 @if($errors->any())
<div class="alert alert-danger" style="padding-top: -25px;">
          <li>Incorrect Username or Password...</li>
</div>
@endif        
                <form autocomplete="off" method="POST" action="{{ route('admin-login') }}" class="login100-form validate-form p-b-33 p-t-5">
                        @csrf
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="User name" autocomplete="false" required>
                        <span class="focus-input100" data-placeholder="&#xe82a;" ></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password"  placeholder="Password" name="password" autocomplete="false" required>
                        <input class="input100" type="hidden" id="token" name="token" autocomplete="false">
                        <input class="input100" type="hidden" id="token_type" name="token_type" autocomplete="false">
                        <input class="input100" type="hidden" id="version_code" name="version_code" autocomplete="false">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                     <div class="btn-info container-login100-form-btn m-t-4">
                          <a onclick="forgotpass()" style="cursor: pointer;"><b>Forgot password ?</b></a>
                    </div>
                </form>
            </div>

        </div>

            <div class="col-md-12" style="min-height: 5vh; max-height: 5vh;padding-top: 6px;background-color: rgba(43, 43, 51, 0.9);">
                      <p style=" color: #fff" class="text-center">© 2020 Figurati20</p>
                    </div>  
    </div>
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
 <script type="text/javascript">
    function modal() {
  $('#myModal').modal("show");
  $('.modal-backdrop').css('display','none');
  }
  function forgotpass() {
    document.getElementById('form_changepass').reset();
  $('#forgotpass').modal("show");
  $('.modal-backdrop').css('display','none');
  }
   function cancel() {
  $('#form_email').css('display','');
  $('#form_changepass').css('display','none');
  $('#forgot-success').css('display','none');
  $('#forgot-error').css('display','none');
  }
$('#forgot_con_pass').keyup(function(){
    var add_password = $('#forgot_pass').val();
  var add_password1 = $('#forgot_con_pass').val();
  if(add_password==add_password1) {
    $('#forgotpserror').html('');
    $('#changeattemt').attr('disabled',false);
  }
  else{
    $('#forgotpserror').html('** password are not matching');
    $('#forgotpserror').css('color','red');
    $('#changeattemt').attr('disabled',true);
  }
});
$('#forgot_pass').keyup(function(){
    var add_password = $('#forgot_pass').val();
  var add_password1 = $('#forgot_con_pass').val();
  if(add_password==add_password1) {
    $('#forgotpserror').html('');
    $('#changeattemt').attr('disabled',false);
  }
  else{
    $('#forgotpserror').html('** password are not matching');
    $('#forgotpserror').css('color','red');
    $('#changeattemt').attr('disabled',true);
  }
});
   
  $('#form_email').on('submit', function(event){
  event.preventDefault();
  $('#send_otp').attr('disabled',true);
  $('#send_otp').text('please wait...');
  $.ajax({
   url:"{{ route('forgotpassword') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
           $('#send_otp').attr('disabled',false);
           $('#send_otp').text('Send OTP');
        if ((data.errors)) {
          $('#forgot-success').css('display','none');
          $('#forgot-error').css('display','');
          $('#forgot-error').html('Username not Registered.');
           
        
        }else{
            $('#form_email').css('display','none');
            $('#form_changepass').css('display','');
             $('#forgot-success').css('display','none');
             $('#forgot-error').css('display','none');
              $('#forgot_username').val($('#username').val());

        document.getElementById('form_email').reset();
  }

    },
    })
    });

 $('#form_changepass').on('submit', function(event){
  event.preventDefault();
 var pass = document.getElementById('forgot_pass').value;
   if(pass.length<6){
    $('#forgot-error').html('** password should contain atleast 6 characters.');
    $('#forgot-error').css('display','');
    }else{
  $.ajax({
   url:"{{ route('forgotpasswordchange') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
        if ((data.errors)) {
          $('#forgot-success').css('display','none');
          $('#forgot-error').css('display','');
          $('#forgot-error').text('OTP not matched.'); 
        }else{
            $('#form_email').css('display','none');
          $('#forgot-success').css('display','');
          $('#forgot-error').css('display','none');
          $('#form_changepass').css('display','none');
         document.getElementById('form_changepass').reset();
  
  
  }

    },
    })
}
    });
    </script>
    <style type="text/css">
  .modal-backdrop.in{
    opacity: 0;
  }
.signup_div{
text-align: center;
width: 90%;
margin-left: 5%;
 margin-top: 10px;
 padding: 20px;
 color: #fff;
 background-color: #31b0d5;
  box-shadow: 0 14px 28px rgba(0,0,0,0.35), 0 10px 10px rgba(0,0,0,0.32);
}
.container{
  border-radius: 10px;
  position: relative;
  overflow: hidden;
  width:1200px;
  max-width: 100%;
}

.form-container form {
  background: #fff;
  display: flex;
  flex-direction: column;
  padding: 0 5%;
  width: 100%;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.form-container input {
  background: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}
button {
  border-radius: 20px;
  border: 1px solid #ff4b2b;
  background: #ff4b2b;
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}
button:active {
  transform: scale(0.95);
}
button:focus{
  outline: none;
}
button.ghost{
  background: transparent;
  border-color: #fff;
}
.form-container{
  top: 0;
  transition: all 0.6s ease-in-out;
}
.socket-container:before {
  content: "";
  background-color: rgba(0, 0, 0, 0.6);
  display: block;
  position: fixed;
  z-index: 9999999;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.socket-container:closed {
  display: none;
}

.socket {
  position: fixed;
  overflow-y: scroll;
  top: 30%;
  left: 0px;
  right: 0px;
  margin: 0 auto;
  display: block;
  background: white;
  padding: 10px;
  width: 400px;
  max-width: 80%;
  max-height: 68%;
  z-index: 99999999999;
}
.socket_title {
     font-size: 17px;
     font-weight: 300;
    }
.btn-cancel{
  border-radius: 50%;
  width: 32px;
  text-align: center;
  border: 2px solid #e2e2e2;
  color: #a6a6a6;
  height: 32px;
  cursor: pointer;
  outline: none;
  float: right;
}
.btn-cancel:hover {
  background-color: #e5e5e5;
}

button#btn-cancel {
  color: #e5e5e5;
}
button#btn-cancel:hover {
  background-color: transparent;
}

</style>
</body>
</html>