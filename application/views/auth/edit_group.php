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

	  <?php echo form_open(current_url());?>
<div class="row">
  
<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating"><?php echo lang('create_group_name_label', 'group_name');?></label><br />
      <?php echo form_input($group_name);?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
      <label class="bmd-label-floating">
      <?php echo lang('create_group_desc_label', 'description');?> </label><br />
            <?php echo form_input($group_description);?>
</div>
</div>
</div>
      

      <div class="row">
  
  <div class="col-md-6">
  <div class="form-group">
  <?php echo anchor('auth', 'Back', 'class="btn btn-primary"')?>

  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
  <?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"');?>
  </div>
  </div>
  </div>

<?php echo form_close();?>
</div>
  </div>
  </div> 