<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Diet</h4>
                  <p class="card-category"> Diet Master</p>
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
                          <input type="text" class="form-control" data-toggle="datepicker" id="doa" value="<?=($data->doa) ? date('m/d/Y', strtotime($data->doa)) : date('m/d/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" data-toggle="datepicker" class="form-control exclude" name="sdate" value="<?=($data->sdate) ? date('m/d/Y', strtotime($data->sdate)) : date('m/d/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">CRNO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="crno"  value="<?=($data->CRNO);?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPDNO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="ipdno" readonly value="<?=($data->ipdno);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" value="<?=$data->PName;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bed No.</label>
                          <input type="text" class="form-control"  id="bedid" value="<?=$data->bedid;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="text" class="form-control"  id="Age" value="<?=$data->Age;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <input type="text" class="form-control"  id="Sex" value="<?=$data->Sex;?>" readonly>
                        </div>
                      </div>
                     
                    </div>
                    
             <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Occupation</label>
                          <input type="text" class="form-control" name="occupation" value="<?=$data->occupation;?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact No</label>
                          <input type="text" class="form-control" name="contact_no" value="<?=$data->contact_no;?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Height (CM)</label>
                          <input type="text" class="form-control" name="height" value="<?=$data->height;?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight (KG)</label>
                          <input type="text" class="form-control" name="weight" value="<?=$data->weight;?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">BMI</label>
                          <input type="text" class="form-control" name="BMI" value="<?=$data->BMI;?>" readonly>
                        </div>
                      </div>
              </div>
              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type Of Food Accustomed	</label>
                          <input type="text" class="form-control" name="type_of_food_accustomed" value="<?=$data->type_of_food_accustomed	;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Any Food Allergy</label>
                          <input type="text" class="form-control" name="food_allergy" value="<?=$data->food_allergy;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Any Weight Loss Reported</label>
                          <input type="text" class="form-control" name="weight_loss_reported" value="<?=$data->weight_loss_reported;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Assessment Of Agni</label>
                          <input type="text" class="form-control" name="assessment_of_agni"  value="<?=$data->assessment_of_agni;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Assessment Of Mala Pravrutti</label>
                          <input type="text" class="form-control" name="assessment_of_mala_pravrutti" value="<?=$data->assessment_of_mala_pravrutti;?>">
                        </div>
                      </div>
                       <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Diet Prescription</label>
                          <input type="text" class="form-control"  name="diet_prescription" value="<?=$data->diet_prescription;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Prescribed Breakfast</label>
                          <input type="text" class="form-control" name="prescribed_breakfast" value="<?=$data->prescribed_breakfast;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Prescribed Lunch</label>
                          <input type="text" class="form-control" name="prescribed_lunch" value="<?=$data->prescribed_lunch;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Prescribed Dinner</label>
                          <input type="text" class="form-control"  name="prescribed_dinner" value="<?=$data->prescribed_dinner;?>">
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
}</script>