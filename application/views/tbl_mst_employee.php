<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Employees</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  <div class="row">
                       
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Date Of Joining</label>
                           <input type="text" data-toggle="datepicker" class="form-control" name="Doj" value="<?=($data->Doj) ? date('m/d/Y', strtotime($data->Doj)) : '';?>" required="required">
                         </div>
                       </div>
                       <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                         <?php echo form_dropdown('Status', array('Regular', 'Left Job'), $data->Status, 'class="form-control"'); ?>    
                        </div>
                       </div>
                     </div>
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="empname" value="<?=$data->empname;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address"  value="<?=$data->address;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" class="form-control" name="contact" value="<?=$data->contact;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Designation</label>
                          <input type="text" class="form-control" name="Designation" value="<?=$data->Designation;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Qualification</label>
                          <input type="text" class="form-control" name="qualification" value="<?=$data->qualification;?>" required="required">
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
                          <label class="bmd-label-floating">Time From</label>
                          <input type="text" class="form-control" name="timefrom" value="<?=$data->timefrom;?>">

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Time To</label>
                          <input type="text" class="form-control" name="timeto" value="<?=$data->timeto;?>">
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script>
 $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          }); 
</script>          