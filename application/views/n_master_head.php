<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Test Head Master</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Head Name</label>
                          <input type="text" class="form-control" name="HCODE" value="<?=$data->HCODE;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Head Code</label>
                          <input type="text" class="form-control" name="HNAME" value="<?=$data->HNAME;?>" required="required">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>