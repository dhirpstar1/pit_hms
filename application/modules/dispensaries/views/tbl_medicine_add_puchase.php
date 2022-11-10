
<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine Purchase/Add</h4>
                  <p class="card-category"> New Purchase/Production Medicine Entry</p>
                </div>
                <br>
                <form action="<?=base_url('/dispensaries/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Medecine</label>
                          <select class="js-data-example-ajax form-control"  id="med_id" name="med_id">
                          <option value="<?php echo $data->med_id; ?>" selected="selected"><?=$this->CI->Dispensary_model->get_medicine($data->med_id, 'med_name');?></option>
                          </select>
                        </div>
                      </div> 
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Qty</label>
                          <input type="text" class="form-control" name="qty" value="<?=$data->qty;?>" required="required">
                        </div>
                      </div>
            
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Unit Qty</label>
                          <input type="text" class="form-control" name="unit_qty" value="<?=$data->unit_qty;?>" required="required">
                        </div>
                      </div>                    
                     
                    </div>
                   
             <div class="row">
             <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Purchase Price</label>
                            <input type="text" class="form-control" name="purchase_price" value="<?=$data->purchase_price;?>" required="required">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Purchase Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="pur_date" name="pur_date" value="<?=($data->pur_date) ? date('d/m/Y', strtotime($data->pur_date)) : date('d/m/Y');?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Store</label>
                          <input type="text" class="form-control" name="purchase_from" value="<?=$data->purchase_from;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Expiry Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="date_of_expiry" name="date_of_expiry" value="<?=($data->date_of_expiry) ? date('d/m/Y', strtotime($data->date_of_expiry)) : date('d/m/Y');?>" readonly>
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
                          <input type="text" class="form-control" name="total" name="total" value="<?=$data->total;?>" required="required">
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
$.get("<?=base_url('/master/get_data/tbl_ipd_patient/crno/');?>" + $(this).val(), function(data){
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