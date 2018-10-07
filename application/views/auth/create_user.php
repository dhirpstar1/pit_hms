<div class="content">
        <div class="container-fluid">
          <div class="row">

<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">User</h4>
                  <p class="card-category">Save User</p>
                </div>
                <br>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>
<div class="row">
  
<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating"><?php echo lang('create_user_fname_label', 'first_name');?></label><br />
<?php echo form_input($first_name);?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating"><?php echo lang('create_user_lname_label', 'last_name');?></label><br />
<?php echo form_input($last_name);?>
</div>
</div>
</div>

 <div class="row">
  
<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating"><?php echo lang('create_user_email_label', 'email');?></label><br />
<?php echo form_input($email);?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating"><?php echo lang('create_user_phone_label', 'phone');?></label><br />
<?php echo form_input($phone);?>
</div>
</div>
</div>     
<div class="row">
  
  <div class="col-md-6">
  <div class="form-group"> <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>
        <label class="bmd-label-floating"><?php echo lang('create_user_password_label', 'password');?></label><br />
  <?php echo form_input($password);?>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
        <label class="bmd-label-floating"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label><br />
  <?php echo form_input($password_confirm);?>
  </div>
  </div>
  </div> 
     
<div class="row">
<div class="col-md-6">                      
<?php echo anchor('auth', 'Back', 'class="btn btn-primary"')?>
</div>
<div class="col-md-6">
                      <div class="form-group">

                      <button type="submit" class="btn btn-primary pull-right">Save </button>
                        </div>
                        </div>
</div>
<?php echo form_close();?>
