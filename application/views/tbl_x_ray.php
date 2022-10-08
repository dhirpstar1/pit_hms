<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">X-Ray</h4>
                  <p class="card-category"> X-Ray Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="Series" id="Series" value="<?=$data->Series;?>">
                  <input type="hidden" id="ipdno" name="ipdno" value="<?=$data->ipdno;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">                       
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" data-toggle="datepicker" class="form-control exclude" name="xdate" value="<?=($data->xdate) ? date('d/m/Y', strtotime($data->xdate)) : date('d/m/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CRNO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="crno"  value="<?=($data->CRNO);?>" required="required">
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight (KG)</label>
                          <input type="text" class="form-control" name="weight" value="<?=$data->weight;?>">
                        </div>
                      </div>
                      
              </div>
              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name of X-Ray part 	</label>
                          <input type="text" class="form-control" name="name_of_xray_part" value="<?=$data->name_of_xray_part;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Observation</label>
                          <input type="text" class="form-control" name="observation" value="<?=$data->observation;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Result	</label>
                          <input type="text" class="form-control" name="result" value="<?=$data->result;?>">
                        </div>
                      </div>
                     
                    </div>
                         
                         
                    <button type="submit" class="btn btn-primary pull-right"  id="save_button">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script type="text/javascript">  
            $('#print').click(function(){ 
var url = "<?=base_url('/master/print_data/tbl_x_ray/');?>" + $('#CRNO').val();
$('<form action="'+url+'" target="_blank" method="POST"></form>').appendTo('body').submit();
});                

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