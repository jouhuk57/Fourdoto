<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>FourDotO </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>

<style>
.invalid-feedback {
    /* display: none; */
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}
</style>


</head>

<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">FourDotO</span></div>
<div class="col-md-2 col-md-offset-4">
<a href="#" class="pull-right btn sub1" style="border-radius:0%" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Login</b></span></a></div>
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1 text-center"><span style="color:black"><b>USER LOGIN</b></span></h4>
      </div>
    

      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
        @csrf
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Email" class="form-control input-md" type="email" value="{{ old('email') }}">
  @error('email')
  <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
  @enderror
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Password" class="form-control input-md" type="password">
     @error('password')
    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
    @enderror
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

</div><!--header row closed-->
</div>

<div class="bg1">
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">
<!-- sign in form begins -->  
<form class="form-horizontal" name="form" action="{{ route('register') }}" method="POST">
@csrf
<fieldset>

<p class="text-center"><b>Register Now</b></p>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Fullname" class="form-control input-md" type="text"  value="{{ old('name') }}"  autofocus>
  @error('name')
  <span class="invalid-feedback" role="alert"> <strong> {{ $message }}</strong></span>
  @enderror
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Gender" class="form-control input-md"  value="{{ old('gender') }}"  autofocus>
   <option value="">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  @error('gender')
  <span class="invalid-feedback" role="alert"> <strong> {{ $message }}</strong></span>
  @enderror
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email" ></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Email ID" class="form-control input-md" type="email"  value="{{ old('email') }}"  autofocus>
  @error('email')
  <span class="invalid-feedback" role="alert"> <strong> {{ $message }}</strong></span>
  @enderror
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="phone"></label>  
  <div class="col-md-12">
  <input id="phone" name="phone" placeholder="Contact Number" class="form-control input-md" type="number" value="{{ old('phone') }}"  autofocus>
  @error('phone')
  <span class="invalid-feedback" role="alert"> <strong> {{ $message }}</strong></span>
  @enderror
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Password" class="form-control input-md" type="password" value="{{ old('password') }}"  autofocus>
  @error('password')
  <span class="invalid-feedback" role="alert"> <strong> {{ $message }}</strong></span>
  @enderror
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="password-confirm" name="password_confirmation" placeholder="Conformation Password" class="form-control input-md" type="password">
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub btn btn-danger" value="Register"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->

<!--Footer start-->
<div class="row footer">
<div class="col-md-4 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>
<!--footer end-->
</div>


</body>
</html>
