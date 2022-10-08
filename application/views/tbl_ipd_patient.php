<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">IPD</h4>
                  <p class="card-category"> IPD Register Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="Series" id="Series" value="<?=get_year_code();?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD Date</label>
                          <input type="text" class="form-control exclude" name="doa" data-toggle="datepicker" value="<?=($data->doa) ? date('d/m/Y', strtotime($data->doa)) : date('d/m/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No.</label>
                          <?=get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="crno"  value="<?=($data->crno);?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD No.</label>
                          <input type="text" class="form-control exclude" name="ipdno"  value="<?=($data->ipdno) ? $data->ipdno : get_current_iptno();?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patient Name</label>
                          <input type="text" class="form-control" id="PName" value="<?=$data->PName;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label> (In Year, Months or Days)
                          <input type="text" class="form-control" id="Age" value="<?=$data->Age;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" id="Address" value="<?=$data->Address;?>" required="required">
                        </div>
                      </div>
                      
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('', array('M' => 'Male', 'F' => 'Female'), $data->Sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complain</label>
                          <input type="text" class="form-control" id="Income" value="<?=$data->Income;?>" required="required">
                        </div>
                      </div>
                    </div>

                    
                 
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                         <?php echo form_dropdown('department', $departments, $data->department, 'class="form-control" id="Department"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bed No.</label>
                          <?php echo form_dropdown('bedid', $bedids, $data->bedid, 'class="form-control bedidset"'); ?>    
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Testing Doctor</label>
                         <?php echo form_dropdown('doctorname', $doctors, $data->DoctorName, 'class="form-control" id="DoctorName"'); ?>    
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" id="save_button" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
$( "#save_data" ).submit(function(event) {
$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
  $( this ).submit();
});

          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });

            
    </script> 
<script>
function set_beds(department){
  $.post("<?=base_url('/master/get_custom_bed_list');?>", {department: department}, function(result){
var listItems = '<option selected="selected" value="0">- Select -</option>';
$.each(JSON.parse(result), function(i, value){
        listItems += "<option value='" + i + "'>" + value + "</option>";
      });
    $(".bedidset").html(listItems);
});
}

$("#Department").change(function(){
   set_beds($(this).val());
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