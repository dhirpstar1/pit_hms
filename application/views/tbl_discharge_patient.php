<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Discharge</h4>
                  <p class="card-category"> Discharge Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="Series" id="Series" value="<?=$data->Series;?>">
                  <input type="hidden" id="ipdno" name="ipdno" value="<?=$data->ipdno;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Admit Date</label>
                          <input type="text" class="form-control" data-toggle="datepicker" id="doa" name="doa" value="<?=($data->doa) ? date('m/d/Y', strtotime($data->doa)) : date('m/d/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD NO.</label>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="crno"  value="<?=($data->crno);?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" value="<?=$data->PName;?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bed No.</label>
                          <input type="text" class="form-control"  id="bedid" value="<?=$data->bedid;?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" data-toggle="datepicker" class="form-control exclude" name="dod" value="<?=($data->dod) ? date('m/d/Y', strtotime($data->dod)) : date('m/d/Y');?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Operation</label>
                          <input type="text" class="form-control" name="operation" value="<?=$data->operation;?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">No. Days</label>
                          <input type="text" class="form-control" value="<?=$data->nod;?>" readonly>
                        </div>
                      </div>
                    </div>
             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Final Diagnosis</label>
                          <input type="text" class="form-control" name="finaldiagnosis" value="<?=$data->finaldiagnosis;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Investigations</label>
                          <input type="text" class="form-control" name="investigations" value="<?=$data->investigations;?>">
                        </div>
                      </div>
              </div>
              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Treatment Given</label>
                          <input type="text" class="form-control" name="treatmentgiven" value="<?=$data->treatmentgiven;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Treatment Adviced</label>
                          <input type="text" class="form-control" name="treatmentadviced" value="<?=$data->treatmentadviced;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">followupafter</label>
                          <input type="text" class="form-control" name="followupafter" name="followupafter" value="<?=$data->followupafter;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Condition on Discharge</label>
                          <input type="text" class="form-control" name="conditionondischarge" name="conditionondischarge" value="<?=$data->conditionondischarge;?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                          <input type="text" class="form-control" id="department" value="<?=$data->Department;?>">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type Of Discharge</label>
                          <input type="text" class="form-control" id="typeofdischarge" name="typeofdischarge" value="<?=$data->typeofdischarge;?>" required="required">
                        </div>
                      </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          });           
      </script> 
<script>
$('.fetch_data').on('focusout', function(){
$.get("<?=base_url('/master/get_data/tbl_ipd_patient/crno/');?>" + $(this).val(), function(data){
//  console.log($.parseJSON(data));
if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="'+idx+'"]').val(val).change();
    });
}else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
  }); 
});
</script>