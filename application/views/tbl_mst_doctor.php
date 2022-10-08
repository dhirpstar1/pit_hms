<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Doctors</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Doctor Name</label>
                          <input type="text" class="form-control" name="DNAME" value="<?=$data->DNAME;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address City</label>
                          <input type="text" class="form-control" name="ADDRESS"  value="<?=$data->ADDRESS;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" class="form-control" name="contact" value="<?=$data->contact;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Specialist</label>
                          <input type="text" class="form-control" name="specialist" value="<?=$data->specialist;?>" required="required">
                        </div>
                      </div>
                    </div>
            
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                         <?php echo form_dropdown('department', $departments, $data->department, 'class="form-control"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Same Time Days</label>
                          <input type="text" class="form-control" name="Sametimedays" value="<?=$data->Sametimedays;?>">

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Other Time Days</label>
                          <input type="text" class="form-control" name="OtherTimeDays" value="<?=$data->OtherTimeDays;?>">
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>