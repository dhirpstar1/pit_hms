<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">ANC</h4>
                  <p class="card-category"> ANC Register Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  <input type="hidden" name="series" value="<?=get_year_code();?>">
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ANC Date</label>
                          <input type="text" class="form-control exclude" data-toggle="datepicker" name="ddate" value="<?=($data->ddate) ? date('m/d/Y', strtotime($data->ddate)) : date('m/d/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR NO.</label><?=get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" name="crno"  value="<?=($data->crno) ? $data->crno : $next_cr_no;?>">
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
                          <label class="bmd-label-floating">Age</label> (In Year, Months or Days)
                          <input type="text" class="form-control" id="Age" name="age" value="<?=$data->age;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" id="Address" name="address" value="<?=$data->address;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <div class="col-md-12">
                          <div class="col-md-2 pull-left"><label class="bmd-label-floating">Obs/H</label></div>
                          <div class="col-md-2 pull-left">G&nbsp;
                          <input type="text" class="form-control" id="G" name="G" value="<?=$data->G;?>">
                          </div>
                          <div class="col-md-2 pull-left">P&nbsp;
                          <input type="text" class="form-control"  id="P" name="P" value="<?=$data->P;?>">
                          </div>
                          <div class="col-md-2 pull-left">G&nbsp;
                          <input type="text" class="form-control" name="G1" value="<?=$data->G1;?>">
                          </div>
                          <div class="col-md-2 pull-left">P&nbsp;
                          <input type="text" class="form-control" name="P1" value="<?=$data->P1;?>">
                          </div>
                          <div class="col-md-2 pull-left">G&nbsp;
                          <input type="text" class="form-control" name="G2" value="<?=$data->G2;?>">
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('sex', array('M' => 'Male', 'F' => 'Female'), $data->sex, 'class="form-control" id="sex"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight</label>
                          <input type="text" class="form-control"  id="Weight" value="<?=$data->Weight;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">LMP</label>
                          <input type="text" class="form-control" data-toggle="datepicker" name="lmp" value="<?=($data->lmp) ? date('m/d/Y', strtotime($data->lmp)) : date('m/d/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">EDD</label>
                          <input type="text" class="form-control" data-toggle="datepicker" name="edd" value="<?=($data->edd) ? date('m/d/Y', strtotime($data->edd)) : date('m/d/Y');?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Indication</label>
                          <input type="text" class="form-control" name="Indication" value="<?=$data->Indication;?>" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Radiologist</label>
                          <input type="text" class="form-control" name="Radiologist" value="<?=$data->Radiologist;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Doctor</label>
                         <?php echo form_dropdown('doctor', $doctors, $data->doctor, 'class="form-control" id="DoctorName"'); ?>    
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">UCG Report</label>
                         <input type="text" class="form-control" name="USGReport" value="<?=$data->USGReport;?>">

                        </div>
                      </div>
                    </div>                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          });           
      </script> 
<script>


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