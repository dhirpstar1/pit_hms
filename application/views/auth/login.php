<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to HMS - Login</title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- CSS Files -->
  <link href="<?=base_url('/assets/css/material-dashboard.css');?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url('/assets/demo/demo.css');?>" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
<style type="text/css">

#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
 
}

.wrapper {
  background: url("http://hms.pitgondia.com/assets/img/medical-img.jpg") no-repeat top center;
  position: relative;
  background-size: cover;
  height:100vh;
}

.overlay {
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
}

.overlay input {
  width: 100%;
  padding: 3px 0 3px 2px;
  font-size: 13px;
  margin-bottom: 14px;
}

.overlay label {
  color: #333;
}

.overlay #remember, .overlay .btn {
  width: auto;
}

.forgotPass {
  text-align: center;
}

.forgotPass a {
  color: #333;
  font-size: 15px;
}

.forgotPass a:hover {
  color: #333;
  text-decoration: underline;
}

.overlay .btn { 
  padding: 13px 50px;
  margin: 0 auto;
  display: table;
  margin-top: 15px;
  margin-bottom: 15px;
  width: 100%;
}

.overlay .btn:hover {
  background: #0d393c;
}


.lognTitle {
  text-align: center;
  color: #000;
  font-size: 20px;
  margin-bottom: 18px;
}

#login_div
{
background-color: white;
padding: 20px;
max-width: 350px;
left: 0;
top: 15%;
right: 0;
margin-left: auto;
margin-right: auto;
position: absolute;
border-radius: 15px;
width: 100%;
box-shadow: 0px 3px 10px #333;
}
#login_div button
{
 margin-top:20px;
 height:40px;
 width:100%;
}
#login_div #register
{
 margin-top:20px;
 float:left;
}
#login_div #forgot
{
 margin-top:20px;
 float:right;
}

.venderInfo {
  font-size: 14px;
}

.venderInfo p {
  line-height: 19px;
  font-size: 13px;
}

#infoMessage {
  color: #ff0000;
  font-size: 14px;
  line-height: 10px;
  text-align: center;
}

@media screen and (max-width: 420px) {
    #login_div {
        left: 3%;
    }
}
  </style>
</head>
<body>
 <div class="wrapper">
  <div class="overlay">
  <div id="login_div" class="col-md-4">
    <h2 class="lognTitle">Login Here</h2>
<?php echo form_open("auth/login"); ?>

<div class="input-field">
<i class="mdi-social-person-outline prefix"></i>
<?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
</div>

<div class="input-field">
<i class="mdi-action-lock-outline prefix"></i>
<?php echo lang('login_password_label', 'password');?><br>
    <?php echo form_input($password);?>

</div>
        
<div class="input-field">
   <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>

</div>

<div class="input-field">
  <?php echo form_submit('submit', lang('login_submit_btn'),array('class' => 'btn waves-effect waves-light'));?>
</div>
<div id="infoMessage"><?php echo $message;?></div>
<p class="forgotPass">
<a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
</p>
</form>
<div class="venderInfo"><strong>Pratham i Technologies</strong><p>Online Help Numbers.<br> Mobile: +91 9021302666.<br>Monday To Saturday, 11:00 AM To 10:00 PM</div>
</p></div>
</div>
<?php echo form_close();?>
<!--   Core JS Files   -->
  <script src="<?=base_url('/assets/js/core/jquery.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('/assets/js/core/popper.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('/assets/js/core/bootstrap-material-design.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('/assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->
  <!--  Notifications Plugin    -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=base_url('/assets/demo/demo.js');?>"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>
</html>