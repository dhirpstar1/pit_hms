<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Therapy</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-12">
                      <div class="form-group">
                          <label class="bmd-label-floating">Therapy Parent</label>
                          <?php echo form_dropdown('parent_id', $therapy_parents, $data->parent_id, 'class="form-control"'); ?>    
                        </div>


                        <div class="form-group">
                          <label class="bmd-label-floating">Therapy Name</label>
                          <input type="text" class="form-control" name="name" value="<?=$data->name;?>" required="required">
                        </div>

                    
                      <div class="form-group">
                          <label class="bmd-label-floating">Therapy Price</label>
                          <input type="text" class="form-control" name="price" value="<?=$data->price;?>">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>