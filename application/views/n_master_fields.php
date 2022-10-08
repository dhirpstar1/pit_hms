<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sub Test Master</h4>
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
                         <?php echo form_dropdown('HCODE', $testheads, $data->HCODE, 'class="form-control testhead"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">Sub Head</label>
                          <?php echo form_dropdown('TCODE', $subheads, $data->TCODE, 'class="form-control subtesthead"'); ?>    
                        </div>  
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Head Test Head(If Any)</label>
                          <?php echo form_dropdown('ORGCHILD', $subtestheads, $data->ORGCHILD, 'class="form-control subhead"'); ?>    
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Test Name</label>
                          <input type="text" class="form-control" name="FNAME" value="<?=$data->FNAME;?>" required="required">
                        </div>
                      </div>
                     </div>
                     <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Units</label>
                          <input type="text" class="form-control" name="UNIT" value="<?=$data->UNIT;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Rate</label>
                          <input type="text" class="form-control" name="RATE" value="<?=$data->RATE;?>">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Range From</label>
                          <input type="text" class="form-control" name="RFROM" value="<?=$data->RFROM;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Range Upto</label>
                          <input type="text" class="form-control" name="RTO" value="<?=$data->RTO;?>">
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
function set_subhead(head){
  $.post("<?=base_url('/master/get_lab_subhead_list');?>", {head: head}, function(result){
var listItems = '<option selected="selected" value="0">- Select -</option>';
$.each(JSON.parse(result), function(i, value){
        listItems += "<option value='" + i + "'>" + value + "</option>";
      });
    $(".subtesthead").html(listItems);
});
}

function set_sub_head_set(subhead){
  $.post("<?=base_url('/master/get_lab_subtesthead_list');?>", {subhead: subhead}, function(result){
var listItems = '';
$.each(JSON.parse(result), function(i, value){
        listItems += "<option value='" + i + "'>" + value + "</option>";
      });
    $(".subhead").html(listItems);
});
}

$(".testhead").change(function(){
  set_subhead($(this).val());
});
$(".subtesthead").change(function(){
  set_sub_head_set($(this).val());
});


</script>