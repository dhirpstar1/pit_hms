<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Surgery</h4>
                  <p class="card-category"> Surgery Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="Series" id="Series" value="<?=$data->Series;?>">
                  <input type="hidden" id="ipdno" name="ipdno" value="<?=$data->ipdno;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">                       
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Admit Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="doa" value="<?=($data->doa) ? date('d/m/Y', strtotime($data->doa)) : date('d/m/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" data-toggle="datepicker" class="form-control exclude" name="sdate" value="<?=($data->sdate) ? date('d/m/Y', strtotime($data->sdate)) : date('d/m/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">CRNO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="CRNO"  value="<?=($data->CRNO);?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPDNO.</label>
                          <input type="text" class="form-control" id="ipdno"  readonly value="<?=($data->ipdno);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name Verified</label>
                          <div class="row">
                          <div class="col-md-10"> <input type="text" class="form-control" id="PName" value="<?=$data->PName;?>" readonly></div>
                          <div class="col-md-2"><input type="checkbox" name="patient_verified" class="form-control" value="1" <?php if($data->patient_verified == 1){ echo 'checked="checked"';}?> >
                          </div></div>
                                                  
                          
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                          <label class="bmd-label-floating">Site of surgery</label>
                          <div class="row">
                          <div class="col-md-6">Verified</div>
                          <div class="col-md-6"><input type="checkbox" name="site_surgery_verified" class="form-control" value="1" <?php if($data->site_surgery_verified == 1){ echo 'checked="checked"';}?> >
                          </div></div>
                                                  
                          
                        </div>
                      </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="bmd-label-floating">Side of surgery</label>
                              <div class="row">
                              <div class="col-md-6">Verified</div>
                              <div class="col-md-6"><input type="checkbox" name="side_surgery_verified" class="form-control" value="1" <?php if($data->side_surgery_verified == 1){ echo 'checked="checked"';}?> >
                              </div>
                              
                              </div>
                                                      
                              
                            </div>
                        </div>
                      </div>
                      


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name of Surgen</label>
                          <input type="text" class="form-control" name="name_of_surgeon" value="<?=$data->name_of_surgeon;?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Anesthesiologist</label>
                          <input type="text" class="form-control" name="anesthesiologist" value="<?=$data->anesthesiologist;?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type of Anaesthesia</label>
                          <input type="text" class="form-control" name="type_of_anaesthesia" value="<?=$data->type_of_anaesthesia;?>">
                        </div>
                      </div>
                     
                    </div>
             <div class="row">
             <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name Of Nurse</label>
                          <input type="text" class="form-control"  name="name_of_nurse" value="<?=$data->name_of_nurse;?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type Of Surgery</label>
                          <input type="text" class="form-control" name="type_of_surgery" value="<?=$data->type_of_surgery;?>">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">Preoperative Medication</label>
                          <input type="checkbox" name="side_surgery_verified" class="form-control" value="1" <?php if($data->side_surgery_verified == 1){ echo 'checked="checked"';}?> >                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Preoperative Diagnosis</label>
                          <input type="text" class="form-control" name="preoperative_diagnosis" value="<?=$data->preoperative_diagnosis;?>">
                        </div>
                      </div>
                     
                     
              </div>
              <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Surgery	 Major/Minor</label>
                          <input type="checkbox" name="surgery_major_minor" class="form-control" value="1" <?php if($data->surgery_major_minor == 1){ echo 'checked="checked"';}?> >                        
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Begins Time	</label>
                          <input type="text" class="form-control" placeholder="00:00" name="begins_time" value="<?=$data->begins_time;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">End Time</label>
                          <input type="text" class="form-control" placeholder="00:00" name="end_time" value="<?=$data->end_time;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">D escription of Surgery</label>
                          <textarea class="form-control" name="description_of_surgery" ><?=$data->description_of_surgery;?></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Post Operative Assesment and Plan of Treatment</label>
                          <textarea class="form-control" name="plan_of_treatment" ><?=$data->plan_of_treatment;?></textarea>
                        </div>
                      </div>
                    </div>             
                    <button type="submit" class="btn btn-primary pull-right" id="save_button">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>

<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });           
$( "#save_data" ).submit(function(event) {
$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
  $( this ).submit();
});
/////////////////////////////////////////////////////////////////////////////////////////////
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