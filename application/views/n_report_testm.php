<div class="col-md-12 fetch_results">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Test Result</h4>
                  <p class="card-category"> Test Result Master</p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="series" id="Series" value="<?=($data->series) ? $data->series : get_year_code();?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" class="form-control exclude"  data-toggle="datepicker" name="DDATE" value="<?=($data->DDATE) ? date('d/m/Y', strtotime($data->DDATE)) : date('d/m/Y');?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">CR No.</label>
                          <?=($data->series) ? $data->series : get_year_code();?>
                          <input type="text" class="form-control fetch_data exclude" id="CRNO" name="crno"  value="<?=($data->crno);?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">IPD No.</label>
                         
                          <input type="text" class="form-control " id="ipdno" readonly value="<?=($data->ipdno);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Patiant Name</label>
                          <input type="text" class="form-control" id="PName" name="PNAME" value="<?=$data->PNAME;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="text" class="form-control" id="Age" name="AGE" value="<?=$data->AGE;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                         <?php echo form_dropdown('SEX', array('M' => 'Male', 'F' => 'Female'), $data->SEX, 'class="form-control" id="Sex"'); ?>    
                        </div>
                      </div>
                    </div>
                               

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                         <?php echo form_dropdown('department', $departments, $data->department, 'class="form-control" id="Department"'); ?>    
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Referred By</label>
                         <?php echo form_dropdown('REFFEREDBY', $doctors, $data->REFFEREDBY, 'class="form-control"'); ?>    
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sample By</label>
                          <input type="text" class="form-control"  name="SAMPLEBY" value="<?=$data->SAMPLEBY;?>" required="required">
                        </div>
                      </div>
                    </div>
                          <div class="row" id="tests_list">
                          <hr> 
                          <div class="col-md-6">
                          <div class="well" align="center"><h3>The Head</h3></div>
                          <div class="col-md-12 well">
                          <ul class="list-group">
                          <?php foreach($testheads as $key => $item): if($key !== 0): ?>
                            <li class="list-group-item list-group-item-success selected_box">
                              <input type="checkbox" class="heads_list" value="<?=$key;?>">&nbsp;&nbsp;&nbsp;&nbsp;<?=$key;?>
                              &nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp;&nbsp;&nbsp;&nbsp;<?=$item;?>
                            </li>
                          <?php endif; endforeach; ?>
                            
                          </ul> 
                          
                          </div>
                          <div class="well" align="center"><h3>Test Under</h3></div>
                          <div class="col-md-12 well">
                          <ul class="list-group" id="subheads_list">
                           
                          </ul>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="well" align="center"><h3>Select Test</h3></div>
                          <div class="col-md-12 well">
                          <ul class="list-group" id="master_felids_list">
                           
                          </ul>
                          </div>
                          </div>
                          </div>       

<div class="row" id="load_test">

</div>
                    <button type="button" class="btn btn-primary pull-left" id="back_button"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</button>
                    <button type="button" class="btn btn-primary pull-right" id="proceed_button">Proceed Test</button>
                    <button type="submit" class="btn btn-primary pull-right" style="display:none;" id="save_button">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>
<script>
/////////////////////////////////////////////////////////////////////////////////////////////
$( "#save_data" ).submit(function(event) {
$('#save_button').attr('disabled','disabled');
$('#save_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
  $( this ).submit();
});

 $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });
$('#back_button').click(function(){
  $('#tests_list').show();
  $('#load_test').hide();
  $('#save_button').hide();
  $('#proceed_button').show(); 
});
$('#proceed_button').click(function(){
	$('#proceed_button').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');

  //  $( "#load_test" ).parent().scrollTop( 300 );
  var favorite = [];
  $.each($("input[class='selected_master_felids']:checked"), function(){            
      favorite.push($(this).val());
  });
   
  if(favorite.length === 0){
    alert('Please selct one of the test.');
  }else{
    $.post("<?=base_url('/master/selected_test');?>", { selected_tests:favorite }, function(data){
  $('#tests_list').hide(); 
  $('#load_test').show();
  $('#save_button').show();
  $('#proceed_button').hide(); 

  $("#load_test").html(data);
  set_headings();

});
  }
  //console.log(favorite);
  
});



$('.heads_list').click(function(){
    var favorite = [];
    $.each($("input[class='heads_list']:checked"), function(){            
        favorite.push($(this).val());
    });
    if(favorite.length > 0){
      $.post("<?=base_url('/master/get_lab_head_sub_data/n_master_testunderhead/HCODE');?>", { selected_subhead:favorite }, function(data){
        //console.log(data);
    var listItems = '';
    $.each(JSON.parse(data), function(i, value){
            listItems += '<li class="list-group-item list-group-item-info selected_subhead_box"><input type="checkbox" class="selected_subhead" value="'+ value.TCODE +'">&nbsp;&nbsp;&nbsp;&nbsp;' + value.TCODE +' -- '+value.TNAME + '</li>';
          });
    $("#subheads_list").html(listItems);
  });
    }else{
      $("#subheads_list").html('');
      $("#master_felids_list").html(''); 
    }
 
});

$(document).on("click",".selected_subhead",function(e){
      var favorite = [];
      $.each($("input[class='selected_subhead']:checked"), function(){            
          favorite.push($(this).val());
      });
      
      if(favorite.length > 0){
      $.post("<?=base_url('/master/get_lab_head_sub_data/n_master_fields/TCODE');?>", { selected_subhead:favorite }, function(data){
        console.log(JSON.parse(data));
      var listItems = '';
      $.each(JSON.parse(data), function(i, value){
              listItems += '<li class="list-group-item list-group-item-danger"><b>' + i +'</b><ul>';
              $.each(value, function(j, innervalue){
              listItems += '<li class="list-group-item list-group-item-danger selected_master_felids_box"><input type="checkbox" class="selected_master_felids" value="'+ innervalue.ID +'">&nbsp;&nbsp;&nbsp;&nbsp;' + innervalue.FNAME + '</li>';
            });
            listItems += '</ul></li>';
            });
        $("#master_felids_list").html(listItems); 
    });
      }else{
       
        $("#master_felids_list").html(''); 
      }
    //
});

$('.fetch_data').on('focusout', function(){
  sate_form_data($(this).val());
});   
function sate_form_data(set_id){
  $('.fetch_data').val(set_id);
  $.get("<?=base_url('/master/get_data/tbl_opd_patient/CRNO/');?>" + set_id, function(data){
  if($.parseJSON(data)){
  $.each($.parseJSON(data), function (idx, val) {
      $('[id="' + idx + '"]').val(val).change();
    });
}else{
  $('.fetch_results').find('input:text').not(".exclude").val('');    
}
  }); 
}
</script>