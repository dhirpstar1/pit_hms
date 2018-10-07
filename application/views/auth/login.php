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
  <style type="text/css">

#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#login_div
{
 background-color: white;
padding: 20px;
max-width: 300px;
left: 38%;
top: 15%;
position: absolute;
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
@media screen and (max-width: 420px) {
    #login_div {
        left: 3%;
    }
}
  </style>
</head>
<body>

 <div class="wrapper">
<div id="login_div" class="col-md-4">
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

<p>
<a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
</p>
<div id="infoMessage"><?php echo $message;?></div>

<br>
<br>
</form>
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