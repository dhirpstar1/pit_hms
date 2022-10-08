<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Test Under Head</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Head</label>
                         <?php echo form_dropdown('HCODE', $testheads, $data->HCODE, 'class="form-control"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Head Test Code</label>
                          <input type="text" class="form-control" name="TCODE" value="<?=$data->TCODE;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Head Test Name</label>
                          <input type="text" class="form-control" name="TNAME" value="<?=$data->TNAME;?>" required="required">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>