<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">OPD</h4>
                  <p class="card-category"> OPD Register Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  <input type="hidden" name="Series" value="<?=get_year_code();?>">
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">OPD Date</label>
                          <input type="text" class="form-control exclude" data-toggle="datepicker" name="opddate" value="<?=($data->opddate) ? date('m/d/Y', strtotime($data->opddate)) : '';?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No. OPD NO.</label>
                         <strong> <?=get_year_code();?> </strong><input type="text" class="form-control exclude" name="CRNO"  value="<?=($data->CRNO) ? $data->CRNO : $next_cr_no;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">OLD OPD NO.</label>
                         </strong><input type="text" class="form-control fetch_data" name="OldCRNO"  value="<?=$data->OldCRNO;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patient Name</label>
                          <input type="text" class="form-control" id="PName" name="PName" value="<?=$data->PName;?>" required="required"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label> (In Year, Months or Days)
                          <input type="text" class="form-control" name="Age" id="Age" value="<?=$data->Age;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="Address" id="Address" value="<?=$data->Address;?>" required="required">
                        </div>
                      </div>
                      
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('Sex', array('M' => 'Male', 'F' => 'Female'), $data->Sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complain</label>
                          <input type="text" class="form-control" name="Income" value="<?=$data->Income;?>" required="required">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                         <?php echo form_dropdown('Department', $departments, $data->Department, 'class="form-control"'); ?>    
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Testing Doctor</label>
                         <?php echo form_dropdown('DoctorName', $doctors, $data->DoctorName, 'class="form-control"'); ?>    
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          });

            
    </script> 
<script>
$('.fetch_data').on('focusout', function(){
$.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + $(this).val(), function(data){
  //console.log($.parseJSON(data));
  if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="'+idx+'"]').val(val);
    });
  }else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
}); 
});
</script>