<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Gynec</h4>
                  <p class="card-category"> Gynec Register Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="series" id="Series" value="<?=get_year_code();?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" class="form-control exclude" name="doa" id="doa" data-toggle="datepicker" value="<?=($data->doa) ? date('d/m/Y', strtotime($data->doa)) : date('d/m/Y');?>" required="required">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOG</label>
                          <input type="text" class="form-control" name="gdate" data-toggle="datepicker" id="gdate" value="<?=($data->gdate) ? date('d/m/Y', strtotime($data->gdate)) : date('d/m/Y');?>" required="required">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No.</label>
                          <?=get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="Crno"  value="<?=($data->Crno);?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD No.</label>
                          <?=get_year_code();?>
                          <input type="text" class="form-control fetch_data" id="ipdno"  readonly  value="<?=($data->ipdno);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" name="pname" value="<?=$data->pname;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('sex', array('M' => 'Male', 'F' => 'Female'), $data->Sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                    </div>
                               

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                         <?php echo form_dropdown('department', $departments, $data->department, 'class="form-control" id="Department"'); ?>    
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Testing Doctor</label>
                         <?php echo form_dropdown('doctorname', $doctors, $data->doctorname, 'class="form-control" id="DoctorName"'); ?>    
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <hr> <div class="col-md-12">
                    <h5>Select Local Procedure</h5>
                    </div>
                    <?php  foreach($procedures as $key => $item): ?>
                    <div class="col-md-3">
                    <?=$item;?>
                    </div>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="name[<?=$key;?>]" value="<?php foreach($saveprocedures as $pkey => $pitem): if($pkey == $key){ echo $pitem;} endforeach;?>" >
                    </div>
                    <?php endforeach; ?>
                    </div>                  
                    <button type="submit" id="save_button" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script>
/////////////////////////////////////////////////////////////////////////////////////////////
$( "#save_data" ).submit(function(event) {
$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
  $( this ).submit();
});
$('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });
$('.fetch_data').on('focusout', function(){
  sate_form_data($(this).val());
});   
function sate_form_data(set_id){
  $('.fetch_data').val(set_id);
  $.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + set_id, function(data){
  if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="'+idx+'"]').val(val).change();
    });
}else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
  }); 
}
</script>