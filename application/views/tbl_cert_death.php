<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Certificate</h4>
                  <p class="card-category"> Death Certificate</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="series" id="Series" value="<?=get_year_code();?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  

                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Admit Date</label>
                          <input type="text" class="form-control exclude" readonly name="doa" id="doa" value="<?=($data->doa) ? date('d/m/Y', strtotime($data->doa)) : date('d/m/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No.</label>
                          <?=get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" name="ipdno" value="<?=$data->ipdno;?>">
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
                          <label class="bmd-label-floating">Doctor</label>
                          <?php echo form_dropdown('dname', $doctors, $data->dname, 'class="form-control" id="DoctorName"'); ?>    
                        </div>
                      </div>
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('sex', array('M' => 'Male', 'F' => 'Female'), $data->sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight</label>
                          <input type="text" class="form-control" id="Weight" name="weight" value="<?=$data->weight;?>" >
                        </div>
                      </div>
                    </div>
<hr>
<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Death Place</label>
                          <input type="text" class="form-control" name="deathPlace" value="<?=$data->deathPlace;?>" required="required">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Death Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" name="deathdate" value="<?=($data->deathdate) ? date('d/m/Y', strtotime($data->deathdate)) : '';?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Death Time</label>
                          <input type="text" class="form-control" name="deathtime" value="<?=$data->deathtime;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fathers Name</label>
                          <input type="text" class="form-control" name="Fname" value="<?=$data->Fname;?>" required="required">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Remark</label>
                          <input type="text" class="form-control" name="remarks" value="<?=$data->remarks;?>" required="required">
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" id="save_button" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script>
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
$.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + $(this).val(), function(data){
  console.log($.parseJSON(data));
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