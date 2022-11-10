<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine</h4>
                  <p class="card-category"> Add Medicine</p>
                </div>
                <br>
                <form action="<?=base_url('/dispensaries/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicine Name</label>
                          <input type="text" class="form-control fetch_data exclude" id="med_name" name="med_name"  value="<?=($data->med_name);?>" required="required" title="Medicine name">
                        </div>
                      </div>                     
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Expiry Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="date_of_expiry" name="date_of_expiry" value="<?=($data->date_of_expiry) ? date('d/m/Y', strtotime($data->date_of_expiry)) : date('d/m/Y');?>" readonly>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Unit</label>
                          <?php echo form_dropdown('unit', $units, $data->unit, 'class="form-control" id="unit"'); ?> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Packing</label>
                          <input type="text" class="form-control" name="packing"  id="packing" value="<?=$data->packing;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <?php echo form_dropdown('category', $categories, $data->category, 'class="form-control" id="category"'); ?> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Batch Id</label>
                          <input type="text" class="form-control" name="batch_id" value="<?=$data->batch_id;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">QTY</label>
                          <input type="text" class="form-control" name="qty" value="<?=$data->qty;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Unit QTY</label>
                          <input type="text" class="form-control" name="unit_qty" value="<?=$data->unit_qty;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Purchase Price</label>
                          <input type="text" class="form-control" name="purchase_price" value="<?=$data->purchase_price;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sale Price</label>
                          <input type="text" class="form-control" name="mrp" value="<?=$data->mrp;?>" required="required">
                        </div>
                      </div>
                    </div>
             <div class="row">
                     
              </div>
              <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rack</label>
                          <input type="text" class="form-control" name="rack" value="<?=$data->rack;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rate</label>
                          <input type="text" class="form-control" name="rate" value="<?=$data->rate;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CGST </label>
                          <input type="text" class="form-control" name="cgst" name="cgst" value="<?=$data->cgst;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">SGST</label>
                          <input type="text" class="form-control" name="sgst" name="sgst" value="<?=$data->sgst;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total</label>
                          <input type="text" class="form-control" name="total" value="<?=$data->total;?>" required="required">
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
</script>