<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Receipt</h4>
                  <p class="card-category"> Receipt Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="series" id="Series" value="<?=get_year_code();?>">
                  <input type="hidden" name="opdno" id="opdno" value="<?=$data->opdno;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Receipt Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" name="ddate" value="<?=($data->ddate) ? date('m/d/Y', strtotime($data->ddate)) : date('m/d/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Time</label>
                          <input type="text" class="form-control" name="ttime"  value="<?=($data->ttime);?>" placeholder="hh:mm">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No.</label>
                          <?=get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="recno"  value="<?=($data->recno);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" name="pname" value="<?=$data->pname;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label> (In Year, Months or Days)
                          <input type="text" class="form-control" id="Age" name="age" value="<?=$data->age;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" id="Address" name="address" value="<?=$data->address;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Care of</label>
                          <input type="text" class="form-control" name="careof" value="<?=$data->careof;?>" required="required">
                        </div>
                      </div>
                    </div>
             <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('sex', array('M' => 'Male', 'F' => 'Female'), $data->sex, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Weight</label>
                          <input type="text" class="form-control" id="Weight" name="weight" value="<?=$data->weight;?>" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Receipt Type</label>
                          <?php echo form_dropdown('type', $receipt_types, $data->type, 'class="form-control"'); ?>    
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Refer By</label>
                          <input type="text" class="form-control" name="refby" value="<?=$data->refby;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Family</label>
                          <input type="text" class="form-control" name="family" value="<?=$data->family;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Card No.</label>
                          <input type="text" class="form-control"  name="cardno" value="<?=$data->cardno;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Charges</label>
                          <input type="text" class="form-control" name="charges" value="<?=$data->charges;?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Valid Upto</label>
                          <input type="text" class="form-control" data-toggle="datepicker" name="validupto" value="<?=($data->validupto) ? date('m/d/Y', strtotime($data->validupto)) : date('m/d/Y');?>">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">For</label>
                          <input type="text" class="form-control" name="For" value="<?=$data->For;?>">
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script>
 $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          }); 
$('.fetch_data').on('focusout', function(){

//alert($(this).val());

$.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + $(this).val(), function(data){
  console.log($.parseJSON(data));
  if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      console.log(idx);
      console.log(val);
      $('[id="'+idx+'"]').val(val);
    });
  }else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
       }); 


});
</script>