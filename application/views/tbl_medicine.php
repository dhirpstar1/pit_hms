<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicine Name</label>
                          <input type="text" class="form-control" name="name" value="<?=$data->name;?>" required="required">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>