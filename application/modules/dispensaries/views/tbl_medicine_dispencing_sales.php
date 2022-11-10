<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine Sales/Dispencing</h4>
                  <p class="card-category"> Medicine Sales/Dispencing</p>
                </div>
                <br>
                <form action="<?=base_url('/dispensaries/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="Series" id="Series" value="<?=$data->Series;?>">
                  <input type="hidden" id="ipdno" name="ipdno" value="<?=$data->ipdno;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">  
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patient CRNO/OPD NO</label>
                          <input type="text" class="form-control fetch_data exclude" id="crno" name="crno"  value="<?=($data->crno);?>" required="required" title="Enter Here Admitted Patient Cr. No Only">
                        </div>
                      </div> 
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bed No.</label>
                          <input type="text" class="form-control" name="bedid"  id="bedid" value="<?=$data->bedid;?>" readonly>
                        </div>
                      </div>                    
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Select Medecine</label>
                          <select class="js-data-example-ajax form-control"  id="med_id" name="med_id">
                          <option value="<?=$data->med_id;?>" selected="selected"><?=$this->CI->Dispensary_model->get_medicine($data->med_id, 'med_name');?></option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" value="<?=$data->PName;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Unit Qty </label>
                                  <input type="text" class="form-control" name="unit_qty" value="<?=$data->unit_qty;?>" required="required">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Rate</label>
                                  <input type="text" class="form-control" name="rate" value="<?=$data->rate;?>" required="required">
                                </div>
                              </div>
                    
                    </div>

              <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CGST</label>
                          <input type="text" class="form-control" name="cgst" value="<?=$data->cgst;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">SGST</label>
                          <input type="text" class="form-control" name="sgst" value="<?=$data->sgst;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total</label>
                          <input type="text" class="form-control" name="total" value="<?=$data->total;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="med_date" name="med_date" value="<?=($data->med_date) ? date('d/m/Y', strtotime($data->med_date)) : date('d/m/Y');?>" readonly>
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
		 $('#PName').on(' blur change', function(e) {
			$('#PName').val($(this).val().toUpperCase());
		});
		
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });           

$( "#save_data" ).submit(function(event) {
$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
  $( this ).submit();
});


$('.fetch_data').on('focusout', function(){
$.get("<?=base_url('/dispensaries/get_data_phar/tbl_ipd_patient/crno/');?>" + $(this).val(), function(data){
if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="'+idx+'"]').val(val).change();
    });
}else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
  }); 
});
$(document).ready(function() {
  $('.js-example-basic-single').select2({
    placeholder: 'Select an option',
  });
  if ($('.fetch_data').val() !== ''){
    $.get("<?=base_url('/dispensaries/get_data_phar/tbl_ipd_patient/crno/');?>" + $('.fetch_data').val(), function(data){
      if($.parseJSON(data)){
        $.each($.parseJSON(data), function (idx, val) {
            $('[id="'+idx+'"]').val(val).change();
          });
      }else{
        $('.fetch_results').find('input:text').not(".exclude").val('');    
      }
    }); 
  }
    

  $('.js-data-example-ajax').select2({
    ajax: {
    url: '<?php echo base_url('/dispensaries/search_medicines/'); ?>',
    type: "post",
    dataType: 'json',
    data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
    processResults: function (response) {
      console.log(response);
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: response
      };
    }
  },
  placeholder: 'Select an option',
  
});

});
</script>