      <div class="content">
        <div class="container-fluid">
          <div class="row">

<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicines</h4>
                  <p class="card-category"> Medicine Given</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update_with_id');?>" method="post" id="save_form_data">
                    <input type="hidden" id="OPDID" name="ID" value="<?=$data->ID;?>">
                    <input type="hidden" name="CRNO" id="CRNO" value="<?=$data->crno;?>">
                    <input type="hidden" name="tbl" value="tbl_opd_patient">
                
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Doses Date</label>
                          <input type="text" class="form-control exclude" value="<?=($data->doa) ? date('m/d/Y', strtotime($data->doa)) : date('m/d/Y');?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No. OPD NO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" value="<?=($data->crno);?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" name="PName" value="<?=$data->PName;?>" required >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD NO </label> 
                          <input type="text" class="form-control" id="ipdno" value="<?=$data->ipdno;?>" readonly required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age (In Year, Months or Days)</label>
                          <input type="text" class="form-control" id="Age" value="<?=$data->Age;?>" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complaint</label>
                          <input type="text" class="form-control" id="Income" name="Income" value="">
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
                          <label class="bmd-label-floating">Weight</label>
                          <input type="text" class="form-control" id="Weight" name="Weight" value="<?=$data->Weight;?>" required="required">
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
                          <label class="bmd-label-floating">Others</label>
                          <input type="text" class="form-control"  id="other" name="other" value="<?=$data->other;?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Diagnosis</label>
                          <input type="text" class="form-control" id="Diagnosis" name="Diagnosis" value="<?=$data->diagnosis;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Department/Ward/Bed</label>
                        <input type="text" class="form-control" id="Description" value="<?=$data->Description;?>" required="required" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                      <button type="button" class="btn btn-primary pull-left"  id="print">Print </button>
                      <button type="submit" class="btn btn-primary pull-right">Save </button>
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
var url = "<?=base_url('/master/print_data/tbl_ipd_patient/');?>" + $('#CRNO').val();
$('<form action="'+url+'" target="_blank" method="POST"></form>').appendTo('body').submit();
});                
  $("#save_form_data").submit(function(event){ 
  
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
	//console.log(form_data);
	    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){ //
	
      console.log(response);
    });
});
                      </script>  
<script>
//////////////////////////////////////////////////////////////////////////////////////////////
<?php if($postcrno){ ?>
          window.addEventListener('load', 
          function() { 
              sate_form_data(<?=$postcrno;?>);
          }, false);
        <?php } ?>
       
      ////////////////////////////////////////////////////////////////////////////////////////////  
$('.fetch_data').on('focusout', function(){
  sate_form_data($(this).val());
});   
function sate_form_data(set_id){
  $('.fetch_data').val(set_id);
  $("#load_view").load("<?=base_url('/master/update/tbl_medicine_sales');?>"); 
  $("#load_view_list").load("<?=base_url('/master/get_custom_list/tbl_medicine_sales/crno/');?>"  + set_id);
  $.get("<?=base_url('/master/get_data/tbl_ipd_patient/CRNO/');?>" + set_id, function(data){
	  
	  console.log($.parseJSON(data));
	  
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


            