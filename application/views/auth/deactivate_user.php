<div class="content">
        <div class="container-fluid">
          <div class="row">

<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">User</h4>
                  <p class="card-category">Confirmation</p>
                </div>
                <br>

<?php echo form_open("auth/deactivate/".$user->id);?>
<div class="row">
<div class="col-md-2"></div>
    <div class="col-md-4">
    <div class="form-group">
          <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
        <input type="radio" name="confirm" value="yes" checked="checked" />
        <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
        <input type="radio" name="confirm" value="no" />
    </div>
    </div>

      <div class="col-md-6">
      <div class="form-group">
      <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary"');?>
      </div>
      </div>
</div>
      
<?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

      
<?php echo form_close();?>
</div>
  </div>
  </div> 

    </div>
  </div> 