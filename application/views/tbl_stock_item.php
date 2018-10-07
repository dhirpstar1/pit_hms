<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Stock Item</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
              
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-12">
                      <div class="form-group">
                          <label class="bmd-label-floating">Stock Type</label>
                          <?php echo form_dropdown('stocktype', $stocktype, $data->stocktype, 'class="form-control"'); ?>    
                        </div>
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Name</label>
                          <input type="text" class="form-control" name="item" value="<?=$data->item;?>" required="required">
                        </div>
                        <div class="form-group">
                          <label class="bmd-label-floating">Qty</label>
                          <input type="text" class="form-control" name="qty" value="<?=$data->qty;?>">
                        </div>
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" name="price" value="<?=$data->price;?>">
                        </div>
                        <div class="form-group">
                          <label class="bmd-label-floating">Remarks</label>
                          <input type="text" class="form-control" name="remark" value="<?=$data->remark;?>">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>