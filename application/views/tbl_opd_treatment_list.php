  <style type="text/css">
  
  </style>
      <div class="content">
        <div class="container-fluid">
          <div class="row">

<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">OPD</h4>
                  <p class="card-category"> OPD Treatment</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update_with_id');?>" method="post" id="save_form_data">
                    <input type="hidden" id="ID" name="ID" value="<?=$data->ID;?>">
                    <input type="hidden" name="CRNO" id="CRNO" value="<?=$data->crno;?>">
                    <input type="hidden" name="tbl" value="tbl_opd_patient">
                    
                    <div class="row">
  
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">OPD Date</label>
                          <input type="text" class="form-control" id="opddate" data-toggle="datepicker" name="opddate" value="<?=($data->opddate) ? date('m/d/Y', strtotime($data->opddate)) : date('m/d/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR NO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="CRNO"  value="<?=($data->crno);?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" name="PName"  id="PName" value="<?=$data->PName;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age (In Year, Months or Days)</label>
                          <input type="text" class="form-control" id="Age" name="Age" value="<?=$data->Age;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" id="Address" name="Address" value="<?=$data->Address;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight</label>
                          <input type="text" class="form-control" id="Weight" name="Weight" value="<?=$data->Weight;?>" required="required">
                        </div>
                      </div>
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
						
                         <?php echo form_dropdown('Sex', array('M' => 'Male', 'F' => 'Female'), $data->Sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complaint</label>
                          <input type="text" class="form-control" id="Income" name="Income" value="<?=$data->Income;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">BP</label>
                          <input type="text" class="form-control" id="bp" name="bp" value="<?=$data->bp;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pulse</label>
                          <input type="text" class="form-control" id="pulse" name="pulse" value="<?=$data->pulse;?>">
                        </div>
                      </div>
                      <div class="col-md-4">  
                        <div class="form-group">
                          <label class="bmd-label-floating">Random Blood Suger</label>
                          <input type="text" class="form-control" id="randum_blood_suger" name="randum_blood_suger" value="<?=$data->randum_blood_suger;?>" >
                        </div>
                      </div>
                      
                    </div>

<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">Sign & Symptoms</label>
                          <input type="text" class="form-control" id="sign_symptoms" name="sign_symptoms" value="<?=$data->sign_symptoms;?>">
                        </div>
                      </div>
                 
                     
                    </div>
<b>Investigation</b>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">X-Ray</label>
                          <input type="text" class="form-control" id="x_ray" name="x_ray" value="<?=$data->x_ray;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ECG</label>
                          <input type="text" class="form-control" id="ecg" name="ecg" value="<?=$data->ecg;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lab Investigation</label>
                          <input type="text" class="form-control"  id="other" name="other" value="<?=$data->other;?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Diagnosis</label>
                          <input type="text" class="form-control" id="Diagnosis" name="Diagnosis" value="<?=$data->Diagnosis;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                         <?php echo form_dropdown('Department', $departments, $data->department, 'class="form-control" id="Department"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                      <button type="button" class="btn btn-primary pull-left"  id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
                      <button type="submit" id="save_button" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    </div>
                    </form>

 </div>           
</div>
<!-- Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
  
</div>
<div id="load_view" class="col-md-12"></div>
<div id="load_view_list" class="col-md-12"></div>
<div class="clearfix"></div>
<script type="text/javascript">   
$('#print').click(function(){
var url = "<?=base_url('/master/print_data/tbl_opd_patient/');?>" + $('#CRNO').val();
$('<form action="'+url+'" target="_blank" method="POST"></form>').appendTo('body').submit();
}); 


  $("#save_form_data").submit(function(event){ 
  //$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){ //
      $('#save_button').html('Save');
    });
	

});
                      </script>  
<script>
 $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          }); 

/////////////////////////////////////////////////////////////////////////////////////////////
$('.fetch_data').on('focusout', function(){
  sate_form_data($(this).val());
});   



function sate_form_data(set_id){
  $("#load_view").load("<?=base_url('/master/update/tbl_opd_treatment');?>"); 
  $("#load_view_list").load("<?=base_url('/master/get_custom_list/tbl_opd_treatment/crno/');?>"  + set_id);
  $.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + set_id, function(data){
   // console.log(data);
  if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="'+idx+'"]').val(val).change();
    });
}else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
  }); 
}
<?php if($postcrno){ ?>
  window.addEventListener('load', 
  function() { 
    sate_form_data(<?=$postcrno;?>);
  }, false);
<?php } ?>
</script>


            